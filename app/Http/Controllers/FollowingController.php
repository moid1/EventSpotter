<?php

namespace App\Http\Controllers;

use App\Models\Following;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
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
        $userId = Auth::id();
        $followingId = $request->following_id;
        $isAny =   Following::where('user_id', $userId)->where('following_id', $followingId)->first();
        if ($isAny) {
            Following::where('user_id', $userId)->where('following_id', $followingId)->delete();
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'Follow Request has been canceled',
                'ButtonText' => 'Follow'
            ]);
        } else {
            $followingResponse =   Following::create([
                'user_id' => $userId,
                'following_id' => $followingId,
            ]);
            Notifications::create([
                'title' => 'Follow Request',
                'message' => 'You have a follow request from ' . Auth::user()->name,
                'user_id' => $followingId,
                'sent_by' => $userId,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $followingResponse,
            'message' => 'Following request has been sent',
            'ButtonText' => 'Pending'

        ]);
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
}
