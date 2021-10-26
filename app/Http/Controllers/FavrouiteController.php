<?php

namespace App\Http\Controllers;

use App\Models\Favrouite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavrouiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $eventId = $request->event_id;
        $userId = Auth::id();
        $favroute =  Favrouite::create([
            'event_id' => $eventId,
            'user_id' => $userId,
        ]);
        return response()->json([
            'success' => true,
            'data' => $favroute,
            'message' => 'Event has been favrouited',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favrouite  $favrouite
     * @return \Illuminate\Http\Response
     */
    public function show(Favrouite $favrouite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favrouite  $favrouite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favrouite $favrouite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favrouite  $favrouite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favrouite $favrouite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favrouite  $favrouite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favrouite $favrouite)
    {
        //
    }

    public function remove(Request $request)
    {
        Favrouite::where('user_id', Auth::id())->where('event_id', $request->event_id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Your event has been unfavourited',
        ]);
    }
}
