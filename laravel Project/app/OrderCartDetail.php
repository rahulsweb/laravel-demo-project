<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCartDetail extends Model
{
    //
    protected $table = 'order_cart_details';
    protected $fillable = ['order_id','product_id','qty','total','images','total_cart','total_qty','category_name'];

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Product and Order Cart  details 
     */




public function products()
{
    return $this->belongsTo(Product::class,'product_id');
}
  




/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search By Name details 
     */



public function scopeSearchByName($query,$keyword)
{
    return $query->whereHas('products', function ($query) use ($keyword) {

        $query->where('name', 'LIKE', "%$keyword%");
    
    })->orWhere('category_name', 'LIKE', "%$keyword%")->orderBy('id', 'DESC');
}


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search By Product details 
     */



public function scopeSearchByProduct($query,$search)
{
	return $query->join('products', 'order_cart_details.product_id', '=', 'products.id')
                ->join('orders', 'order_cart_details.order_id', '=', 'orders.id')

                ->select('products.name as Product Name', 'order_cart_details.total_qty as Product Qty', 'order_cart_details.total_cart as Product rate', 'order_cart_details.category_name as Category Name')
                ->where('products.name', 'LIKE', "%$search%")

                ->orwhere('order_cart_details.category_name', 'LIKE', "%$search%")
                ->orderBy('order_cart_details.id', 'DESC')
                ->get();
}

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use List details 
     */



public function scopeList($query)
{
	return $query->join('products', 'order_cart_details.product_id', '=', 'products.id')
                ->join('orders', 'order_cart_details.order_id', '=', 'orders.id')

                ->select('products.name as Product Name', 'order_cart_details.total_qty as Product Qty', 'order_cart_details.total_cart as Product rate', 'order_cart_details.category_name as Category Name')
                ->orderBy('order_cart_details.id', 'DESC')
                ->latest('products.created_at')
                ->get();
}




}
