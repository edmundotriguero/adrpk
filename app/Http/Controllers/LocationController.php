<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::all();
        return view('location.index',['locations'=>$location]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|min:3',
            'address' => 'required',
           'image' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description'=>'min:1'

        ]);

        $location = new Location();
        $location->name = $validData['name'];
        $location->address = $validData['address'];
        $location->image = "null";
        $location->start_date = $validData['start_date'];
        $location->end_date = $validData['end_date'];
        $location->description = $validData['description'];
        $location->state = 1;
        $location->save();

        return redirect('location');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('location.edit', [
            'location' => $location
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $state = 0;
        if($request->get('state') == 'on'){
            $state = 1;
        }
        $validData = $request->validate([
            'name' => 'required|min:3',
            'address' => 'required',
            'image' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'description'=>'min:1'

        ]);

        $location = Location::find($id);
        $location->name = $validData['name'];
        $location->address = $validData['address'];
        $location->image = $validData['image'];
        $location->start_date = $validData['start_date'];
        $location->end_date = $validData['end_date'];
        $location->description = $validData['description'];
        $location->state = $state;
        $location->save();

        return redirect('location');




        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::find($id);
        $location->delete();

        return redirect('/location');
    }
}
