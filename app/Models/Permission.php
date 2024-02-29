<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Permission représentant les permissions attribuées à des rôles dans l'application.
 *
 * Cette classe utilise le trait HasFactory pour permettre la création facile de permissions via des factory pour les tests ou le seeding de la base de données.
 */
class Permission extends Model
{
    use HasFactory;

    /**
     * Définit la relation entre une permission et son rôle.
     *
     * Chaque permission est attribuée à un seul rôle, ce qui est représenté par cette relation "belongsTo".
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo La relation inverse qui lie cette permission à un rôle spécifique.
     */
    function role(){
        return $this->belongsTo(Role::class);
    }
}
