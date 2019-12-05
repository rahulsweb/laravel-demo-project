<?php

namespace App\Http\Controllers\frontend;

use App\Address;
use App\Cart;
use App\Coupon;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
   
 /*
    |--------------------------------------------------------------------------
    | CheckoutController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling checkout requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage checkout system in applicaton
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
     * index method list data on index page Checkout list instance.
     *
     * @return void
     */
   
    public function index()
    {
        $coupons = Coupon::where('qty_left', '=', '0')->update(['status' => 'InActive']);
        $coupons = Coupon::where('qty_left', '<>', '0')->latest()->take(5)->get();
        $addresses = Address::all();

        if (!Session::has('cart')) {
            return view('frontend_theme.shop.shopping_cart', ['product' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //
        if (Auth::check()) {
            return view('frontend_theme.shop.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'addresses' => $addresses, 'coupons' => $coupons]);
        }

        return redirect('login');

    }

     /**
     * Checkout list get Address perticular user using ajax.
     *
     * @return void
     */
   

    public function getAddress(Request $request, $id)
    {
        $address = Address::find($id);
        return response()->json(['success' => $address]);
    }

     /**
     * Add product in wishlist .
     *
     * @return void
     */
   

    public function addWish(Request $request)
    {

        return view('frontend_theme.shop.wishlist', compact('products'));
    }
}
