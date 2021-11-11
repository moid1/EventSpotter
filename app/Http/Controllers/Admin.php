<?php

namespace App\Http\Controllers;

use App\Models\EventTypes;
use Illuminate\Http\Request;


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
}
