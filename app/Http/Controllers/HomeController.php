<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){
//        $user = Auth::user();
//        $role=Role::where('slug','author')->first();
//        $user->roles()->attach($role);
//        dd($user->hasRole('author'));




        //check permissions
//        $permission=Permission::first();
//        $user->permissions()->attach($permission);
//        dd($user->permissions);
//        dd($user->can('add_post'));
//        dd($user->roles);
        return view('dashboard');
    }
}
