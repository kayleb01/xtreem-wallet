<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Notification;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
        /** @test */
        public function test_registration()
        {
            Notification::fake();

            $response = $this->post('/api/register', [
                'first_name' => 'Caleb',
                'last_name' => 'Bala',
                'phone' => '08163633741',
                'email' => 'trinityace6@gmail.com',
                'password'=> '12345678',
                'phone' => '0809953245',
                'password_confirmation'=> '12345678',
                'country' => 'NG',
                'role_id'=> 1
            ]);

            $response->assertSuccessful();

            $user = User::where('email', 'trinityace6@gmail.com')->first();
            Notification::assertSentTo($user, VerifyEmail::class);

            $this->assertDatabaseHas('users', ['email' => 'trinityace6@gmail.com']);

            //Assert
        }


}
