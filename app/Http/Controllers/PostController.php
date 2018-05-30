<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Bookmark;
use App\Like;
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
        $bookmarks = Bookmark::where('post_id', $id)->get();
        $likes = Like::where('post_id', $id)->get();

        foreach($bookmarks as $bookmark)
        {
            $bookmark->delete();
        }

        foreach($likes as $like)
        {
            $like->delete();
        }

    	$post->delete();

    	return back();
    }

    public function createLike(Request $request)
    {
        if($request->ajax())
        {
            $post_id = $request->get('post_id');
            $post = Post::find($post_id);
            $user = Auth::user();
            $isLiked = Like::where('post_id', $post_id)
                                    ->where('user_id', $user->id)
                                    ->first();

            if($isLiked === null)
            {
                $like = new Like;
                $like->user_id = $user->id;
                $post->likes()->save($like);

                return response(1);
            }

            $isLiked->delete();

            return response(0); 
        }
    }
}
