<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AvisUtilisateur
 *
 * @property $id
 * @property $user_id
 * @property $cours_id
 * @property $session_meet_id
 * @property $Note
 * @property $Commentaire
 * @property $isRead
 * @property $created_at
 * @property $updated_at
 *
 * @property Cour $cour
 * @property SessionMeet $sessionMeet
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AvisUtilisateur extends Model
{
    //dddk
    
    static $rules = [
		'user_id' => 'required',
		'Note' => 'required',
		'Commentaire' => 'required',
		'isRead' => 'required',
    ];
    protected $fileFields = [];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','cours_id','session_meet_id','Note','Commentaire','isRead'];


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
    
    public function deleteFiles(){
        foreach (($this->fileFields??[]) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
