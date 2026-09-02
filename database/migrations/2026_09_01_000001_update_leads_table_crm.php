<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            if (!Schema::hasColumn('leads', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete()->after('id');
            }
            if (!Schema::hasColumn('leads', 'origen')) {
                $table->string('origen')->default('web')->after('message');
            }
            if (!Schema::hasColumn('leads', 'ultima_hora_contacto')) {
                $table->timestamp('ultima_hora_contacto')->nullable()->after('origen');
            }
        });

        // Primero cambiar el tipo a string para poder insertar los nuevos valores
        DB::statement("ALTER TABLE leads MODIFY COLUMN status VARCHAR(30) NOT NULL DEFAULT 'NUEVO'");

        // Migrar valores viejos al nuevo esquema de estados
        DB::table('leads')->where('status', 'nuevo')->update(['status' => 'NUEVO']);
        DB::table('leads')->where('status', 'contactado')->update(['status' => 'CONTACTADO']);
        DB::table('leads')->where('status', 'interesado')->update(['status' => 'INTERESADO']);
        DB::table('leads')->where('status', 'cerrado')->update(['status' => 'NO AVANZA']);
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'origen', 'ultima_hora_contacto']);
        });

        DB::statement("ALTER TABLE leads MODIFY COLUMN status ENUM('nuevo','contactado','interesado','cerrado') NOT NULL DEFAULT 'nuevo'");
    }
};
