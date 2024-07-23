<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class TaskRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test */
    public function it_creates_a_new_post()
    {
        // Create a user to authenticate with
        $user = User::factory()->create();

        // Define the post data
        $taskData = [
            'title' => 'Test Post Title',
            'description' => 'Test Post Content',
        ];

        // Make the POST request as an authenticated user
        $response = $this->actingAs($user, 'sanctum')->postJson('/api/tasks', $taskData);

        // Assert the response status and structure
        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'title',
                'content',
                'created_at',
                'updated_at',
            ]);

        // Assert the post exists in the database
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Post Title',
            'description' => 'Test Post Content',
        ]);
    }

    /** @test */
    public function it_requires_title_and_content()
    {
        // Create a user to authenticate with
        $user = User::factory()->create();

        // Define the post data without title and content
        $taskData = [];

        // Make the POST request as an authenticated user
        $response = $this->actingAs($user, 'sanctum')->postJson('/api/tasks', $taskData);

        // Assert the response status and structure
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title', 'description']);
    }
}
