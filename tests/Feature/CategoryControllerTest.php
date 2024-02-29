<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_displays_categories()
    {
        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
        $response->assertViewIs('category.index');
    }

    /** @test */
    public function create_shows_create_view()
    {
        $response = $this->get(route('categories.create'));

        $response->assertStatus(200);
        $response->assertViewIs('category.create');
    }

    /** @test */
    public function store_saves_and_redirects()
    {
        $categoryData = [
            // Ajoutez ici les données de test valides pour votre modèle Category.
            'name' => 'Test Category',
            // Autres champs nécessaires selon votre modèle et ses règles.
        ];

        $response = $this->post(route('categories.store'), $categoryData);

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('categories', $categoryData);
    }

    /** @test */
    public function show_displays_view()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.show', $category));

        $response->assertStatus(200);
        $response->assertViewIs('category.show');
        $response->assertViewHas('category', $category);
    }

    /** @test */
    public function edit_shows_edit_view()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.edit', $category));

        $response->assertStatus(200);
        $response->assertViewIs('category.edit');
        $response->assertViewHas('category', $category);
    }

    /** @test */
    public function update_saves_and_redirects()
    {
        $category = Category::factory()->create();
        $newData = [
            // Données pour la mise à jour.
            'name' => 'Updated Category',
            // Ajoutez d'autres champs nécessaires
        ];

        $response = $this->put(route('categories.update', $category), $newData);

        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('categories', $newData);
    }

    /** @test */
    public function destroy_deletes_and_redirects()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category));

        $response->assertRedirect(route('categories.index'));
        $this->assertModelMissing($category);
    }
}
