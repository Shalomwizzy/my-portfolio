<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactMailResponse;
use App\Mail\ResponseMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function contactMe()
    {
        return view('mail.contact-form');
    }

    public function sendMails(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'message' => 'required|string'
        ]);
    
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];
    
        // Send email to admin
        Mail::to('support@shalomwizzy.com')->send(new ContactMail($data));
    
        // Send automatic response to the user
        $this->sendAutomaticResponse($data);
    
        return redirect()->route('thank.you');

    }
    
    public function sendAutomaticResponse(array $data)
    {
        Mail::to($data['email'])->send(new ResponseMail($data));
    }


    

    }