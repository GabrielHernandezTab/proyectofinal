<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //Relación 1:N => Un usuario puede realizar muchas donaciones voluntarias
    public function up(): void
    {
        Schema::create('donantes', function (Blueprint $table) {
            $table->id();
            // Relación con la tabla usuarios (asegúrate de que tu tabla se llame 'usuarios' y no 'users')
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
                        
            $table->string('iban'); // Cambiado de divisa a IBAN
            
            // Valoración de la experiencia (1 a 5 estrellas)
            // Usamos string para guardar los símbolos ★ directamente
            $table->string('valoracion'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donantes');
    }
};
