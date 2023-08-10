<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterEmail;
use App\Mail\NewSubscriberNotification;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function showNewsletterForm()
    {
        return view('newsletter.form');
    }

    public function sendNewsletter(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            $email = new NewsletterEmail($request->title, $request->message);
            Mail::to($subscriber->email)->send($email);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Newsletter sent successfully!');
    }
    public function subscribe(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.unique' => 'This email address is already subscribed.',
        ]);

        // Create a new subscriber
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        // Send email notification to the subscriber
        Mail::to($subscriber->email)->send(new NewSubscriberNotification($subscriber));

        // Redirect back with success message
        return redirect()->back()->with('subscribed', true);
    }
}
