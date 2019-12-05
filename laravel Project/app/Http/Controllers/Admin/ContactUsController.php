<?php

namespace App\Http\Controllers\admin;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Mail\AdminContactUs;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{

    /**
     * ContactUs Controller CustomerIndex
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */
    public function index()
    {

        $contactUs = ContactUs::all();

        return view('admin.contact-us.index', compact('contactUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contact-us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        ContactUs::create($requestData);

        return redirect('admin/contact-us')->with('flash_message', 'ContactUs added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(ContactUs $contactUs)
    {

        return view('admin.contact-us.show', compact('contactUs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(ContactUs $contactUs)
    {

        return view('admin.contact-us.edit', compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, ContactUs $contactUs)
    {

        $requestData = $request->all();

        $contactUs->update($requestData);

        Mail::to($contactUs->email)->send(new AdminContactUs($contactUs, $request->note, $request->ip()));

        return redirect('admin/contact-us')->with('flash_message', 'ContactUs updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(ContactUs $contactUs)
    {
        $contactUs->delete();
        return redirect('admin/contact-us')->with('flash_message', 'ContactUs deleted!');
    }
}
