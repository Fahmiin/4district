<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $user = Auth::user();
    	$admin = Role::where('user_id', $user->id)->first();

    	//Check for admins status, otherwise, redirect to home
    	if ($admin)
    	{
            $roles = Role::all();

	    	return view('admin')->with('roles', $roles);
    	}

    	return redirect('home');
    }
}
