<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class loginTest extends TestCase
{
    #[Test]
    public function an_existing_user_can_login(): void
    {
        #teniendo
        $credentials = [
            'email'=>'renovado16@gmail.com',
            'password' => 'password'
        ];

        #haciendo
        $response = $this->post('api/v1/login',$credentials);

        #esperando
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => ['token']
        ]);
    }

    public function a_non_existing_user_can_login(): void
    {
        #teniendo
        $credentials = [
            'email'=>'rqrqrq@noexisting.com',
            'password' => 'tqetqtqetq'
        ];

        #haciendo
        $response = $this->post('api/v1/login',$credentials);

        #esperando
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => ['token']
        ]);
    }
    public function email_must_be_required(): void
    {
        #teniendo
        $credentials = [
            'password' => 'tqetqtqetq'
        ];

        #haciendo
        $response = $this->post('api/v1/login',$credentials);

        #esperando
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => ['token']
        ]);
    }
    public function password_must_be_required(): void
    {
        #teniendo
        $credentials = [
            'email' => 'tqetqtqetq@error.com'
        ];

        #haciendo
        $response = $this->post('api/v1/login',$credentials);

        #esperando
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => ['token']
        ]);
    }
}
