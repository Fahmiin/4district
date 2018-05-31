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
        $posts = Post::all();

		return view('main')->with('posts', $posts);
    }
}
