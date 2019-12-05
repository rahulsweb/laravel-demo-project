<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['order_code', 'user_id', 'billing_id', 'shipping_id', 'coupon_id'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *user order relation
     */

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *Order Payment relation
     */
    
    public function orderPayment()
    {
        return $this->hasMany(OrderPaymentDetail::class, 'order_id');
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *Order and Cart relation
     */
    

    public function order_carts()
    {
        return $this->belongsToMany(Product::class, 'order_cart_details')->withPivot('qty', 'total', 'images', 'created_at', 'total_cart', 'total_qty', 'category_name');
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *Log order relation
     */
    

      public function log_order()
    {
        return $this->hasMany(LogOrder::class);
    }
 

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *relation with shipping address 
     */
    
    public function shipping_address()
    {
        return $this->belongsTo(Address::class, 'shipping_id');
    }
    


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *relation with billing address 
     */
    public function billing_address()
    {
        return $this->belongsTo(Address::class, 'billing_id');
    }



/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *relation with coupons 
     */
    public function coupons()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use GetOrder details 
     */

    public function scopeGetOrder($query)
    {
        return $query->where('user_id', auth()->user()->id)->with('users', 'orderPayment', 'order_carts', 'log_order')->get();
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search details 
     */



    public function scopeSearch($query, $keyword)
    {

        return $query->whereHas('users', function ($query) use ($keyword) {
            $query->where('first_name', 'LIKE', "%$keyword%");

            $query->orwhere('last_name', 'LIKE', "%$keyword%");

            $query->orwhere('email', 'LIKE', "%$keyword%");
        })->orwhereHas('log_order', function ($query) use ($keyword) {
            $query->where('status', 'LIKE', "%$keyword%");

        })->orwhere('order_code', 'LIKE', "%$keyword%")->with('users', 'orderPayment', 'order_carts', 'log_order');
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search Email details 
     */



    public function scopeSearchEmail($query, $keyword)
    {

        return $query->whereHas('users', function ($query) use ($keyword) {
            whereHas('users', function ($query) use ($keyword) {
                $query->where('email', 'LIKE', "%$keyword%");
            })->orwhere('order_code', 'LIKE', "%$keyword%")->with('users');

        });

    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Order id  details 
     */


    public function scopeOrderById($query)
    {

        return $query->WhereNotNull('coupon_id')->with('coupons', 'users')->orderBy('id', 'DESC');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search By Coupon details 
     */


    public function scopeSearchByCoupons($query, $keyword)
    {

        return $query->whereHas('users', function ($query) use ($keyword) {

            $query->where('first_name', 'LIKE', "%$keyword%");

            $query->orwhere('email', 'LIKE', "%$keyword%");

        })->orwhereHas('coupons', function ($query) use ($keyword) {

            $query->where('code', 'LIKE', "%$keyword%");
            $query->orwhere('type', 'LIKE', "%$keyword%");
            $query->orwhere('title', 'LIKE', "%$keyword%");

        })->WhereNotNull('coupon_id')->with('coupons', 'users')->orderBy('id', 'DESC');

    }











/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use GetOrder details 
     */


 public function scopeSearchByCoupon($query,$search)
    {
        return $query->join('coupons', 'orders.coupon_id', '=', 'coupons.id')
                ->join('users', 'orders.user_id', '=', 'users.id')

                ->select('coupons.code as Code', 'coupons.discount as Discount', 'coupons.type as Type', 'users.first_name AS First Name', 'users.last_name as Last_name')
                ->where('coupons.code', 'LIKE', "$search%")
                ->orwhere('users.first_name', 'LIKE', "$search%")

                ->orwhere('users.email', 'LIKE', "$search%")

                ->whereNotNull('orders.coupon_id')
                ->get();
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Coupon List details 
     */


    public function scopeList($query)
    {
        return $query->join('coupons', 'orders.coupon_id', '=', 'coupons.id')
                ->join('users', 'orders.user_id', '=', 'users.id')

                ->select('coupons.code as Code', 'coupons.discount as Discount', 'coupons.type as Type', 'users.first_name AS First Name', 'users.last_name as Last_name')
                ->whereNotNull('orders.coupon_id')
                ->latest('orders.created_at')->get();
 
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search Order details 
     */


    public function scopeOrderSearch($query,$search)
    {
        return $query->join('users', 'orders.user_id', '=', 'users.id')
                ->join('log_order', 'log_order.order_id', '=', 'orders.id')
                ->join('order_cart_details', 'order_cart_details.order_id', '=', 'orders.id')
                ->select('orders.order_code as Order Code', 'users.first_name', 'users.last_name', 'log_order.status', 'order_cart_details.total_qty', 'order_cart_details.total_cart', 'log_order.created_at')
                ->where('orders.order_code', 'LIKE', "%$search%")
                ->orwhere('users.first_name', 'LIKE', "%$search%")
                ->orwhere('log_order.status', 'LIKE', "%$search%")
                ->orwhere('users.email', 'LIKE', "%$search%")
                ->latest('orders.created_at')->get();
    }




}
