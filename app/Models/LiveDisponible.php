<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LiveDisponible
 *
 * @property $id
 * @property $professeur_id
 * @property $isPublished
 * @property $categorie_id
 * @property $Titre
 * @property $Description
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LiveDisponible extends Model
{


    static $rules = [
        'professeur_id' => 'required',
        'isPublished' => 'required',
        'categorie_id' => 'required',
        'Titre' => 'required',
        'Description' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['professeur_id', 'isPublished', 'categorie_id', 'Titre', 'Description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'professeur_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
    public function getStatutStr()
    {
        if ($this->isPublished) {
            return "Publié";
        } else {
            return "Non publié";
        }
    }
    static function livesDuPulic()
    {
        return LiveDisponible::where('isPublished', true);
    }
}
