<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PieceJointe
 *
 * @property $id
 * @property $Nom
 * @property $Adresse
 * @property $cours_id
 * @property $Type
 * @property $created_at
 * @property $updated_at
 *
 * @property Cour $cour
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PieceJointe extends Model
{
    //dddk

    static $rules = [
        'Nom' => 'required',
        'Adresse' => 'required',
        'cours_id' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nom', 'Adresse', 'cours_id', 'Type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
