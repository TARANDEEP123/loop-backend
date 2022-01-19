<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $token;
    public function test_user_cannot_login_without_authentication()
    {
        $user = [
            'name'=> Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'password' => Str::random(10)
        ];

        $response = $this->json('post', 'auth/register', $user);
        $response->assertJsonStructure([
            'data' => [
                'name','email','updated_at','created_at', 'id'
            ]
        ]);

        $response = $this->json('post', 'auth/login', ['email'=>$user['email'],'password'=>$user['password']]);
        $response->assertJsonStructure([
            'data' => [
                'name', 'email', 'access_token',
            ],
        ]);
        $this->token = $response['data']['access_token'];
        $this->withHeaders([
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ])->get('dashboard/cars')->assertStatus(200);

    }
}
