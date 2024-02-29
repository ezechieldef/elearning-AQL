<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_can_be_accessed()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('accueil.index');
    }

    /** @test */
    public function dashboard_redirects_non_authenticated_users()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/');
    }

    /** @test */
    public function authenticated_users_can_access_dashboard()
    {
        // Assuming you have a user factory
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        // Add more assertions depending on your logic
    }

    /** @test */
    public function feedback_form_submission_works()
    {
        $this->withoutExceptionHandling();

        // Create a user and a course with completed status for that user
        // You need to adjust this part according to your actual database structure and requirements
        $user = User::factory()->create();
        $cours_id = 1; // Assume this is a valid course ID

        $response = $this->actingAs($user)->post('/feedback', [
            'cours_id' => $cours_id,
            'note' => '5',
            'message' => 'Great course!',
        ]);

        $response->assertRedirect('/'); // Assuming the user is redirected to home after submitting
        $response->assertSessionHas('success', 'Votre avis a été enregistré avec succès.');
        // You might also want to check the database to ensure the feedback was saved
    }


}
