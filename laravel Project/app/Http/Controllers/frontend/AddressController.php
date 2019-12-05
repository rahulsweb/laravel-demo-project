<?php

namespace App\Http\Controllers\frontend;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\AddressRequest;
use Illuminate\Http\Request; 

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('frontend');

    }
 /*
    |--------------------------------------------------------------------------
    | Address Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users address manage .
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    public function index(Request $request)
    {

        $address = Address::where('user_id', Auth()->user()->id)->latest()->get();

        return view('frontend.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AddressRequest $request)
    {
        $data = $request->all();
        $address = new Address;
        $data['user_id'] = auth()->user()->id;

        $address->create($data);
        return redirect('address')->with('flash_message', 'Address added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Address $address)
    {

        return view('frontend.address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Address $address)
    {

        return view('frontend.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Address $address)
    {

        $requestData = $request->all();

        $address->update($requestData);

        return redirect('address')->with('flash_message', 'Address updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect('address')->with('flash_message', 'Address deleted!');
    }
}
