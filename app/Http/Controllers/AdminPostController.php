<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\AdminPost;
use Auth;

class AdminPostController extends Controller
{
	public function showPosts()
	{
		$adminposts = AdminPost::all();

		return view('adminwrites')->with('adminposts', $adminposts);
	}

    public function createPost(Request $request)
    {
    	$request->validate(
		[
			'title' => 'required|max:30',
			'body' => 'required'
		]);

		$user = Auth::user();
		$adminpost = new AdminPost;
		$adminpost->title = $request->input('title');
		$adminpost->body = $request->input('body');
		$user->adminwrites()->save($adminpost);

		return back();
    }

    public function editPost(Request $request, $id)
    {
    	$request->validate(
    	[
    		'title' => 'required|max:30',
    		'body' => 'required'
    	]);

    	$post = AdminPost::find($id);
    	$post->title = $request->input('title');
    	$post->body = $request->input('body');
    	$post->save();

    	return back();
    }

    public function deletePost($id)
    {
    	$post = AdminPost::find($id);
    	$post->delete();

    	return back();
    }
}
