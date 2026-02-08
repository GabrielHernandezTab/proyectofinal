<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    protected $guarded = [];
    public function up(): void {
    Schema::create('vehiculos', function (Blueprint $table) {
        $table->id();
        $table->string('marca');
        $table->string('modelo');
        $table->string('matricula');
        $table->string('combustible');
        $table->string('estado');
        $table->string('anho');
        $table->timestamps();
    });
}
}
