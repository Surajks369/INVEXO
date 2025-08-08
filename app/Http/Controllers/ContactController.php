<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send mail
        Mail::send([], [], function ($message) use ($validated) {
            $message->to(config('mail.from.address'))
                ->subject('Contact Form: ' . $validated['subject'])
                ->setBody(
                    'Name: ' . $validated['name'] . "\n" .
                    'Email: ' . $validated['email'] . "\n" .
                    'Message: ' . $validated['message'],
                    'text/plain'
                );
        });

        return back()->with('success', 'Your message has been sent!');
    }
}
