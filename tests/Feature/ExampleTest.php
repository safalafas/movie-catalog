<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that guests are redirected to login.
     *
     * @return void
     */
    public function test_guests_are_redirected_to_login()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    /**
     * Test that authenticated users can access the catalog.
     *
     * @return void
     */
    public function test_authenticated_users_can_access_catalog()
    {
        $user = Users::factory()->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}
