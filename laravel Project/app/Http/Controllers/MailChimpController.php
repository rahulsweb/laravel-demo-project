<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class MailChimpController extends Controller
{

    public function manageMailChimp()
    {
        return view('mailchimp');
    }

    public function store(Request $request)
    {
        if (!Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);

            return back()->with('success', "subcribe successfully");
        }
        return back()->with('success', "Your already subscribe");
    }

}
