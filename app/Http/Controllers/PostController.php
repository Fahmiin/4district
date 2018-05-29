<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
    	$request->validate(
    	[
    		'title' => 'required|max:30',
    		'post' => 'required'
    	]);

    	$post = new Post;
    	$user = Auth::user();
    	$post->title = $request->input('title');
    	$post->post = $request->input('post');
    	$user->posts()->save($post);

    	return back();
    }

    public function editPost(Request $request, $id)
    {
    	$request->validate(
		[
			'title' => 'required|max:30',
			'post' => 'required'
		]);

		$post = Post::find($id);
		$user = Auth::user();
		$post->title = $request->input('title');
    	$post->post = $request->input('post');
    	$user->posts()->save($post);

    	return back();
    }

    public function deletePost($id)
    {
    	$post = Post::find($id);
    	$post->delete();

    	return back();
    }
}
