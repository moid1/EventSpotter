<?php

namespace App\Http\Controllers;

use App\Models\ProfileImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // $user = Auth::user();
        // $profileImage = ProfileImage::where('user_id',$user->id)->first();
        // return view('front.home')->with(compact('user','profileImage'));
        
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
        // get the search term
        $text = $request->input('text');
        // search the members table
        $users = User::whereRaw('email = ? or name like ?', [$text, "%{$text}%"])->with('profilePicture')->get();
        $users = $users->except(Auth::id());
    
        return response()->json($users);
    }
}
