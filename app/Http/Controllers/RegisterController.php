<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $fields =  $this->validate($request, [
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required|unique:users,email',
           'password' => 'required|min:8|confirmed',
           'country' => 'required',
           'phone' => 'required',
           'role_id' => 'required'
       ]);

       $user = User::create([
           'first_name' => $fields['first_name'],
           'last_name' => $fields['last_name'],
           'email' => $fields['email'],
           'role_id' => $fields['role_id'],
           'country' => $fields['country'],
           'phone' => $fields['phone'],
           'password' => Hash::make($fields['password'])

       ]);

       if ($user) {
           //send email verification
           event( new Registered($user));
            $response = [
                'user' => $user,
                'message' => 'Registration successful, please check your email for verification message before you can login'
            ];
            return response()->json($response, 201);
       }else{
           $response = ['error' => 'An error was encountered'];
           return response()->json($response);
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
