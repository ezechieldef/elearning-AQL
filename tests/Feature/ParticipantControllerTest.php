<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Participant;

class ParticipantControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function users_can_view_all_participants_on_index_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('participants.index'));

        $response->assertStatus(200);
        $response->assertViewIs('participant.index');
    }

    /** @test */
    public function users_can_see_create_participant_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('participants.create'));

        $response->assertStatus(200);
        $response->assertViewIs('participant.create');
    }

    /** @test */
    public function users_can_store_a_new_participant()
    {
        $user = User::factory()->create();
        $participantData = [
            // Assume 'name' and 'email' are required fields for a Participant.
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            // Add other necessary fields here.
        ];

        $response = $this->actingAs($user)->post(route('participants.store'), $participantData);

        $response->assertRedirect(route('participants.index'));
        $this->assertDatabaseHas('participants', ['email' => $participantData['email']]);
    }

    /** @test */
    public function users_can_view_a_single_participant()
    {
        $user = User::factory()->create();
        $participant = Participant::factory()->create();

        $response = $this->actingAs($user)->get(route('participants.show', $participant->id));

        $response->assertStatus(200);
        $response->assertViewIs('participant.show');
    }

    /** @test */
    public function users_can_view_edit_page_for_a_participant()
    {
        $user = User::factory()->create();
        $participant = Participant::factory()->create();

        $response = $this->actingAs($user)->get(route('participants.edit', $participant->id));

        $response->assertStatus(200);
        $response->assertViewIs('participant.edit');
    }

    /** @test */
    public function users_can_update_a_participant()
    {
        $user = User::factory()->create();
        $participant = Participant::factory()->create();
        $updateData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            // Add other fields to update here.
        ];

        $response = $this->actingAs($user)->put(route('participants.update', $participant->id), $updateData);

        $response->assertRedirect(route('participants.index'));
        $this->assertDatabaseHas('participants', ['id' => $participant->id, 'email' => 'updated@example.com']);
    }

    /** @test */
    public function users_can_delete_a_participant()
    {
        $user = User::factory()->create();
        $participant = Participant::factory()->create();

        $response = $this->actingAs($user)->delete(route('participants.destroy', $participant->id));

        $response->assertRedirect(route('participants.index'));
        $this->assertSoftDeleted($participant);
    }

    // You might need to adjust the test methods according to your actual validation rules, model factory, route names, and view files.
}
