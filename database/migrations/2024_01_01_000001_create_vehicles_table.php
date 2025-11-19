<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // Marca
            $table->string('model'); // Modelo
            $table->integer('year'); // Año
            $table->decimal('price', 12, 2); // Precio
            $table->integer('kilometers')->default(0); // Kilómetros
            $table->enum('fuel_type', ['nafta', 'diesel', 'gnc', 'electrico', 'hibrido'])->default('nafta');
            $table->enum('transmission', ['manual', 'automatica'])->default('manual');
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->json('images')->nullable(); // Array de URLs de imágenes
            $table->enum('category', ['auto', 'suv', 'pickup', 'comercial', 'moto'])->default('auto');
            $table->boolean('featured')->default(false); // Destacado
            $table->boolean('available')->default(true); // Disponible
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
