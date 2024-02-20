<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @property $id
 * @property $cours_id
 * @property $Libelle
 * @property $Point
 * @property $created_at
 * @property $updated_at
 *
 * @property Composition[] $compositions
 * @property Cour $cour
 * @property Reponse[] $reponses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Question extends Model
{
    //dddk

    static $rules = [
        'cours_id' => 'required',
        'Libelle' => 'required',
        'Point' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cours_id', 'Libelle', 'Point'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compositions()
    {
        return $this->hasMany('App\Models\Composition', 'question_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reponses()
    {
        return $this->hasMany('App\Models\Reponse', 'question_id', 'id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
