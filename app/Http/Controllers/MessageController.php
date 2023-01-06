<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    //
    public function sendSMS (Request $request) {
        
        $recipient = $request->get('recipient');
        $sender = $request->get('sender');
        $message = $request->get('message');

        $baseUrl = env('INFOBIP_BASE_URL');
        $authorization = env('INFOBIP_AUTHORIZATION');
        $response = Http::withHeaders([
            'Authorization' => "App $authorization",
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post($baseUrl.'/sms/2/text/advanced', [
            'messages' => [
                    'from' => $sender,
                    'destinations' => [
                        [
                            'to' => $recipient
                        ]
                    ],
                    'text' => $message
                ]
        ]);

        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Message sent successfully',
                'data' => $response->json()
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Message not sent',
                'data' => $response->json()
            ], 500);
        }


    }

    
}

