<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
{
    //
    public function sendSMS (Request $request) {
        //test send sms here .
        $recipient = $request->get('recipient');
        $sender = $request->get('sender');
        $message = $request->get('message');

        

    }
}
