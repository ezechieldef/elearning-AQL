<?php

namespace Tests\Feature;

use App\Models\AvisUtilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvisUtilisateurControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_avis_utilisateurs()
    {
        $response = $this->get(route('avis-utilisateurs.index'));

        $response->assertStatus(200);
        $response->assertViewIs('avis-utilisateur.index');
    }

    /** @test */
    public function create_shows_create_view()
    {
        $response = $this->get(route('avis-utilisateurs.create'));

        $response->assertStatus(200);
        $response->assertViewIs('avis-utilisateur.create');
    }

    /** @test */
    public function store_saves_new_avis_utilisateur_and_redirects()
    {
        $avisUtilisateurData = [
            // Utilisez des données valides selon les règles de votre modèle
            'nom' => 'Un Nom Valide',
            'commentaire' => 'Un commentaire pertinent ici.',
            // Ajoutez d'autres champs requis
        ];

        $response = $this->post(route('avis-utilisateurs.store'), $avisUtilisateurData);

        $response->assertRedirect(route('avis-utilisateurs.index'));
        $this->assertDatabaseHas('avis_utilisateurs', $avisUtilisateurData);
    }

    /** @test */
    public function show_displays_specified_avis_utilisateur()
    {
        $avisUtilisateur = AvisUtilisateur::factory()->create();

        $response = $this->get(route('avis-utilisateurs.show', $avisUtilisateur));

        $response->assertStatus(200);
        $response->assertViewIs('avis-utilisateur.show');
        $response->assertViewHas('avisUtilisateur', $avisUtilisateur);
    }

    /** @test */
    public function edit_shows_edit_view_for_avis_utilisateur()
    {
        $avisUtilisateur = AvisUtilisateur::factory()->create();

        $response = $this->get(route('avis-utilisateurs.edit', $avisUtilisateur));

        $response->assertStatus(200);
        $response->assertViewIs('avis-utilisateur.edit');
        $response->assertViewHas('avisUtilisateur', $avisUtilisateur);
    }

    /** @test */
    public function update_modifies_and_redirects()
    {
        $avisUtilisateur = AvisUtilisateur::factory()->create();
        $newData = [
            // Données pour la mise à jour
        ];

        $response = $this->put(route('avis-utilisateurs.update', $avisUtilisateur), $newData);

        $response->assertRedirect(route('avis-utilisateurs.index'));
        $this->assertDatabaseHas('avis_utilisateurs', $newData);
    }

    /** @test */
    public function destroy_deletes_and_redirects()
    {
        $avisUtilisateur = AvisUtilisateur::factory()->create();

        $response = $this->delete(route('avis-utilisateurs.destroy', $avisUtilisateur));

        $response->assertRedirect(route('avis-utilisateurs.index'));
        $this->assertSoftDeleted($avisUtilisateur);
    }
}
