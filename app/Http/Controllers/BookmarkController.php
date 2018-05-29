<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Bookmark;
use Auth;

class BookmarkController extends Controller
{
    public function createBookmark(Request $request)
    {
    	if($request->ajax())
    	{
    		$post_id = $request->get('post_id');
    		$post = Post::find($post_id);
    		$user = Auth::user();
    		$isBookmarked = Bookmark::where('post_id', $post_id)
    								->where('user_id', $user->id)
    								->first();

    		if($isBookmarked === null)
    		{
    			$bookmark = new Bookmark;
    			$bookmark->post_id = $post_id;
    			$user->bookmarks()->save($bookmark);

    			return response(1);
    		}

    		$isBookmarked->delete();

    		return response(0);					
    	}
    }
}
