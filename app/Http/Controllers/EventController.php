<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventsPictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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
        request()->validate([
            'event_name' => 'required|min:2|max:50',
            'event_description' => 'required',
            'event_type' => 'required',
            'event_date' => 'required|date|after_or_equal:today',
            'location' => 'required',
            'is_public' => 'required',
        ]);

        $event =    Event::create([
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'event_type' => $request->event_type,
            'event_date' => $request->event_date,
            'conditions' => serialize($request->conditions),
            'location' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'is_public' => intVal($request->is_public),
            'user_id' => Auth::user()->id,
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(('images/eventImage'), $imageName);
        $profileImage =  EventsPictures::create([
            'event_id' => $event->id,
            'image_path' => ('images/eventImage') . '/' . $imageName,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function draftEvent(Request $request)
    {

        request()->validate([
            'event_name' => 'required|min:2|max:50',
            'event_description' => 'required',
            'event_type' => 'required',
            'event_date' => 'date',
            'location' => 'required',
            'is_public' => 'required',
        ]);

        $event =    Event::create([
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'event_type' => $request->event_type,
            'event_date' => $request->event_date,
            'conditions' => serialize($request->conditions),
            'location' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'is_public' => intVal($request->is_public),
            'user_id' => Auth::user()->id,
            'is_drafted' => 1,
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(('images/eventImage'), $imageName);
        $profileImage =  EventsPictures::create([
            'event_id' => $event->id,
            'image_path' => ('images/eventImage') . '/' . $imageName,
        ]);
    }

    public function getUserPastEvent()
    {
        $pastEvents = Event::where('user_id', Auth::id())->where('event_date', '<', date('Y-m-d'))->where('is_drafted', 0)->with('eventPictures')->get();
        return response()->json([
            'success' => true,
            'data' => $pastEvents,
            'message' => 'All Past Events',
        ]);
    }

    public function getUserUpcomingEvents()
    {
        $user = Auth::user();
        $upcomingEvents = Event::where('user_id', Auth::id())->where('event_date', '>', date('Y-m-d'))->where('is_drafted', 0)->with('eventPictures')->get();
        $nearEvents=array();
        foreach ($upcomingEvents as $key => $value) {
            $latLng = explode(',', $user->lat_lng); // user lat lng
            $km = $this->distance($latLng[0], $latLng[1], $value->lat, $value->lng);
            // dd($km);
            if ($km <= 100) {
                $nearEvents[] = array('events' => $value, 'km' => number_format($km, 1));
            }
        }

        return response()->json([
            'success' => true,
            'data' => $nearEvents,
            'message' => 'All Upcoming Events',
        ]);
    }

    public function getDraftEvents()
    {
        $draftEvents = Event::where('user_id', Auth::id())->where('is_drafted', 1)->with('eventPictures')->get();
        return response()->json([
            'success' => true,
            'data' => $draftEvents,
            'message' => 'All Drafted Events',
        ]);
    }

    function distance($lat1, $lon1, $lat2, $lon2)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        // $unit = strtoupper($unit);

        // if ($unit == "K") {
        return ($miles * 1.609344);
        // } else if ($unit == "N") {
        //     return ($miles * 0.8684);
        // } else {
        //     return $miles;
        // }
    }

    public function getEventDetail($id)
    {
        $event = Event::where('id', $id)->with(['eventPictures','user'])->first();
        
      
        return view('front.event_details')->with(compact('event'));
    }
}
