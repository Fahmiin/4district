<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class MainController extends Controller
{
    public function homePage()
    {
    	if(Auth::user())
    	{
    		$user = Auth::user();

    		return view('main')->with('user', $user);
    	}

    	$user = User::all();

    	return view('main')->with('user', $user);
    }
}
