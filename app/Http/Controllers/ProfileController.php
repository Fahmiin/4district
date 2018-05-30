<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Role;
use Auth;

class ProfileController extends Controller
{
   public function profilePage()
   {
   		$user = Auth::user();

   		return view('profile')
   			->with('user', $user);
   }
}
