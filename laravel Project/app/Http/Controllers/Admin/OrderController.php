<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\LogOrder;
use App\Mail\StatusUser;
use App\Order;
use App\OrderPaymentDetail;
use Illuminate\Http\Request;
use Mail;

class OrderController extends Controller
{
    /**
     * Order Controller index method
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */
    public function index(Request $request)
    {
        //

        $keyword = $request->get('search');
        $perPage = 5;
        $orders = Order::latest()->paginate($perPage);
        if (!empty($keyword)) {

            $orders = Order::Search($keyword)->paginate($perPage);

        }

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $orders = Order::with('users', 'orderPayment', 'order_carts')->find($id);

        return view('admin.order.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $orders = Order::with('users', 'orderPayment', 'order_carts')->find($id);

        return view('admin.order.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $logs = new LogOrder;
        $order_payment = OrderPaymentDetail::find($order->orderPayment[0]->id);

        $order_payment->update(['status' => $request->status]);

        $logs->create(['order_id' => $order->id,
            'status' => $request->status]);

        Mail::to($order->users->email)->send(new StatusUser($order, $request->status));
        return redirect('admin/order')->with('flash_message', 'Status updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search($keyword)
    {
        //

        $perPage = 5;
        $orders = Order::SearchEmail($keyword)->paginate($perPage);
        return view('admin.order.index', compact('orders'));
    }

}
