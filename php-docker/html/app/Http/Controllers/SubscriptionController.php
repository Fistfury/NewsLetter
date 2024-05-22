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

    public function subscribe(Request $request, $newsletterId)
    {
        $subscription = new Subscription([
            'user_id' => auth()->id(),
            'newsletter_id' => $newsletterId,
            'subscribed_at' => now(),
        ]);
        $subscription->save();
    
        return redirect()->back()->with('message', 'Successfully subscribed!');
    }
    
    public function unsubscribe($subscriptionId)
    {
        $subscription = Subscription::where('id', $subscriptionId)
                                    ->where('user_id', auth()->id())->first();
        if ($subscription) {
            $subscription->delete();
            return redirect()->back()->with('message', 'Successfully unsubscribed!');
        }
    
        return redirect()->back()->with('error', 'Unsubscription failed.');
    }
}