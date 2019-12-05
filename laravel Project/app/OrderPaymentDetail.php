<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPaymentDetail extends Model
{
    //


    protected $table ='order_payment_details';

    protected $fillable = ['order_id','payment_id','payment_type','status','rate','total'];

  
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Order and Order Payment details 
     */

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Order cart and Order Payment details 
     */
    public function order_carts()
    {
        return $this->belongsToMany(Product::class,'order_cart_details');
    }
  
}
