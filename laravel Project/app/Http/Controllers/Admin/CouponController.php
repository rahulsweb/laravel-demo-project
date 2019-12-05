<?php

namespace App\Http\Controllers\admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Http\Requests\CouponUpdateRequest;

class CouponController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Coupon Controller Index method listing data
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */
    public function index()
    {

        $coupon = Coupon::all();

        return view('admin.coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CouponRequest $request)
    {

        $requestData = $request->all();
        $requestData['qty_left'] = $request->qty;
        Coupon::create($requestData);

        return redirect('admin/coupon')->with('flash_message', 'Coupon added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Coupon $coupon)
    {

        return view('admin.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Coupon $coupon)
    {

        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  Coupon
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {

        $requestData = $request->all();
        $requestData['qty_left'] = $request->qty;

        $coupon->update($requestData);

        return redirect('admin/coupon')->with('flash_message', 'Coupon updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect('admin/coupon')->with('flash_message', 'Coupon deleted!');
    }
}
