<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OrderTrackRequest;
use App\Order;

class OrderController extends Controller
{
    

    /*
    |--------------------------------------------------------------------------
    | OrderController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling Order requests
    | and uses a simple trait to include thssis behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage Order Mange in applicaton
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
 
    public function __construct()
    {
        $this->middleware('frontend');

    }
 

 /**
     * listing data display orders using Ordercontroller instance.
     *
     * @return void
     */
   
    public function index()
    {
        //
        $orders = Order::GetOrder();

        return view('frontend_theme.shop.order_detail', compact('orders'));
    }

    public function show($id)
    {
        $orders = Order::with('users', 'orderPayment', 'order_carts')->find($id);

        return view('frontend_theme.shop.order_detail', compact('orders'));
    }


 /**
     * Track Order Display on page using showTrack method  instance.
     *
     * @return void
     */
   
    public function showTrack()
    {
        return view('frontend_theme.shop.order_track');
    }
    public function orderTrack(OrderTrackRequest $request)
    {

        $orders = Order::where('order_code', $request->order_code)->with('users', 'orderPayment', 'order_carts')->get();
        if (isset($orders[0]->users->email)) {
            $email = $orders[0]->users->email;
        } else {
            return back()->with('message', 'Your Order Code Or Email Is invalid');
        }

        if ($email == $request->email && isset($orders)) {
            return view('frontend_theme.shop.order_track', compact('orders'))->with('message', 'Order Code ' . $request->order_code);
        }

        return back()->with('message', 'Found your Order Code');
    }

}
