<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendContactForm(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'email' => 'required|email',
        
    ]);

    $username = $request->input('username');
    $email = $request->input('email');
    $subject = $request->input('message');
    

    $data = [
        'username' => $username,
        'email' => $email,
        
        'subject' => $subject
    ];

    Mail::send('frontend.emailtemplate.contactemail', $data, function($message) use($data){
        $message->to(env('MAIL_USERNAME')); 
        $message->subject('From the Contact Form');
        $message->from($data['email']);
    });

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}
}