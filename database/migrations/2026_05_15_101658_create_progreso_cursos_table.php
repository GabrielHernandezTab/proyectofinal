<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progreso_cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('curso'); // 'basico', 'avanzado', 'supremo'
            $table->integer('segundos_totales')->default(0);
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unique(['usuario_id', 'curso']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progreso_cursos');
    }
};