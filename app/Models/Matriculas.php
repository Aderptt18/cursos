<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Agrega esta línea en cada modelo

class Matriculas extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'matriculas';
    protected $fillable = [
        'estado',
        'nota',
        'grupo_id',
        'usuario_id',
    ];
    public function grupo()
    {
        return $this->belongsTo(Grupos::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->decimal('nota', 3, 2); 
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
     */
}
