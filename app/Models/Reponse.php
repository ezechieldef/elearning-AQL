<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reponse
 *
 * @property $id
 * @property $question_id
 * @property $Libelle
 * @property $isCorrect
 * @property $created_at
 * @property $updated_at
 *
 * @property Composition[] $compositions
 * @property Question $question
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reponse extends Model
{
    //dddk

    static $rules = [
        'question_id' => 'required',
        'Libelle' => 'required',
        'isCorrect' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['question_id', 'Libelle', 'isCorrect'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compositions()
    {
        return $this->hasMany('App\Models\Composition', 'reponse_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
