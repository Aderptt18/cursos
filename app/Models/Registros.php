<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Agrega esta línea en cada modelo

class Registros extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'registros';
    protected $fillable = [
        'name',
        'email',
        'cedula',
        'telefono',
        'fecha_nacimiento',
        'grupo_id',

    ];
    /**Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cedula', 15)->unique(); // Cédula como string
            $table->string('telefono', 20)->unique(); // Teléfono como string
            $table->date('fecha_nacimiento')->nullable(); // Fecha de nacimiento
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        }); */
}
