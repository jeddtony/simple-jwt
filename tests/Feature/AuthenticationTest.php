<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $user = new User([
            'email'    => 'test@email.com',
            'password' => '123456'
        ]);

        $user->save();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_will_register_a_user(){
        $response = $this->post('api/register', [
            'email'    => 'test2@email.com',
            'password' => '123456',
            'confirm_password' => '123456'
        ]);

        $response->assertJsonStructure([
            'user',
            'token',
//            'expires_in'
        ]);
    }


}
