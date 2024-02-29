<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Cour[] $cours
 * @property AvisUtilisateur[] $avisUtilisateurs
 * @property SessionMeet[] $sessionMeets
 * @property bool $estUnProfesseur
 * @property bool $estUnEtudiant
 * @property bool $estUnAdministrateur
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

use App\Models\Cours;


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
        'Type',
        // 'role_id'
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
    public function estUnAdministrateur()
    {
        return $this->hasRole('SUPER-ADMIN');
    }
    function cours()
    {
        return $this->hasMany(Cour::class, "Professeur_id");
    }
    function avisUtilisateurs()
    {
        return $this->hasMany(AvisUtilisateur::class);
    }
    function sessionMeets()
    {
        return $this->hasMany(SessionMeet::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Cours::class, 'suivre_cours', 'etudiant_id', 'cours_id')->withPivot('isCompleted');
    }
    /**
     * Les proposition de live disponible
     */
    public function liveDisponibles()
    {
        return $this->hasMany(LiveDisponible::class, 'professeur_id');
    }
}
