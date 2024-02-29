<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Représente une réponse liée à une question spécifique.
 *
 * Cette classe gère les réponses qui peuvent être données à une question, y compris si la réponse est correcte ou non.
 *
 * @property int $id Identifiant unique de la réponse
 * @property int $question_id Identifiant de la question associée
 * @property string $Libelle Texte de la réponse
 * @property bool $isCorrect Indique si la réponse est correcte
 * @property \Illuminate\Support\Carbon|null $created_at Date de création de l'entrée
 * @property \Illuminate\Support\Carbon|null $updated_at Date de la dernière mise à jour
 *
 * @property Composition[] $compositions Les compositions incluant cette réponse
 * @property Question $question La question à laquelle cette réponse appartient
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reponse extends Model
{
    /**
     * Règles de validation pour une réponse.
     *
     * Ces règles sont utilisées pour valider les données lors de la création ou de la mise à jour des réponses.
     */
    static $rules = [
        'question_id' => 'required',
        'Libelle' => 'required',
        'isCorrect' => 'required',
    ];

    /**
     * Les attributs qui peuvent être assignés massivement.
     *
     * Permet d'assigner directement ces attributs lors de la création ou mise à jour de l'entité.
     */
    protected $fillable = ['question_id', 'Libelle', 'isCorrect'];

    /**
     * Nombre d'éléments par page lors de l'utilisation de la pagination.
     */
    protected $perPage = 20;

    /**
     * Relation "hasMany" avec la table `Composition`.
     *
     * Cette relation indique qu'une réponse peut être utilisée dans plusieurs compositions.
     */
    public function compositions()
    {
        return $this->hasMany('App\Models\Composition', 'reponse_id', 'id');
    }

    /**
     * Relation "hasOne" avec la classe `Question`.
     *
     * Cette relation permet d'accéder à la question associée à cette réponse.
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }

    /**
     * Méthode pour supprimer les fichiers associés à la réponse.
     *
     * Bien que `fileFields` soit actuellement vide, cette méthode permettrait de supprimer les fichiers liés à la réponse si nécessaire.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
