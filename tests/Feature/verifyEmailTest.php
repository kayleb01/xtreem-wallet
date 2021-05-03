<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;

use Laravel\Sanctum\Sanctum;

class verifyEmailTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_email_verification()
    {
        $user = User::create([
            'first_name' => 'Caleb',
            'last_name' => 'Bala',
            'phone' => '08163633741',
            'email' => 'trinityace6@gmail.com',
            'password'=> Hash::make('12345678'),
            'country' => 'NG',
            'role_id'=> 1
        ]);

        $url =  URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verificatiion.expire', 60)),
            [
                'id' => $user->getkey(),
                'hash' =>sha1($user->getEmailForVerification()),
            ]
            );
        $response = $this->get($url);

        $response->assertSuccessful();

        $this->assertNotNull($user->fresh()->email_verified_at);
    }

        /** @test */
        public function resend_verification_email()
        {
            Notification::fake();
            $user = User::create([
                'first_name' => 'Caleb',
                'last_name' => 'Bala',
                'phone' => '08163633741',
                'email' => 'trinityace6@gmail.com',
                'password'=> Hash::make('12345678'),
                'country' => 'NG',
                'role_id'=> 1
            ]);

            Sanctum::actingAs($user);

            $response = $this->post(route('verification.send'));
            $response->assertSuccessful();

            Notification::assertSentTo($user, verifyEmail::class);
        }
}
