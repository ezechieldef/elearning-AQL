<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Participant représentant un participant à une session de rencontre.
 *
 * @property int $id Identifiant unique du participant
 * @property int $user_id Identifiant de l'utilisateur participant
 * @property int $session_meet_id Identifiant de la session de rencontre associée
 * @property bool $isProfessor Indique si le participant est le professeur
 * @property bool $isPresent Indique si le participant était présent
 * @property \Illuminate\Support\Carbon|null $created_at Date de création de l'entrée
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière mise à jour de l'entrée
 *
 * @property SessionMeet $sessionMeet La session de rencontre à laquelle le participant est associé
 * @property User $user L'utilisateur associé à ce participant
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Participant extends Model
{
    /**
     * Les règles de validation pour les champs du modèle.
     */
    static $rules = [
        'user_id' => 'required',
        'session_meet_id' => 'required',
        'isPresent' => 'required',
    ];

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'session_meet_id', 'isProfessor', 'isPresent'];

    /**
     * Obtient la session de rencontre associée au participant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation HasOne avec SessionMeet
     */
    public function sessionMeet()
    {
        return $this->hasOne('App\Models\SessionMeet', 'id', 'session_meet_id');
    }

    /**
     * Obtient l'utilisateur associé au participant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation HasOne avec User
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    /**
     * Supprime les fichiers associés au participant lors de la suppression de l'entrée.
     * Actuellement, cette fonction ne fait rien car il n'y a pas de fichiers directement associés aux participants,
     * mais elle est présente pour une éventuelle future utilisation et pour respecter une interface cohérente.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
