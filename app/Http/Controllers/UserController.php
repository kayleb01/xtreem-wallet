<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResources;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    $user = User::all()->except([auth()->user()->id]);
    return new UserResources($user);

    }

    public function show($id)
    {
    $user = User::where('id', $id)->findOrFail();
    return new UserResources($user);
    }
}
