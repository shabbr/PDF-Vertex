<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// use Mail;
use App\Mail\ContactMail;
use App\Mail\MailtrapMail;
use App\Mail\TestMail;
use App\Services\EmailServiceFactory;
use App\Services\EmailServiceInterface;

class MailController extends Controller
{
   protected $emailService;
   public function __construct(EmailServiceInterface $emailService)
   {
    $this->emailService=$emailService;
   }
    public function contactMail(Request $request){
        $validatedData = $request->validate([
            'sendFrom' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ],[
            'sendFrom.required' => 'Your email is required.',
            'sendFrom.email' => 'Please enter a valid email address.',
         ]);
        $mailData=[
            'sendFrom' =>$request->sendFrom,
            'subject'=>$request->subject,
            'message' =>$request->message
        ];
   Mail::to("shabbar812@gmail.com")
   ->send(new ContactMail($mailData));

   return redirect()->back();
    }

    public function mailtrap(Request $request){
        $to='shabbar812@gmail.com';
        $subject='EmailService Test';
        $body='Successfully sended email by DIP';
        $service=$request->service;
        $this->emailService = EmailServiceFactory::make($service);
      $this->emailService->send($to,$subject,$body);
      return ' email sended';
    }

    public function testing(Request $request)
    {
        $to = 'shabbar812@gmail.com';
        $subject = 'EmailService Test';
        $body = 'Successfully sent email by DIP';

        $mailData = [
            'to' => $to,
            'subject' => $subject,
            'body' => $body
        ];

        Mail::to('shabbar812@gmail.com')->send(new MailtrapMail());

        return 'Email sent';
    }


}
