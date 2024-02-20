<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cour
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

    static $rules = [
        'categorie_id' => 'required',
        'Titre' => 'required',
        'Description' => 'required',
        'Contenu' => 'required',
        'Professeur_id' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categorie_id', 'Titre', 'Description', 'Image', 'Contenu', 'Professeur_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avisUtilisateurs()
    {
        return $this->hasMany('App\Models\AvisUtilisateur', 'cours_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieceJointes()
    {
        return $this->hasMany('App\Models\PieceJointe', 'cours_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'cours_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suivreCour()
    {
        return $this->hasOne('App\Models\SuivreCour', 'cours_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'Professeur_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
