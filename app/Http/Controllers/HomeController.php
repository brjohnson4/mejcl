<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Delegate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
        $results = Result::count();
        $students = Delegate::where('Fall', 'Y')->count();
        return view('home', compact('results', 'students'));
    }
}
