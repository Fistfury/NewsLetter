<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function manage()
    {
        $subscriptions = auth()->user()->subscriptions()->with('newsletter')->get();
        return view('subscriptions.manage', compact('subscriptions'));
    }

    // Add methods for subscribe/unsubscribe if needed
}