<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Agrega esta línea en cada modelo

class PeriodosAcademicos extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'periodos_academicos';
    protected $fillable = [
        'nombre',
        'año',
        'trimestre',
    ];

    public function grupos() 
    {
        return $this->hasMany(Grupos::class);
    }
    /**
     * Schema::create('periodos_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->year('año');
            $table->integer('trimestre');
            $table->timestamps();
            //restrinciones
            $table->softDeletes();

        });
     */
    
}
