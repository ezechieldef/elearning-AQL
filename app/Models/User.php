<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "Type"
    ];

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

    public function estUnProfesseur()
    {
        return strtoupper($this->Type) === 'PROFESSEUR' && $this->hasRole('PROFESSEUR');
    }
    public function estUnEtudiant()
    {
        return strtoupper($this->Type) === 'ETUDIANT' && $this->hasRole('ETUDIANT');
    }
    function cours()
    {
        return $this->hasMany(Cour::class);
    }
    function avisUtilisateurs()
    {
        return $this->hasMany(AvisUtilisateur::class);
    }
    function sessionMeets()
    {
        return $this->hasMany(SessionMeet::class);
    }
}
