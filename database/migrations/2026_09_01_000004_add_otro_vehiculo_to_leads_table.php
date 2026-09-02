<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('otro_marca')->nullable()->after('vehicle_id');
            $table->string('otro_modelo')->nullable()->after('otro_marca');
            $table->string('otro_anio', 10)->nullable()->after('otro_modelo');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['otro_marca', 'otro_modelo', 'otro_anio']);
        });
    }
};
