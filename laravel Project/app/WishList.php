<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


     class WishList extends Model
{

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     * users wishlist details model 
     */
 
    protected $table = 'user_wish_lists';
    //
    protected $fillable = ['user_id','product_id'];

   
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users wishlist product details 
     */
 
    public function products()
{
    return $this->belongsTo(Product::class,'product_id')->with('product_image');
}

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users wishlist details 
     */
 
public function users()
{
    return $this->belongsTo(User::class,'user_id');
}

}
