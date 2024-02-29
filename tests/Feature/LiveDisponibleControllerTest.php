<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\LiveDisponible;

class LiveDisponibleControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_view_the_live_disponible_index_page()
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $response = $this->actingAs($user)->get(route('proposition-live.index'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('live-disponible.index');
    }

    /** @test */
    public function a_user_can_view_the_create_page_for_live_disponible()
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $response = $this->actingAs($user)->get(route('proposition-live.create'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('live-disponible.create');
    }

    /** @test */
    public function a_user_can_store_a_new_live_disponible()
    {
        // Arrange
        $user = User::factory()->create();
        $liveDisponibleData = [
            'categorie_id' => 1, // Assume this category exists
            'Titre' => 'Test Live',
            'Description' => 'This is a test description for a live.',
            // Add any other required fields
        ];

        // Act
        $response = $this->actingAs($user)->post(route('proposition-live.store'), $liveDisponibleData);

        // Assert
        $response->assertRedirect();
        $this->assertDatabaseHas('live_disponibles', ['Titre' => 'Test Live']);
    }

    /** @test */
    public function a_user_can_update_a_live_disponible()
    {
        // Arrange
        $user = User::factory()->create();
        $liveDisponible = LiveDisponible::factory()->create(['professeur_id' => $user->id]);
        $updatedData = [
            'categorie_id' => 2, // Assume this category exists and is different
            'Titre' => 'Updated Live Title',
            'Description' => 'Updated description.',
            // Add any other required fields
        ];

        // Act
        $response = $this->actingAs($user)->put(route('proposition-live.update', $liveDisponible->id), $updatedData);

        // Assert
        $response->assertRedirect();
        $this->assertDatabaseHas('live_disponibles', ['Titre' => 'Updated Live Title']);
    }

    /** @test */
    public function a_user_can_delete_a_live_disponible()
    {
        // Arrange
        $user = User::factory()->create();
        $liveDisponible = LiveDisponible::factory()->create(['professeur_id' => $user->id]);

        // Act
        $response = $this->actingAs($user)->delete(route('proposition-live.destroy', $liveDisponible->id));

        // Assert
        $response->assertRedirect();
        $this->assertSoftDeleted($liveDisponible);
    }

}
