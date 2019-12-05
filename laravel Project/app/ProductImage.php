<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_images';

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
    protected $fillable = ['name','product_id'];
    


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the Product image details 
     */

    public function product()
    {
        return $this->belongsToMany(Product::class);
       
    }

}
