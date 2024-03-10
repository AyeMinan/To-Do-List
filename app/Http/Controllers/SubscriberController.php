<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(Request $request){
        $request->validate([
            'subscribe-email' => 'required|email',
        ]);
        Subscriber::create([
            'email' => $request->input('subscribe-email')
        ]);

        return response()->json([ 'status' => 'success',
        'message' => 'Subscription successful! Thank you.',]);
    }
}
