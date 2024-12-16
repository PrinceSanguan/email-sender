<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScrapEmail;
use App\Mail\EmailIntroduction;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailFollowUp;
use App\Mail\SocialProof;
use App\Mail\LastCall;

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
            'sequence' => 'required|integer|between:1,4', // Ensure sequence is valid
        ]);
    
        $emailReceiver = $request->input('email-receiver');
        $sequence = $request->input('sequence');
    
        // Check if the email receiver already exists in the ScrapEmail table
        $existingEmail = ScrapEmail::where('email-receiver', $emailReceiver)->first();
    
        if ($existingEmail) {
            // Check if the corresponding status is already set
            $statusField = "status{$sequence}";
            if ($existingEmail->{$statusField} === 'sent') {
                return redirect()->back()->with('error', "Email sequence {$sequence} is already sent.");
            }
    
            // Update the existing record's status
            $existingEmail->update([
                $statusField => 'sent',
            ]);
        }
    
        // If no existing record, create a new one
        $status1 = $status2 = $status3 = $status4 = null;
    
        // Set the appropriate status based on the sequence
        switch ($sequence) {
            case 1:
                $status1 = 'sent';
                break;
            case 2:
                $status2 = 'sent';
                break;
            case 3:
                $status3 = 'sent';
                break;
            case 4:
                $status4 = 'sent';
                break;
        }
    
        ScrapEmail::create([
            'name' => $request->input('name'),
            'email-sender' => $request->input('email-sender'),
            'email-receiver' => $emailReceiver,
            'niche' => $request->input('niche'),
            'sequence' => $sequence,
            'status1' => $status1,
            'status2' => $status2,
            'status3' => $status3,
            'status4' => $status4,
        ]);

        // Send the email based on sequence
        if ($sequence == 1) {
            // Send Introduction Email
            Mail::to($emailReceiver)->send(
                new EmailIntroduction($request->input('name'), $request->input('niche'))
            );
            return redirect()->route('welcome')->with('success', 'Email introduction is sent to the receiver.');
        } elseif ($sequence == 2) {
            // Send Follow-Up Email
            Mail::to($emailReceiver)->send(
                new EmailFollowUp($request->input('name'), $request->input('niche'))
            );
            return redirect()->route('welcome')->with('success', 'Email follow-up is sent to the receiver.');
        } elseif ($sequence == 3) {
            // Send Follow-Up Email
            Mail::to($emailReceiver)->send(
                new SocialProof($request->input('name'), $request->input('niche'))
            );
            return redirect()->route('welcome')->with('success', 'Email social proof is sent to the receiver.');
        } elseif ($sequence == 4) {
            // Send Follow-Up Email
            Mail::to($emailReceiver)->send(
                new LastCall($request->input('name'), $request->input('niche'))
            );
            return redirect()->route('welcome')->with('success', 'Email last call is sent to the receiver.');
        }
        return redirect()->back()->with('error', 'Invalid sequence. Email could not be sent.'); 
    }
}
