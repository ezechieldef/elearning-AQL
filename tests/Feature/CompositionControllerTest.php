<?php

namespace Tests\Feature;

use App\Models\Composition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompositionControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_compositions()
    {
        $response = $this->get(route('compositions.index'));

        $response->assertStatus(200);
        $response->assertViewIs('composition.index');
    }

    /** @test */
    public function create_shows_create_view()
    {
        $response = $this->get(route('compositions.create'));

        $response->assertStatus(200);
        $response->assertViewIs('composition.create');
    }

    /** @test */
    public function store_saves_new_composition_and_redirects()
    {
        $compositionData = [
            // Ajoutez ici les données nécessaires, conformes aux règles de votre modèle
        ];

        $response = $this->post(route('compositions.store'), $compositionData);

        $response->assertRedirect(route('compositions.index'));
        $this->assertDatabaseHas('compositions', $compositionData);
    }

    /** @test */
    public function show_displays_specified_composition()
    {
        $composition = Composition::factory()->create();

        $response = $this->get(route('compositions.show', $composition));

        $response->assertStatus(200);
        $response->assertViewIs('composition.show');
        $response->assertViewHas('composition', $composition);
    }

    /** @test */
    public function edit_shows_edit_view_for_composition()
    {
        $composition = Composition::factory()->create();

        $response = $this->get(route('compositions.edit', $composition));

        $response->assertStatus(200);
        $response->assertViewIs('composition.edit');
        $response->assertViewHas('composition', $composition);
    }

    /** @test */
    public function update_modifies_and_redirects()
    {
        $composition = Composition::factory()->create();
        $newData = [
            // Données pour la mise à jour
        ];

        $response = $this->put(route('compositions.update', $composition), $newData);

        $response->assertRedirect(route('compositions.index'));
        $this->assertDatabaseHas('compositions', $newData);
    }

    /** @test */
    public function destroy_deletes_and_redirects()
    {
        $composition = Composition::factory()->create();

        $response = $this->delete(route('compositions.destroy', $composition));

        $response->assertRedirect(route('compositions.index'));
        $this->assertSoftDeleted($composition);
    }
}
