<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnologyRequest;
use App\Models\technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $tech= technology::all();
        return response()->json(['status'=>'success','message'=>'all technologies loaded successfully',$tech],200);

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        $validated =$request->validated();
       
        $tech=technology::create($validated);
        return response()->json(['status'=>"success","message'=>`technology $tech->name created successfully",'data'=>$tech],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(technology $technology)
    {
        //
    }
}
