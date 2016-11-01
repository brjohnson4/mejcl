<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use Auth;
use Validator;
use Redirect;
use App\Delegate;

class ResultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }

	public function index()
	{
    	$lastTen = Result::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->take(10)->get();

    	return view('input', compact('lastTen'));

	}

    public function store(Request $request) 
    {
    	$rules = [
    		'test-number' 	=> 	'required|test',
    		'student-id' 	=>	'required|max:4|min:4|even|convention',
    		'score'			=>	'required|score',
    	];

    	Validator::extend('test', function($attribute, $value, $parameters) {
    		if($value <= 12 && $value > 0) {
    			return 'true';
    		}
    	});

    	Validator::extend('even', function($attribute, $value, $parameters) {
    		if($value % 2 == 0) {
    			return 'true';
    		}
    	});

    	Validator::extend('score', function($attribute, $value, $parameters) {
    		if($value <= 25 ) {
    			return 'true';
    		}
    	});

    	Validator::extend('convention', function($attribute, $value, $parameters) {
    		if(Delegate::where('id', $value)->where('Fall', 'Y')->first()) {
    			return 'true';
    		}
    	});

    	$messages = [
    		'test' => 'The test number must be between 1 and 12.', 
    		'even' => 'All ID numbers must be even', 
    		'score' => 'The maximum score is 25 points.',
    		'convention' => 'This student is not registered for this convention.'
    		];

    	$validation = Validator::make($request->all(), $rules, $messages);

    	if($validation->fails()) {
    		return Redirect::back()->withInput()->withErrors($validation->messages());
    	}

    	$result = new Result;
    	$result->Test = $request->input('test-number');
    	$result->Studentid = $request->input('student-id');
    	$result->Score = $request->input('score');
    	$result->user_id = Auth::user()->id;

    	$result->save();

    	$lastTen = Result::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->take(10)->get();

    	return view('input', compact('lastTen'));

    }
}
