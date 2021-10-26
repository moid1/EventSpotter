<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Favrouite;
use App\Models\Following;
use App\Models\ProfileImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
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
        $upcomingEvents = Event::where('user_id', '!=', Auth::id())->where('event_date', '>=', date('Y-m-d'))->where('is_drafted', 0)->with(['eventPictures', 'user'])->orderBy('created_at', 'DESC')->get();
        $upcomingEvents = $upcomingEvents->except('user_id', Auth::id());
        $user = User::where('id', Auth::id())->with(['followers', 'following'])->first();
        $nearEvents = array();
        foreach ($upcomingEvents as $key => $value) {
            $latLng = explode(',', $user->lat_lng); // user lat lng
            if (is_array($latLng)) {
                $km = $this->distance($latLng[0], $latLng[1], $value->lat, $value->lng);
                if ($km <= 100) {
                    $fav = Favrouite::where('user_id', Auth::id())->where('event_id', $value->id)->first();
                    $isFollowing = Following::where('user_id', Auth::id())->where('following_id', $value->user_id)->where('is_accepted', 1)->first();
                    $nearEvents[] = array('events' => $value, 'km' => number_format($km, 1), 'isFavroute' => $fav ? 1 : 0, 'Following' => $isFollowing ? 1 : 0);
                }
            }
        }
        // dd($nearEvents);

        // dd($nearEvents);

        return view('front.home')->with(compact('user', 'nearEvents'));
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
            'name' => 'required|min:2|max:50',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:8|max:20|same:password',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);

        $input = request()->except('password', 'confirm_password');
        $user = new User($input);
        $user->password = ($request->password);
        $user->ip_address = $request->ip();
        $user->save();
        return redirect('/login')->with('success', 'You have successfully signed up, please login');
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


    public function saveLatLng(Request $request)
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $user->lat_lng = $request->lat . ',' . $request->lng;
        $user->update();
    }

    public function uploadProfilePicture(Request $request)
    {
        if ($request->has('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(('images'), $imageName);
            ProfileImage::where('user_id', Auth::id())->delete();
            //saving image to db
            $profileImage =  ProfileImage::create([
                'user_id' => Auth::id(),
                'image' => ('images') . '/' . $imageName,
            ]);

            return response()->json([
                'success' => true,
                'data' => $profileImage,
                'message' => 'Profile Image Updated Successfully',
            ]);
        }
    }

    public function search(Request $request)
    {
        $text = $request->input('text');
        $users = User::whereRaw('email = ? or name like ?', [$text, "%{$text}%"])->with('profilePicture')->get();
        $users = $users->except(Auth::id());
        return response()->json($users);
    }

    public function makeNoPrivate(Request $request)
    {
        $user = User::find(Auth::id());
        $user->mobile_is_private = $request->isPrivate;
        $user->update();

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Phone No Status Changed Successfully',
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
}
