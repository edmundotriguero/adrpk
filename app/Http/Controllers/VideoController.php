<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contract;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('video.index',['videos'=>$videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::all();
        return view('video.create',[
            'contracts'=>$contracts            
        ]);
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
            'time' => 'required',
            'contract_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description'=>'nullable'

        ]);

        $video = new Video();
        $video->name = $validData['name'];
        $video->time = $validData['time'];
        $video->contract_id = $validData['contract_id'];
        $video->start_date = $validData['start_date'];
        $video->end_date = $validData['end_date'];
        $video->description = $validData['description'];
        $video->save();    

        return redirect('video');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contracts = contract::all();
        $video = video::findOrFail($id);
        return view('video.edit', [
            'contracts' => $contracts,
            'video' => $video
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'name' => 'required|min:3',
            'time' => 'required',
            'contract_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description'=>'nullable'

        ]);

        $video =  Video::find($id);
        $video->name = $validData['name'];
        $video->time = $validData['time'];
        $video->contract_id = $validData['contract_id'];
        $video->start_date = $validData['start_date'];
        $video->end_date = $validData['end_date'];
        $video->description = $validData['description'];
        $video->update();   
        
        return redirect('/video');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();

        return redirect('/video');
    }
}
