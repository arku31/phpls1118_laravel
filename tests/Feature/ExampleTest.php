<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        Auth::login(User::first());
        $response = $this->post('/book', [
            'name' => 'User1',
            'user_id' => 1
        ]);
        $response->assertJsonFragment([
            'name' => 'User1',
            'user_id' => 1,
        ]);

        $response->assertJsonStructure([
            'name',
            'user_id',
            'id',
        ]);

        $response->assertStatus(201);
    }
}
