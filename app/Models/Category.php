<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * Représentant une catégorie de cours.
 *
 * Cette classe permet de gérer les catégories auxquelles les cours peuvent appartenir,
 * incluant leur libellé et description. Elle définit également la relation entre
 * les catégories et les cours qui y sont associés.
 * @property $id
 * @property $Libelle
 * @property $Description
 * @property $created_at
 * @property $updated_at
 *
 * @property Cour[] $cours
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    /**
     * Les règles de validation pour une catégorie.
     *
     * @var array
     */
    static $rules = [
        'Libelle' => 'required', // Le libellé de la catégorie est requis.
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
     * Inclut le libellé et la description de la catégorie.
     *
     * @var array
     */
    protected $fillable = ['Libelle', 'Description'];

    /**
     * Définit la relation "hasMany" vers les cours.
     *
     * Cette fonction établit la relation entre une catégorie et les cours qui lui sont associés,
     * permettant de récupérer facilement tous les cours d'une catégorie donnée.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Relation indiquant que plusieurs cours peuvent appartenir à une catégorie.
     */
    public function cours()
    {
        return $this->hasMany('App\Models\Cour', 'categorie_id', 'id');
    }

    /**
     * Supprime les fichiers associés à cette catégorie du stockage.
     * Actuellement, cette fonction ne fait rien puisque `fileFields` est vide.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
