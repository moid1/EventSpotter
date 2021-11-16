<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTypes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('checkAdmin');
    }


    public function create()
    {
        $eventTypes = EventTypes::all();

        return view('admin.add-events-type', compact('eventTypes'));
    }

    public function addEventType(Request $request)
    {
        EventTypes::create($request->all());
        toastr()->success('Data Saved Successfully');
        return redirect()->back();
    }

    public function deleteEventType($id)
    {
        $eventType = EventTypes::findOrFail($id);
        if ($eventType) {
            $eventType->delete();
            toastr()->error('Delete Successfully');
        }
        return redirect()->back();
    }

    public function getAllUsers()
    {
        $users = User::all()->except(Auth::id());
        return view('admin.users.index', compact('users'));
    }

    public function adminUpcomingEvents()
    {
        $upcomingEvents = Event::where('event_date', '>', date('Y-m-d'))->where('is_drafted', 0)->with(['eventPictures', 'user'])->get();
        return view('admin.events.upcoming_events', compact('upcomingEvents'));
    }
    public function adminTodayEvents()
    {
        $todayEvents = Event::where('event_date', '=', date('Y-m-d'))->where('is_drafted', 0)->with(['eventPictures', 'user'])->get();
        return view('admin.events.today_events', compact('todayEvents'));
    }

    public function adminPastEvents()
    {
        $pastEvents = Event::where('event_date', '<', date('Y-m-d'))->where('is_drafted', 0)->with(['eventPictures', 'user'])->get();
        return view('admin.events.past_events', compact('pastEvents'));
    }
}
