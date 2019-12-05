<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    //


    protected $table = 'cms';
 

   

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
    protected $fillable = ['name','title','slug','content','status'];
}


