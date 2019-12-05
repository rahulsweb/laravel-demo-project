<?php

namespace App\Http\Controllers\admin;

use App\EmailTemplate;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Email Controller Index method
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */
    public function index()
    {

        $email = EmailTemplate::all();

        return view('admin.email_template.index', compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.email_template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailTemplateRequest $request)
    {

        $email = new EmailTemplate;

        $email->create($request->all());
        return redirect('admin/email-template')->with('flash_message', 'Email Template added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplate $email)
    {

        return view('admin.email_template.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $email)
    {

        return view('admin.email_template.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailTemplate $email)
    {
        //
        $requestData = $request->all();

        $email->update($requestData);

        return redirect('admin/email-template')->with('flash_message', 'email template updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplate $email)
    {
        //
        $email->delete();

        return redirect('admin/email-template')->with('flash_message', 'Email Template deleted!');
    }
}
