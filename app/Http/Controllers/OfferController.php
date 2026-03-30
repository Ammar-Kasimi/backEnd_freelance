<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Mission;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
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
    public function store(OfferRequest $request, Mission $mission)
    {
       
        $validated = $request->validated();
        //  $validated['status']='pending';
        $validated['mission_id'] = $mission->id;
        
        $offer = $request->user()->freelancer->offers()->create($validated);
        // $offer->status = "pending";
        // $offer->save();
        // $mission->technologies()->sync($validated['technologies_ids']);
        return response()->json(['status' => "success", 'message' => 'offer created successfully', 'data' => $offer], 201);
    }

    /**
     * Display the specified resource.
     */
    public function accept_offer(Request $request, Mission $mission, Offer $offer)
    {
        $offer->status = 'accepted';
        $offer->save();
        $mission->offers()->where('status', 'pending')->update(['status' => 'refused']);
        $mission->status='active';
        $mission->save();
        $userName = $offer->freelancer->user->name;
        return response()->json(['status' => 'success', 'message' => "offer of $userName for $mission->title is accepted successfully"], 200);
    }
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
