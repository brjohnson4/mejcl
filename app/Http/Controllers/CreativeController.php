<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\CreativeArts;
use App\Delegate;

class CreativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function storeIndividual(Request $request)
    {
        $rules = [
            'event-number'  =>  'required|event',
            'student-id'    =>  'required|max:4|min:4|even|convention',
        ];

        Validator::extend('event', function($attribute, $value, $parameters) {
            if($value <= 40 && $value > 0) {
                return 'true';
            }
        });

        Validator::extend('even', function($attribute, $value, $parameters) {
            if($value % 2 == 0) {
                return 'true';
            }
        });

        Validator::extend('convention', function($attribute, $value, $parameters) {
            if(Delegate::where('id', $value)->where('Spring', 'Y')->first()) {
                return 'true';
            }
        });

        $messages = [
            'event' => 'The event number must be between 1 and 40.', 
            'even' => 'All ID numbers must be even', 
            'convention' => 'This student is not registered for this convention.'
            ];

        $validation = Validator::make($request->all(), $rules, $messages);

        if($validation->fails()) {
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }

        $result = new CreativeArts;
        $result->Event = $request->input('event-number');
        $result->Studentid = $request->input('student-id');
        $result->School = Delegate::where('id', $request->input('student-id'))->first()->School;
        $result->Place = $request->input('place');
        if ($request->input('place') < 6) {
            $points = 6 - $request->input('place');
        } else {
            $points = 0;
        }
        $result->Points = $points;

        $result->save();

        return view('creative.input');
    }

    public function storeSchool(Request $request)
    {
        $result = new CreativeArts;
        $result->Event = $request->input('event-number-school');
        $result->School = $request->input('school');
        $result->Place = $request->input('place-school');
        if ($request->input('place-school') <= 5) {
            $points = 6 - $request->input('place-school');
        } else {
            $points = 0;
        }
        $result->Points = $points;

        $result->save();

        return view('creative.input');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
