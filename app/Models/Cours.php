<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cours
 *
 * Représente un cours au sein de l'application, permettant de gérer les relations entre les cours et les utilisateurs.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $users Les utilisateurs (étudiants) associés à ce cours.
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cours extends Model
{
    use HasFactory;

    /**
     * Définit la relation N:N (many-to-many) entre les cours et les utilisateurs (étudiants).
     *
     * Cette relation utilise la table pivot 'suivre_cours' pour tracer les inscriptions des étudiants aux cours,
     * ainsi que pour marquer si un étudiant a complété le cours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany La relation many-to-many avec User.
     */
    public function users() {
        // La méthode belongsToMany crée une relation many-to-many avec le modèle User.
        // 'suivre_cours' est le nom de la table pivot utilisée pour maintenir cette relation.
        // 'cours_id' est la clé étrangère dans la table pivot qui référence l'ID de ce cours.
        // 'etudiant_id' est la clé étrangère dans la table pivot qui référence l'ID de l'utilisateur (étudiant) inscrit au cours.
        // withPivot('isCompleted') inclut la colonne 'isCompleted' de la table pivot dans les résultats,
        // permettant de vérifier si un étudiant a complété le cours.
        return $this->belongsToMany(User::class, 'suivre_cours', 'cours_id', 'etudiant_id')->withPivot('isCompleted');
    }
}
