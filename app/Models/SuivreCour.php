<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SuivreCour
 *
 * @property $id
 * @property $cours_id
 * @property $etudiant_id
 * @property $isCompleted
 * @property $Note
 * @property $DateInscription
 * @property $DateDebutComposition
 * @property $DateCompletion
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Composition $composition
 * @property Cour $cour
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SuivreCour extends Model
{
    //dddk
    use SoftDeletes;

    static $rules = [
        'cours_id' => 'required',
        'etudiant_id' => 'required',
        'isCompleted' => 'required',
        'DateInscription' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cours_id', 'etudiant_id', 'isCompleted', 'Note', 'DateInscription', 'DateDebutComposition', 'DateCompletion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function composition()
    {
        return $this->hasOne('App\Models\Composition', 'suivre_cours_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'etudiant_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
