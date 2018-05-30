<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Role;
use Auth;

class MainController extends Controller
{
    public function homePage()
    {
    	if(Auth::user())
    	{
    		$user = Auth::user();
            $posts = Post::all();
            $admin = Role::where('user_id', $user->id)->first();

    		return view('main')
                ->with('user', $user)
                ->with('posts', $posts)
                ->with('admin', $admin);
    	}

    	$user = User::all();
        $posts = Post::all();

    	return view('main')
            ->with('user', $user)
            ->with('posts', $posts);
    }
}
