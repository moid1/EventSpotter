<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{

    public function getUserNotifications()
    {
        $notifications = Notifications::where('user_id', Auth::id())->with('user')->orderBy('created_at', 'DESC')->get();
        return response()->json([
            'success' => true,
            'data' => $notifications,
            'Message' => 'Your Notifications',
        ]);
    }

    public function sendSingleNotification(Request $request)
    {
        // $token, $title, $body, $data


        $SERVER_API_KEY = 'AAAArQd0h64:APA91bF6bIuqUeuWEeXTYRXFHj2-MWWiDgRI1dzwc15zdNHLlRF_Rfx89tMoj9dgVKchgTsL0lx4_eGizrYmQ-nsaYKDSXpEmyyg2aWU6Kiz03VKYtBz4uNnsS8G4rEbx9KlT5kXh9ck';
        $data = [
            'registration_ids' => array($request->token),
            "notification" => [
                'title' => $request->title,
                "body" => $request->body,
                'data' => $request->data,
            ]
        ];

        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        return $response;
    }
}
