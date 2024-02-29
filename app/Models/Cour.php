<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modèle Cour représentant un cours dans l'application.
 *
 * Ce modèle gère les informations relatives aux cours, incluant les métadonnées de base comme
 * le titre, la description, et la gestion des relations avec d'autres entités telles que les avis,
 * les catégories, les pièces jointes, et les questions associées.
 *
 * @property $id
 * @property $categorie_id
 * @property $Titre
 * @property $Description
 * @property $Image
 * @property $Contenu
 * @property $Professeur_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property AvisUtilisateur[] $avisUtilisateurs
 * @property Category $category
 * @property PieceJointe[] $pieceJointes
 * @property Question[] $questions
 * @property SuivreCour $suivreCour
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cour extends Model
{
    //dddk
    use SoftDeletes;

    /**
     * Les règles de validation pour un cours.
     *
     * @var array
     */
    static $rules = [
        'categorie_id' => 'required',
        'Titre' => 'required',
        'Description' => 'required',
        'Contenu' => 'required',
        'Professeur_id' => 'required',
    ];

    /**
     * Les champs associés à des fichiers dans le stockage.
     *
     * @var array
     */
    protected $fileFields = [
        "Image"
    ];

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
    protected $fillable = ['categorie_id', 'Titre', 'Description', 'Image', 'Contenu', 'Professeur_id', 'NoteAdmission', 'isPublished'];


    /**
     * Obtient les avis des utilisateurs associés à ce cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avisUtilisateurs()
    {
        return $this->hasMany('App\Models\AvisUtilisateur', 'cours_id', 'id');
    }

    /**
     * Obtient la catégorie associée à ce cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categorie_id');
    }

    /**
     * Obtient les pièces jointes associées à ce cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieceJointes()
    {
        return $this->hasMany('App\Models\PieceJointe', 'cours_id', 'id');
    }

    /**
     * Obtient les questions associées à ce cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'cours_id', 'id');
    }

    /**
     * Obtient l'inscription au cours associée.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suivreCour()
    {
        return $this->hasOne('App\Models\SuivreCour', 'cours_id', 'id');
    }

    /**
     * Obtient le professeur associé à ce cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'Professeur_id');
    }

    /**
     * Supprime les fichiers associés à ce cours du stockage.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key) {
            Storage::delete($this->$key);
        }
    }

    /**
     * Vérifie si l'image du cours existe dans le système de fichiers.
     *
     * @return bool Retourne vrai si l'image existe, faux sinon.
     */
    function imageExists(): bool
    {
        if (is_null($this->Image) || empty($this->Image)) {
            return false;
        }
        return file_exists(public_path($this->Image));
    }

    /**
     * Détermine l'état de publication du cours.
     *
     * @return string L'état de publication du cours.
     */
    function etat()
    {
        if (!$this->isReadyToBePublished) {
            return "Veuillez compléter le questionnaire d'examen au cours";
        }

        if (!$this->isPublished) {
            return "Non publié";
        } else {
            return "Publié";
        }
    }

    /**
     * Récupère les cours destinés au public.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    static function coursDuPulic()
    {
        return (new self())->where("isPublished", true)->paginate();
    }
}
