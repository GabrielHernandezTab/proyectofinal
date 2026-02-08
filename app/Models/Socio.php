<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    //
    protected $guarded = [];
    public function up(): void {
    Schema::create('socios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('dni');
        $table->integer('edad');
        $table->string('categoria');
        $table->string('iban');
        $table->timestamps();
    });
}
}
