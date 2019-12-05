<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
      /*
    |--------------------------------------------------------------------------
    | ProductController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling Product requests
    | and uses a simple trait to include thssis behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage Product Manage in applicaton
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
     * Display specific Product instance.
     *
     * @return void
     */
  

    public function show($id)
    {

        $carts = isset(session('cart')->items) ? session('cart')->items : null;
        $products = Product::with('product_image', 'categories', 'product_attribute')->FindOrFail($id);

        return view('frontend_theme.shop.product_details', compact('products', 'carts'));
    }

}
