<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','code','type','discount','qty','qty_left','status'];




/**
     * Orders related to the order and Coupon a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function orders()
    {
        return $this->hasMany(Order::class);
    }

/**
     * Find By Coupon when Using this method a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public static  function findByCode($code)
    {
         return self::where('code',$code)->first();
    }


/**
     * discount when apply coupon a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function discount($total)
    {
       
             if($this->qty_left > 0)
         return ($this->discount/100)*$total;
       
         return $total;
    }


/**
     * check coupon expire are not .
     *
     * @return \Illuminate\Http\Response
     */

    public function expire($code)
    {
        $coupon=self::where('code',$code)->first();
        if($coupon->status=='InActive' && $coupon->qty_left < 1)
        return true;
  
        return false;

    }

/**
     * SetStatus Active Or inActive a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function setStatus($code)
    {
        $coupon=self::where('code',$code)->first();
        if($coupon->qty_left < 1)
        {
            $coupon->status="InActive";
            
            return $coupon->update(['status'=>$coupon->status]);
        }
    
    }



}
