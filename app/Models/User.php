<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modèle User
 *
 * Représente un utilisateur dans le système, pouvant être un étudiant, un professeur, ou un administrateur.
 * Utilise Laravel Sanctum pour les tokens API, Spatie Permission pour les rôles et permissions, et les notifications.
 *
 * @property int $id Identifiant unique de l'utilisateur
 * @property string $name Nom de l'utilisateur
 * @property string $email Adresse email de l'utilisateur
 * @property \Illuminate\Support\Carbon|null $email_verified_at Date de vérification de l'email
 * @property string $password Mot de passe de l'utilisateur
 * @property string|null $remember_token Token de "Se souvenir de moi"
 * @property \Illuminate\Support\Carbon|null $created_at Date de création du compte utilisateur
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière mise à jour du compte utilisateur
 *
 * @property Cour[] $cours Cours enseignés par le professeur
 * @property AvisUtilisateur[] $avisUtilisateurs Avis laissés par ou pour l'utilisateur
 * @property SessionMeet[] $sessionMeets Sessions de rencontre associées à l'utilisateur
 * @property bool $estUnProfesseur Indique si l'utilisateur est un professeur
 * @property bool $estUnEtudiant Indique si l'utilisateur est un étudiant
 * @property bool $estUnAdministrateur Indique si l'utilisateur est un administrateur
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

use App\Models\Cours;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * Attributs pouvant être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Attributs cachés lors de la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attributs devant être transformés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Détermine si l'utilisateur est un professeur.
     *
     * @return bool
     */
    public function estUnProfesseur()
    {
        return $this->hasRole('PROFESSEUR');
    }

    /**
     * Détermine si l'utilisateur est un étudiant.
     *
     * @return bool
     */
    public function estUnEtudiant()
    {
        return $this->hasRole('ETUDIANT');
    }

    /**
     * Détermine si l'utilisateur est un administrateur.
     *
     * @return bool
     */
    public function estUnAdministrateur()
    {
        return $this->hasRole('SUPER-ADMIN');
    }

    /**
     * Relation avec les cours enseignés par le professeur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function cours()
    {
        return $this->hasMany(Cour::class, "professeur_id");
    }

    /**
     * Relation avec les avis utilisateurs associés.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function avisUtilisateurs()
    {
        return $this->hasMany(AvisUtilisateur::class);
    }

    /**
     * Relation avec les sessions de rencontre associées à l'utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function sessionMeets()
    {
        return $this->hasMany(SessionMeet::class);
    }

    /**
     * Relation many-to-many avec les cours suivis par l'étudiant.
     * Inclut la pivot 'isCompleted' pour indiquer si le cours a été complété.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Cours::class, 'suivre_cours', 'etudiant_id', 'cours_id')->withPivot('isCompleted');
    }

    /**
     * Relation avec les propositions de live disponibles pour le professeur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function liveDisponibles()
    {
        return $this->hasMany(LiveDisponible::class, 'professeur_id');
    }
}
