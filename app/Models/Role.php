<?php

namespace App\Models;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory; // Utilise le trait HasFactory pour permettre la génération d'usines pour le modèle.

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    // Ici, vous pouvez spécifier les colonnes de la table des rôles qui peuvent être assignées en masse.
    // Exemple : protected $fillable = ['name', 'description'];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Les attributs cachés pour les arrays.
     *
     * @var array
     */
    protected $hidden = ['name'];
    // Les attributs spécifiés ici ne seront pas visibles lors de la conversion du modèle en array ou JSON.

    /**
     * Relation Many-to-Many avec le modèle Permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function permissions(){
        return $this->belongsToMany(Permission::class);
        // Cette méthode définit une relation "many-to-many" avec le modèle Permission.
    }


}
