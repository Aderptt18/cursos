<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Agrega esta línea en cada modelo

class Grupos extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'grupos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_final',
        'salon',
        'capacidad',
        'curso_id',
        'docente_id',
        'periodo_academico_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Cursos::class);
    }
    public function docente()
    {
        return $this->belongsTo(User::class);
    }
    public function periodo_academico()
    {
        return $this->belongsTo(PeriodosAcademicos::class);
    }
    public function matriculas() 
    {
        return $this->hasMany(Matriculas::class);
    }





    /**Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->date('fecha_incio');
            $table->date('fecha_final');
            $table->string('salon');
            $table->integer('capacidad');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unsignedBigInteger('docente_id');
            $table->foreign('docente_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('periodo_academico_id');
            $table->foreign('periodo_academico_id')->references('id')->on('periodos_academicos')->onDelete('cascade');
            $table->softDeletes();

            $table->timestamps();
        }); */
}
