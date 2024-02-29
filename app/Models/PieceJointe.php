<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Représente une pièce jointe associée à un cours.
 *
 * Cette classe gère les informations relatives aux pièces jointes, telles que leur nom, adresse, type, et le cours auquel elles sont associées.
 *
 * @property int $id Identifiant unique de la pièce jointe
 * @property string $Nom Nom de la pièce jointe
 * @property string $Adresse URL ou chemin d'accès à la pièce jointe
 * @property int $cours_id Identifiant du cours associé
 * @property string $Type Type de la pièce jointe (exemple: PDF, image, etc.)
 * @property \Illuminate\Support\Carbon|null $created_at Date de création
 * @property \Illuminate\Support\Carbon|null $updated_at Date de dernière modification
 *
 * @property Cour $cour Relation vers le cours associé
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PieceJointe extends Model
{
    /**
     * Règles de validation pour une nouvelle pièce jointe.
     *
     * @var array
     */
    static $rules = [
        'Nom' => 'required',
        'Adresse' => 'required',
        'cours_id' => 'required',
    ];

    /**
     * Liste des champs pouvant être affectés en masse.
     *
     * @var array
     */
    protected $fillable = ['Nom', 'Adresse', 'cours_id', 'Type'];

    /**
     * Nombre d'éléments par page lors de la pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Établit la relation avec le cours associé.
     *
     * Utilise une relation "hasOne" indiquant qu'une pièce jointe est associée à un seul cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne Relation vers le cours associé.
     */
    public function cour()
    {
        return $this->hasOne('App\Models\Cour', 'id', 'cours_id');
    }

    /**
     * Supprime les fichiers associés à la pièce jointe de l'espace de stockage.
     *
     * Parcourt les champs de fichier définis et supprime le fichier du système de fichiers.
     */
    public function deleteFiles()
    {
        foreach (($this->fileFields ?? []) as $key => $value) {
            Storage::delete($this->$key);
        }
    }
}
