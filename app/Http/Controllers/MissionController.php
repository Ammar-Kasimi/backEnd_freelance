<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(MissionRequest $request)
    {

        $validated =$request->validated();
        $mission=$request->user()->client->missions()->create($validated);
        $mission->status="available";
        $mission->save();
        return response()->json(['status'=>"success",'message'=>'mission created successfully','data'=>$mission],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mission $mission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mission $mission)
    {
        //
    }
}
