<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScrapEmail;
use App\Mail\EmailIntroduction;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        $scrapEmails = ScrapEmail::all();

        return view ('welcome', compact('scrapEmails'));
    }

    public function sendEmail(Request $request)
    {
        // Validate the request
        $request->validate([
            'email-sender' => 'required',
            'email-receiver' => 'required',
            'niche' => 'required',
            'name' => 'required',
            'sequence' => 'required',
        ]);

        // Create the email record in the database
        ScrapEmail::create([
            'name' => $request->input('name'),
            'email-sender' => $request->input('email-sender'),
            'email-receiver' => $request->input('email-receiver'),
            'niche' => $request->input('niche'),
            'sequence' => $request->input('sequence'),
        ]);

        // Send an email
        Mail::to($request->input('email-receiver'))->send(
            new EmailIntroduction($request->input('name'), $request->input('niche')) // Pass niche as required
        );

        // Redirect back with a success message
        return redirect()->route('welcome')->with('success', 'Email is sent to the receiver.');
    }
}
