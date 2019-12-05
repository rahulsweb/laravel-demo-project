<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPlace extends Model
{
    //
    protected $table ='api_order_place';

    protected $fillable = ['amount','user_id','order_code','payment_status','payment_mode'];
}
