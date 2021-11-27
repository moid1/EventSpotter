<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Following;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
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
        $currentUser = Auth::user();
        $followers = Follower::where('user_id', $currentUser->id)->with('user')->get();
        $pendingRequest = Following::where('following_id', $currentUser->id)->with('user')->where('is_accepted', 0)->get();
        return view('front.follower')->with(compact('followers', 'currentUser', 'pendingRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function cancelPendingRequest(Request $request)
    {
        $followingRequest = Following::find($request->id);
        $followingRequest->is_accepted = 2;
        $followingRequest->update();
        return response()->json([
            'success' => true,
            'data' => $followingRequest,
            'message' => 'Following Request has been canceled',
        ]);
    }

    public function unfollow(Request $request)
    {
        $follower = Follower::with('user')->find($request->id);
       
        if ($follower!= null && $follower->user!=null) {
            $user = $follower->user;
            $follower->delete();
            $following = Following::find($follower->following_id);
            $following->delete();
            return response()->json([
                'success' => true,
                'message' => 'You unfollow' . $user->name,
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'user does not exists',
            ]);
        }
    }
}
