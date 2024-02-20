<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Participant
 *
 * @property $id
 * @property $user_id
 * @property $session_meet_id
 * @property $isProfessor
 * @property $isPresent
 * @property $created_at
 * @property $updated_at
 *
 * @property SessionMeet $sessionMeet
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Participant extends Model
{
    //dddk

    static $rules = [
        'user_id' => 'required',
        'session_meet_id' => 'required',
        'isPresent' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'session_meet_id', 'isProfessor', 'isPresent'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sessionMeet()
    {
        return $this->hasOne('App\Models\SessionMeet', 'id', 'session_meet_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
