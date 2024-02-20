<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SessionMeet
 *
 * @property $id
 * @property $etudiant_id
 * @property $DateDebut
 * @property $Lien
 * @property $isApproved
 * @property $isCompleted
 * @property $isRejected
 * @property $MotifRejet
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property AvisUtilisateur[] $avisUtilisateurs
 * @property Participant[] $participants
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SessionMeet extends Model
{
    //dddk

    static $rules = [
        'etudiant_id' => 'required',
        'DateDebut' => 'required',
        'Lien' => 'required',
        'isApproved' => 'required',
        'isCompleted' => 'required',
        'isRejected' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['etudiant_id', 'DateDebut', 'Lien', 'isApproved', 'isCompleted', 'isRejected', 'MotifRejet', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avisUtilisateurs()
    {
        return $this->hasMany('App\Models\AvisUtilisateur', 'session_meet_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants()
    {
        return $this->hasMany('App\Models\Participant', 'session_meet_id', 'id');
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
