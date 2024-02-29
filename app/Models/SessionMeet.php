<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe SessionMeet pour gérer les informations des sessions de rencontre.
 *
 * @property int $id Identifiant unique de la session.
 * @property int $etudiant_id Identifiant de l'étudiant associé à la session.
 * @property string $DateDebut Date et heure de début de la session.
 * @property string $Lien Lien pour accéder à la session de rencontre.
 * @property bool $isApproved Indique si la session est approuvée.
 * @property bool $isCompleted Indique si la session est terminée.
 * @property bool $isRejected Indique si la session a été rejetée.
 * @property string|null $MotifRejet Raison du rejet de la session, le cas échéant.
 * @property string $status Statut de la session.
 * @property \Illuminate\Support\Carbon|null $created_at Date de création de l'enregistrement.
 * @property \Illuminate\Support\Carbon|null $updated_at Date de la dernière mise à jour.
 *
 * @property AvisUtilisateur[] $avisUtilisateurs Avis des utilisateurs sur la session.
 * @property Participant[] $participants Liste des participants à la session.
 * @property User $user Utilisateur associé à la session (généralement l'étudiant).
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SessionMeet extends Model
{
    /**
     * Règles de validation pour une nouvelle session ou la mise à jour d'une session existante.
     */
    static $rules = [
        'etudiant_id' => 'required',
        'DateDebut' => 'required',
        'Lien' => 'required',
        'isApproved' => 'required',
        'isCompleted' => 'required',
        'isRejected' => 'required',
    ];

    /**
     * Attributs qui peuvent être assignés en masse.
     */
    protected $fillable = ['etudiant_id', 'DateDebut', 'Lien', 'isApproved', 'isCompleted', 'isRejected', 'MotifRejet', 'status'];

    protected $perPage = 20;

    /**
     * Relation avec `AvisUtilisateur`, permettant d'accéder aux avis laissés par les utilisateurs sur la session.
     */
    public function avisUtilisateurs()
    {
        return $this->hasMany('App\Models\AvisUtilisateur', 'session_meet_id', 'id');
    }

    /**
     * Relation avec `Participant`, permettant d'accéder à la liste des participants de la session.
     */
    public function participants()
    {
        return $this->hasMany('App\Models\Participant', 'session_meet_id', 'id');
    }

    /**
     * Relation avec `User`, permettant d'accéder à l'utilisateur (étudiant) associé à la session.
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'etudiant_id');
    }

    /**
     * Méthode pour supprimer les fichiers associés à la session.
     * Actuellement, il n'y a pas de champ de fichier spécifié, mais la méthode est préparée pour une utilisation future.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
