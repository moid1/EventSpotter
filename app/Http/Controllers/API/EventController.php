<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventFeeds;
use App\Models\EventTypes;
use App\Models\Favrouite;
use App\Models\Follower;
use App\Models\Following;
use App\Models\Likes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function getEvents()
    {
        $eventTypes = EventTypes::all();
        $upcomingEvents = Event::where('event_date', '>=', date('Y-m-d'))->where('is_drafted', 0)->with(['eventPictures', 'user', 'comment', 'liveFeed'])->orderBy('created_at', 'DESC')->get();
        $new = null;
        $followerss = Follower::where('user_id', Auth::id())->get()->pluck('follower_id');
        $followingss = Following::where('user_id', Auth::id())->where('is_accepted', 1)->get()->pluck('following_id');
        foreach ($upcomingEvents as $key => $value) {
            $flag = false;
            if ($value->user_id == Auth::id()) {
                $new[] = $value;
                $flag = true;
            } else {
                $new[] = $value;
            }
            if ($flag == false && $value->is_public == 0) {
                foreach ($followingss as $key => $follow) {
                    if ($value->user_id == $follow) {
                        $new[] = $value;
                    }
                }
            }
        }
        $upcomingEvents = $new;
        $user = User::where('id', Auth::id())->with(['followers', 'following'])->first();
        $nearEvents = array();
        if (is_array($upcomingEvents) || is_object($upcomingEvents)) {
            foreach ($upcomingEvents as $key => $value) {
                $latLng = explode(',', $user->lat_lng); // user lat lng

                if (count($latLng) > 1) {
                    $mile = $this->distance($latLng[0], $latLng[1], $value->lat, $value->lng);
                    $fav = Favrouite::where('user_id', Auth::id())->where('event_id', $value->id)->first();
                    $liveFeed = EventFeeds::where('event_id', $value->id)->latest()->first();
                    $isFollowing = Following::where('user_id', Auth::id())->where('following_id', $value->user_id)->where('is_accepted', 1)->first();
                    $isLiked = Likes::where('user_id', Auth::id())->where('event_id', $value->id)->first();
                    $nearEvents[] = array('events' => $value, 'livefeed' => $liveFeed, 'km' => number_format($mile, 1), 'isFavroute' => $fav ? 1 : 0, 'Following' => $isFollowing ? 1 : 0, 'isLiked' => $isLiked ? 1 : 0);
                }
            }

            return response()->json([
                'success' => true,
                'data' => $nearEvents,
                'message' => 'Near Events'
            ]);
        } else {
            return response()->json([
                'success' => true,
                'data' => [],
                'message' => 'No Events Available Right now'
            ]);
        }
    }

    public function getUserUpcomingEvents()
    {
        $user = Auth::user();
        $upcomingEvents = Event::where('user_id', Auth::id())->where('event_date', '>=', date('Y-m-d'))->where('is_drafted', 0)->with('eventPictures')->get();
        $nearEvents = array();
        foreach ($upcomingEvents as $key => $value) {
            $latLng = explode(',', $user->lat_lng); // user lat lng
            $km = $this->distance($latLng[0], $latLng[1], $value->lat, $value->lng);
            $nearEvents[] = array('events' => $value, 'km' => number_format($km, 1));
        }
        array_multisort(array_column($nearEvents, 'km'), SORT_ASC, $nearEvents);

        return response()->json([
            'success' => true,
            'data' => $nearEvents,
            'message' => 'All Upcoming Events',
        ]);
    }

    public function getUserPastEvent()
    {
        $user = Auth::user();
        $upcomingEvents = Event::where('user_id', Auth::id())->where('event_date', '<', date('Y-m-d'))->where('is_drafted', 0)->with('eventPictures')->get();
        $nearEvents = array();
        foreach ($upcomingEvents as $key => $value) {
            $latLng = explode(',', $user->lat_lng); // user lat lng
            $km = $this->distance($latLng[0], $latLng[1], $value->lat, $value->lng);
            $nearEvents[] = array('events' => $value, 'km' => number_format($km, 1));
        }

        return response()->json([
            'success' => true,
            'data' => $nearEvents,
            'message' => 'All Past Events',
        ]);
    }

    public function getUserDraftEvents()
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
        return $miles;
        // $unit = strtoupper($unit);

        // if ($unit == "K") {
        return ($miles * 1.609344);
        // } else if ($unit == "N") {
        //     return ($miles * 0.8684);
        // } else {
        //     return $miles;
        // }
    }

    public function getUserFollowingStatus(Request $request)
    {
      
        $status = null;
        if (!$request->has('following_id')) {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Following Id is required',
            ]);
        } else {
            $following = Following::where([['user_id', Auth::id()],['following_id', $request->following_id]])->first();
          
            if ($following) {
                if ($following->is_accepted == 1)
                    $status = 'Following';
                else if ($following->is_accepted == 2)
                    $status = 'Pending';
                else
                    $status = 'Nothing';
                $user = User::with(['address', 'profilePicture', 'followers', 'following', 'events'])->find($request->following_id);
                return response()->json([
                    'success' => true,
                    'data' => $user,
                    'status' => $status,
                ]);
            } else {
                $user = User::with(['address', 'profilePicture', 'followers', 'following', 'events'])->find($request->following_id);
                return response()->json([
                    'success' => true,
                    'data' => $user,
                    'status'=>'nothing',
                    'message' => 'You are not following',
                ]);
            }
        }
    }
}
