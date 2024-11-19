<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Agrega esta línea en cada modelo

class Cursos extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'cursos';
    protected $fillable = [
        'nombre',
        'codigo_interno',
        'descripcion',
        'modalidad',
        'ruta_pdf',

    ];

    public function grupos() 
    {
        return $this->hasMany(Grupos::class);
    }
    /**
     * Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo_interno')->unique(); 
            $table->text('descripcion')->nullable(); 
            $table->string('modalidad'); 
            $table->string('ruta_pdf')->nullable(); 
            $table->softDeletes();

            $table->timestamps();
        });
     */
}
