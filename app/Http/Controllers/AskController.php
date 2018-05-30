<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ask;
use App\Role;
use App\Reply;
use Auth;

class AskController extends Controller
{
    public function showAsk()
    {
		if(Auth::check())
		{
			$user = Auth::user();
			$asks = Ask::all();

			return view('ask')
				->with('user', $user)
				->with('asks', $asks);
		}

		$asks = Ask::all();

		return view('ask')
			->with('asks', $asks);
    }

    public function createQuestion(Request $request)
    {
        $request->validate(
        [
            'question' => 'required'
        ]);

    	$ask = new Ask;
    	$user = Auth::user();
    	$ask->question = $request->input('question');
    	$user->asks()->save($ask);

    	return back();
    }

    public function editQuestion(Request $request, $id)
    {
    	$ask = Ask::find($id);
    	$ask->question = $request->input('question');

    	return back();
    }

    public function deleteQuestion($id)
    {
    	$ask = Ask::find($id);
        $replies = Reply::where('ask_id', $id)->get();

        foreach($replies as $reply)
        {
            $reply->delete();
        }

    	$ask->delete();

    	return back();
    }

    public function createReply(Request $request, $id)
    {
        $request->validate(
        [
            'reply' => 'required'
        ]);

        $user = Auth::user();
        $question = Ask::find($id);
        $reply = new Reply;
        $reply->ask_id = $question->id;
        $reply->reply = $request->input('reply');
        $user->replies()->save($reply);

        return back();
    }

    public function deleteReply($id)
    {
        $reply = Reply::find($id);
        $reply->delete();

        return back();
    }
}
