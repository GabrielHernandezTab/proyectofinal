<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    protected $guarded = [];
    public function up(): void {
    Schema::create('libros', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('autor');
        $table->string('anho');
        $table->string('genero');
        $table->text('descripcion');
        $table->timestamps();
    });
}
}
