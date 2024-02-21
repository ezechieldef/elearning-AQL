<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class, 'suivre_cours', 'cours_id', 'etudiant_id')->withPivot('isCompleted');
    }
}
