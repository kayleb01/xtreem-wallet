<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{

    use RefreshDatabase;
        /** @test */
        public function login_test()
        {

            $user = User::create([
                'first_name' => 'Caleb',
                'last_name' => 'Bala',
                'email' => 'trinityace6@gmail.com',
                'password'=> Hash::make('12345678'),
                'country' => 'NG',
                'phone' => '08127155801',
                'role_id'=> 1
            ]);

            $response = $this->post('api/login',[
                'email' => $user->email,
                'password' => '12345678'
            ]);

            $response->assertSuccessful();
            $this->assertNotEmpty($response->getContent());
            $this->assertDatabaseHas('personal_access_tokens', [
                'name' => 'auth-token',
                'tokenable_type' => User::class,
                'tokenable_id' => $user->id
            ]);
        }
}
