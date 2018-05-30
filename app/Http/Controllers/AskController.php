<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ask;
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
    	$ask = new Ask;
    	$user = Auth::user();
    	$ask->question = $request->input('question');
    	$user->asks()->save($ask);

    	return back();
    }
}
