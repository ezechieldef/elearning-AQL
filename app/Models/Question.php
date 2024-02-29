<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Représente une question associée à un cours.
 *
 * Cette classe gère les informations relatives aux questions posées dans les cours, incluant le libellé de la question, les points attribués, et les réponses associées.
 *
 * @property int $id Identifiant unique de la question
 * @property int $cours_id Identifiant du cours associé
 * @property string $Libelle Libellé de la question
 * @property int $Point Nombre de points attribués à la question
 * @property \Illuminate\Support\Carbon|null $created_at Date de création de la question
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière modification de la question
 *
 * @property Composition[] $compositions Les compositions qui incluent cette question
 * @property Cour $cour Le cours auquel la question est associée
 * @property Reponse[] $reponses Les réponses associées à cette question
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Question extends Model
{
    /**
     * Règles de validation pour créer ou mettre à jour une question.
     *
     * @var array
     */
    static $rules = [
        'cours_id' => 'required',
        'Libelle' => 'required',
        'Point' => 'required',
    ];

    /**
     * Définit les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = ['cours_id', 'Libelle', 'Point'];

    /**
     * Nombre d'éléments par page lors de l'utilisation de la pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Relation "hasMany" indiquant qu'une question peut être présente dans plusieurs compositions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compositions()
    {
        return $this->hasMany('App\Models\Composition', 'question_id', 'id');
    }

    /**
     * Relation "hasOne" indiquant qu'une question est associée à un seul cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    /**
     * Relation "hasMany" permettant d'accéder aux réponses liées à cette question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reponses()
    {
        return $this->hasMany('App\Models\Reponse', 'question_id', 'id');
    }

    /**
     * Méthode pour supprimer les fichiers associés à la question.
     *
     * Actuellement, cette méthode est préparée pour la suppression de fichiers, mais elle n'est pas utilisée car `fileFields` est vide.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
