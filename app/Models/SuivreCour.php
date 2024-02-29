<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modèle SuivreCour
 *
 * Ce modèle représente l'inscription et le suivi d'un étudiant dans un cours.
 * Il utilise les propriétés de suppression douce pour permettre la désactivation temporaire des enregistrements sans les supprimer définitivement.
 *
 * @property int $id Identifiant unique de l'inscription
 * @property int $cours_id Identifiant du cours auquel l'étudiant est inscrit
 * @property int $etudiant_id Identifiant de l'étudiant inscrit au cours
 * @property bool $isCompleted Indique si l'étudiant a terminé le cours
 * @property float|null $Note Note obtenue par l'étudiant dans le cours
 * @property string $DateInscription Date à laquelle l'étudiant s'est inscrit au cours
 * @property string|null $DateDebutComposition Date de début de composition du cours par l'étudiant
 * @property string|null $DateCompletion Date à laquelle l'étudiant a terminé le cours
 * @property \Illuminate\Support\Carbon|null $deleted_at Date de suppression douce de l'inscription
 * @property \Illuminate\Support\Carbon|null $created_at Date de création de l'inscription
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière mise à jour de l'inscription
 *
 * @property Composition $composition Composition associée à l'inscription au cours
 * @property Cour $cour Détails du cours auquel l'étudiant est inscrit
 * @property User $user Détails de l'étudiant inscrit au cours
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SuivreCour extends Model
{
    use SoftDeletes;

    /**
     * Règles de validation pour les champs du modèle.
     */
    static $rules = [
        'cours_id' => 'required',
        'etudiant_id' => 'required',
        'isCompleted' => 'required',
        'DateInscription' => 'required',
    ];

    /**
     * Attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'cours_id', 'etudiant_id', 'isCompleted', 'Note',
        'DateInscription', 'DateDebutComposition', 'DateCompletion'
    ];

    /**
     * Définit la relation one-to-one avec le modèle Composition.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function composition()
    {
        return $this->hasOne('App\Models\Composition', 'suivre_cours_id', 'id');
    }

    /**
     * Définit la relation one-to-one avec le modèle Cour.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    /**
     * Définit la relation one-to-one avec le modèle User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'etudiant_id');
    }

    /**
     * Supprime les fichiers associés à cette inscription, le cas échéant.
     * Cette méthode itère sur les champs de fichier spécifiés et supprime les fichiers du système de fichiers.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
