<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;

use Session;
use App\Cart;

class CartController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | CartController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling cart requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function index()
    {
        //
        
    
        return view('frontend_theme.shop.shopping_cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $products=Product::find($id);

        $cart=Cart::add($id,$products->name,1,$products->rate,['size' => 'large']);
        return view('frontend_theme.shop.shopping_cart',compact('cart'));
    }
 
 /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * destroy method delete element of cart.
     *
     * @return void
     */
   


    public function destroy(Request $request,$id)
    {  
        //
        $products = session('cart');
        foreach ($products as $key => $product)
        {

      
            if ($product[$id] == $id)  
            {  
                    
                unset($product[$key]);            
            }
            $request->session()->push('cart',$product);
        }

        return redirect()->back();
    }




          
 /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * cart method  element of product add  in cart.
     *
     * @return void
     */
       



    public function cart(Request $request,$id )
    {
       
        $product=Product::find($id);
  
        $oldCart=Session::has('cart')? Session::get('cart'):null;
       
        $cart=new Cart($oldCart);
        $cart->addProduct($product,$id);
        Session::put('cart',$cart);
        return back()->with('massage',"product successfully addd");
    }
     /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * shopping cart  method cart  element manage.
     *
     * @return void
     */

    public function shoppingCart()
    {
        if(!Session::has('cart'))
        {
                return view('frontend_theme.shop.shopping_cart',['product'=>null]);
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('frontend_theme.shop.shopping_cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

     /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * removeProduct method remove element from cart.
     *
     * @return void
     */

    public function removeProduct($id)
    {

    
        $product=Product::find($id);
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeProduct($product,$id);
        Session::put('cart',$cart);
        return back()->with('message',"Product $product->name Remove Successfully"); 
    }

 /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * addCart method add  element of cart.
     *
     * @return void
     */

    public function addCart($id)
    {

        $product=Product::find($id);
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->addCart($product,$id);
        Session::put('cart',$cart);
        return back()->with('massage',"product successfully addd");
       
    }

     /**
     * Where to redirect users manage cart system in applicaton
     *
     * @var string
     */

    /**
     * minus method remove count one  element of cart.
     *
     * @return void
     */

    public function minusCart($id)
    {
        $product=Product::find($id);
        $oldCart=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->minusCart($product,$id);
        Session::put('cart',$cart);
        return back()->with('massage',"product successfully addd");

       
    }

        
    }
    



