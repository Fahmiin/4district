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

    		return view('main')
                ->with('user', $user)
                ->with('posts', $posts);
    	}

    	$user = User::all();
        $posts = Post::all();

    	return view('main')
            ->with('user', $user)
            ->with('posts', $posts);
    }
}
