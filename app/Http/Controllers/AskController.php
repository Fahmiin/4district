<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ask;
use App\Role;
use Auth;

class AskController extends Controller
{
    public function showAsk()
    {
		if(Auth::check())
		{
			$user = Auth::user();
			$asks = Ask::all();
            $admin = Role::where('user_id', $user->id)->first();

			return view('ask')
				->with('user', $user)
				->with('asks', $asks)
                ->with('admin', $admin);
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
    	$ask->delete();

    	return back();
    }
}
