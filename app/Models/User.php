<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // Agrega esta línea en cada modelo

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'cedula',
        'telefono',
        'fecha_nacimiento',
        'password',
    ];


    /**Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cedula', 15)->unique(); // Cédula como string
            $table->string('telefono', 20)->unique(); // Teléfono como string
            $table->date('fecha_nacimiento')->nullable(); // Fecha de nacimiento
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->softDeletes();

            $table->rememberToken();
            $table->timestamps();
        }); */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function grupos() 
    {
        return $this->hasMany(Grupos::class);
    }
    public function matriculas() 
    {
        return $this->hasMany(Matriculas::class);
    }
}
