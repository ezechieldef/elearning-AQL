<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Composition
 *
 * Modèle représentant une composition d'un utilisateur dans un cours, liant les réponses aux questions.
 *
 * Cette classe relie les réponses données par un utilisateur à des questions spécifiques dans le cadre d'un cours suivi.
 * Elle permet d'évaluer la performance de l'utilisateur en attribuant des points à chaque réponse.
 *
 * @property int $id Identifiant unique de la composition.
 * @property int $suivre_cours_id Identifiant du cours suivi associé.
 * @property int $question_id Identifiant de la question associée.
 * @property int $reponse_id Identifiant de la réponse donnée.
 * @property float $Points Points attribués pour la réponse.
 * @property \Illuminate\Support\Carbon|null $created_at Date de création.
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière mise à jour.
 *
 * @property Question $question Relation vers la question concernée.
 * @property Reponse $reponse Relation vers la réponse donnée.
 * @property SuivreCour $suivreCour Relation vers le cours suivi associé.
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Composition extends Model
{
    /**
     * Les règles de validation pour une composition.
     *
     * @var array
     */
    static $rules = [
        'suivre_cours_id' => 'required',
        'question_id' => 'required',
        'reponse_id' => 'required',
    ];

    /**
     * Les champs de fichier associés, actuellement aucun champ n'est utilisé pour stocker des fichiers.
     *
     * @var array
     */
    protected $fileFields = [];

    /**
     * Nombre d'éléments par page pour la pagination, utilisé dans les listes paginées.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = ['suivre_cours_id', 'question_id', 'reponse_id', 'Points'];

    /**
     * Relation HasOne vers la question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation pointant vers la question associée à la composition.
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }

    /**
     * Relation HasOne vers la réponse.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation pointant vers la réponse donnée dans la composition.
     */
    public function reponse()
    {
        return $this->hasOne('App\Models\Reponse', 'id', 'reponse_id');
    }

    /**
     * Relation HasOne vers le suivi de cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation pointant vers le cours suivi par l'utilisateur.
     */
    public function suivreCour()
    {
        return $this->hasOne('App\Models\SuivreCour', 'id', 'suivre_cours_id');
    }

    /**
     * Supprime les fichiers associés à cette composition du stockage.
     * Actuellement, cette méthode ne fait rien puisque `fileFields` est vide.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
