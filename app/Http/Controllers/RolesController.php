<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
   public function index()
   {
       $this->isAdmin();

        $query = Role::all();
        return RoleResource::collection($query);
   }

   public function store(Request $request)
   {
       $this->isAdmin();

       $this->validate($request, [
           'role' => 'required|unique:roles,role'
       ]);
       $query = Role::create([
           'role' => $request->role
       ]);

       return new RoleResource($query);

   }

   public function destroy(Role $role)
   {
        $this->isAdmin();

        $role->delete();
        return response()->json(['message' => 'Deleted']);
   }

   /***
    * Check if the user is an admin
    and grant him access or return error
    */
   public function isAdmin()
   {
    if (!auth()->user()->isAdmin) {
        return response(['message' => "Unathourized"], 401);
    }
   }
}
