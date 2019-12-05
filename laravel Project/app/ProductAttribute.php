<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_attributes';

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
    protected $fillable = ['color', 'quantity','product_id'];

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the products details 
     */

    
    public function product()
    {
        return $this->belongsTo(Product::class);
       
    }

}
