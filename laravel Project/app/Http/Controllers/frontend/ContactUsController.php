<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\ContactRequest;
use App\ContactUs;
use App\Mail\ContactUser;
use Mail;
class ContactUsController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | ContactUsController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling ContactUs requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage ContactUs system in applicaton
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
 
   public function contactUS()
   {
       return view('contact-us');
   }
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function contactSaveData(ContactRequest $request)
   {

      $contact=ContactUS::create($request->all()); 

Mail::to($contact->email)->send(new ContactUser($contact,$request->ip()));
    return back()->with('success', 'Thanks for contacting us!'); 
   }
}