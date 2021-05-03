<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController extends Controller
{
    public function verify ($id, $hash) {
        $user = User::find($id);
        abort_if(!$user, 403);
        abort_if(!hash_equals($hash, sha1($user->getEmailForVerification())), 403);

       if (!$user->hasVerifiedEmail()) {
           $user->markEmailAsVerified();
           event(new Verified($user));
       }

       return response()->json([
           'message' => 'Email verified'
       ]);

    }
}
