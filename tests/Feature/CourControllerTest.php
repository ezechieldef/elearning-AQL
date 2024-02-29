<?php

namespace Tests\Feature;

use App\Models\Cour;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function index_displays_cours()
    {
        $user = User::factory()->create();
        $cour = Cour::factory()->create(['professeur_id' => $user->id]);

        $response = $this->actingAs($user)->get('/cours');

        $response->assertStatus(200);
        $response->assertViewIs('cour.index');
        $response->assertViewHas('cours');
    }

    /** @test */
    public function create_displays_view()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/cours/create');

        $response->assertStatus(200);
        $response->assertViewIs('cour.create');
    }

    /** @test */
    public function store_saves_and_redirects()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $courData = [
            'categorie_id' => $category->id,
            'Titre' => $this->faker->sentence,
            'Description' => $this->faker->sentence,
            'Contenu' => $this->faker->paragraph,
            // Suppose 'Image' handling is done appropriately
        ];

        $response = $this->actingAs($user)->post('/cours', $courData);

        $response->assertRedirect('/cours');
        $response->assertSessionHas('success', 'Cour a été enregistré avec succès !.');
        $this->assertDatabaseHas('cours', ['Titre' => $courData['Titre']]);
    }

    /** @test */
    public function edit_displays_view()
    {
        $user = User::factory()->create();
        $cour = Cour::factory()->create(['professeur_id' => $user->id]);

        $response = $this->actingAs($user)->get("/cours/{$cour->id}/edit");

        $response->assertStatus(200);
        $response->assertViewIs('cour.edit');
    }

    /** @test */
    public function update_saves_and_redirects()
    {
        $user = User::factory()->create();
        $cour = Cour::factory()->create(['professeur_id' => $user->id]);
        $newData = [
            'Titre' => 'Updated Title',
            'Description' => 'Updated Description',
            'Contenu' => 'Updated Content',
            // Suppose 'Image' handling is done appropriately
        ];

        $response = $this->actingAs($user)->put("/cours/{$cour->id}", $newData);

        $response->assertRedirect('/cours');
        $response->assertSessionHas('success', 'Cour a été mis à jour avec succès');
        $this->assertDatabaseHas('cours', ['Titre' => 'Updated Title']);
    }

    /** @test */
    public function delete_destroys_cour_and_redirects()
    {
        $user = User::factory()->create();
        $cour = Cour::factory()->create(['professeur_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/cours/{$cour->id}");

        $response->assertRedirect('/cours');
        $response->assertSessionHas('success', 'Cour a été supprimé avec success');
        $this->assertDeleted($cour);
    }
}
