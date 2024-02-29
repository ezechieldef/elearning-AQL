<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AvisUtilisateur
 * Représentant un avis laissé par un utilisateur sur un cours.
 *
 * Cette classe gère les avis des utilisateurs, incluant les notes, les commentaires, et les marques de lecture.
 * Elle établit également des relations avec le cours concerné, la session de rencontre (si applicable), et l'utilisateur.
 * @property $id
 * @property $user_id
 * @property $cours_id
 * @property $session_meet_id
 * @property $Note
 * @property $Commentaire
 * @property $isRead
 * @property $created_at
 * @property $updated_at
 *
 * @property Cour $cour
 * @property SessionMeet $sessionMeet
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AvisUtilisateur extends Model
{
    /**
     * Les règles de validation pour un avis utilisateur.
     *
     * @var array
     */
    static $rules = [
        'user_id' => 'required',
        'Note' => 'required',
        'Commentaire' => 'required',
        'isRead' => 'required',
    ];

    /**
     * Les champs associés à des fichiers dans le stockage.
     * Actuellement non utilisé car $fileFields est vide.
     *
     * @var array
     */
    protected $fileFields = [];

    /**
     * Nombre d'éléments par page pour la pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cours_id', 'session_meet_id', 'Note', 'Commentaire', 'isRead'
    ];

    /**
     * Obtient le cours associé à cet avis.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation pointant vers le cours concerné par l'avis.
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    /**
     * Obtient la session de rencontre associée à cet avis, le cas échéant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation pointant vers la session de rencontre concernée par l'avis.
     */
    public function sessionMeet()
    {
        return $this->hasOne('App\Models\SessionMeet', 'id', 'session_meet_id');
    }

    /**
     * Obtient l'utilisateur qui a laissé cet avis.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation pointant vers l'utilisateur ayant créé l'avis.
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * Supprime les fichiers associés à cet avis du stockage.
     * Actuellement, cette fonction ne fait rien puisque `fileFields` est vide.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
