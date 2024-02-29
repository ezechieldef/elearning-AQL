<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe LiveDisponible
 * Représente un live disponible créé par un professeur pouvant être publié pour les utilisateurs.
 *
 * @property int $id Identifiant unique du live disponible
 * @property int $professeur_id Identifiant du professeur qui propose le live
 * @property bool $isPublished Statut de publication du live
 * @property int $categorie_id Identifiant de la catégorie associée au live
 * @property string $Titre Titre du live
 * @property string $Description Description détaillée du live
 * @property \Illuminate\Support\Carbon|null $created_at Date de création
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière mise à jour
 *
 * @property Category $category Catégorie associée au live
 * @property User $user Professeur qui propose le live
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LiveDisponible extends Model
{
    /**
     * Règles de validation pour les champs du modèle.
     */
    static $rules = [
        'professeur_id' => 'required',
        'isPublished' => 'required',
        'categorie_id' => 'required',
        'Titre' => 'required',
        'Description' => 'required',
    ];

    /**
     * Champs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = ['professeur_id', 'isPublished', 'categorie_id', 'Titre', 'Description'];

    /**
     * Obtient la catégorie associée au live.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation HasOne avec Category
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categorie_id');
    }

    /**
     * Obtient le professeur qui propose le live.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation HasOne avec User
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'professeur_id');
    }

    /**
     * Supprime les fichiers associés au live lors de la suppression de l'entrée.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }

    /**
     * Retourne le statut de publication du live sous forme de chaîne de caractères.
     *
     * @return string Le statut de publication
     */
    public function getStatutStr()
    {
        return $this->isPublished ? "Publié" : "Non publié";
    }

    /**
     * Requête pour obtenir tous les lives publiés.
     *
     * @return \Illuminate\Database\Eloquent\Builder Requête pour les lives publiés
     */
    static function livesDuPulic()
    {
        return LiveDisponible::where('isPublished', true);
    }
}
