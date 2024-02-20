<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Composition
 *
 * @property $id
 * @property $suivre_cours_id
 * @property $question_id
 * @property $reponse_id
 * @property $Points
 * @property $created_at
 * @property $updated_at
 *
 * @property Question $question
 * @property Reponse $reponse
 * @property SuivreCour $suivreCour
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Composition extends Model
{
    //dddk

    static $rules = [
        'suivre_cours_id' => 'required',
        'question_id' => 'required',
        'reponse_id' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['suivre_cours_id', 'question_id', 'reponse_id', 'Points'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reponse()
    {
        return $this->hasOne('App\Models\Reponse', 'id', 'reponse_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suivreCour()
    {
        return $this->hasOne('App\Models\SuivreCour', 'id', 'suivre_cours_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
