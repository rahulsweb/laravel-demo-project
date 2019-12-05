<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

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
    protected $fillable = ['fullname','state','country','pincode','address1','address2','user_id'];




/**
     * User method relation wiht Address.
     *
     * @return \Illuminate\Http\Response
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Orders relation with address of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function orders()
    {
        return $this->hasOne(Order::class);
    }
    
}
