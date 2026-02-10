<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Usuario con roles especiales (admin)
    /**
     * Run the migrations.
     */
    //Relación 1:1 => Un administrador es un usuario con poderes especiales
    public function up(): void
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            // Creamos la relación: usuario_id apunta a id en la tabla usuarios
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('rol'); // ej: 'Súper Admin', 'Moderador'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradors');
    }
};
