<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'status', 'google_id', 'github_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *check user is admin or not  
     */

    public function is_admin()
    {

        if ($this->roles->pluck('name')[0] !== 'customer') {
            return true;
        } else {
            return false;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the customer details 
     */

    public function customer()
    {

        if ($this->roles->pluck('name')[0] == 'customer') {
            return true;
        } else {
            return false;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users details 
     */


    public function product_user()
    {

        return $this->hasMany(CartDetail::class, 'user_id', 'id');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users address details 
     */


    public function user_address()
    {

        return $this->hasMany(Address::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users orders details 
     */

    public function orders()
    {

        return $this->hasMany(Order::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *relation to the users wishlist details 
     */
 

    public function wishlists()
    {
        return $this->belongsToMany(Product::class, 'user_wish_lists')->withTimestamps();
    }


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search Users details 
     */

    public function scopeSearchName($query,$keyword)
    {
        return $query-> where('first_name', 'LIKE', "%$keyword%")->orwhere('last_name', 'LIKE', "%$keyword%")->orwhere('email', 'LIKE', "%$keyword%")
        ->whereHas('roles', function ($query) {
            $query->where('name', 'customer');

        })
        ->orderBy('id', 'DESC');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search Order details 
     */

    public function scopeOrderById($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'customer');
    
        })->latest()->orderBy('id', 'DESC');
    }
    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Search customer details 
     */

    public function CustomerSearch($query,$search)
    {
        return $query->whereHas('roles', function ($query) {
                $query->where('name', 'customer');

            })->select('first_name', 'last_name', 'email', 'created_at')->where('first_name', 'LIKE', "$search%")
                ->orwhere('email', 'LIKE', "%$search%")
                ->orderBy('id', 'DESC')
                ->get();
    } 
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     *laravel concept Scope use Order details 
     */

    public function List($query)
    {
        return $query->whereHas('roles', function ($query) {
                $query->where('name', 'customer');

            })->select('first_name', 'last_name', 'email', 'created_at')->orderBy('id', 'DESC')
                ->get();
    }

}
