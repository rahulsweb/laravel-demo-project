<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['name','rate','qty_left','status'];

    

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Product and categories details 
     */

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_product')->withTimestamps();
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Product and categories details 
     */

    public function category()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }
 


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Product and product image details 
     */
    public function product_image()
    {
        
        return $this->hasMany(ProductImage::class);
       
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation  use Product and product attributes details 
     */

    public function product_attribute()
    {
        return $this->hasOne(ProductAttribute::class);
       
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use get Product details 
     */


    public function scopeGetProduct($query)
    {
            return $query->get();
          
    } 





/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Active Product details 
     */
 
    public function scopeActive($query)
    {
        return $query->where('qty_left', '<>', 0)->latest()->paginate(6);
    }
    


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use set status active details 
     */

    public function scopeStatusActive($query,$id)
    {
        return $query->with('categories', 'product_image')->whereHas('categories', function ($query) use ($id) {
    
            $query->where('category_id', '=', $id);
    
        })->where('qty_left', '<>', 0)->get();
    }



/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use set categories Status active details 
     */
    public function scopeCategoryActive($query,$id)
    {
        return $query->with('categories')->whereHas(
            'categories', function ($q) use ($id) {$q->where('category_id', $id);
            })->where('qty_left', '<>', 0)->get();
    }



/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search Products details 
     */
    public function scopeSearch($query,$keyword)
    {
        
            return $query->where('name', 'LIKE', "%$keyword%")

            ->orwhereHas('categories', function ($query) use ($keyword) {

                $query->where('name', 'LIKE', "%$keyword%");

            })->where('qty_left', '<>', 0)->with('categories')->latest()->paginate(6);
          
    }  



/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Product Qty Left details 
     */
    public function scopeQtyLeft($query)
    {
            return $query->with('categories', 'product_image')->where('qty_left', '<>', 0)->get();
            
    }  


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users details 
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'user_wish_lists')->withPivot('user_id','product_id');
       
    }

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to Order Cart Details details 
     */

 
    public function order_carts()
    {
        return $this->belongsToMany(Order::class,'order_cart_details')->withPivot('qty', 'total','images','created_at','total_cart','total_qty','category_name');
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search Order details 
     */

    public function scopeGetAll($query)
    {
        return $query->with('categories', 'product_image','order_carts','users','product_attribute')->get();
    }

  
}




