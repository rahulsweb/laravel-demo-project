<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
class LoginController extends Controller
{
    //

  
  

    public function login(Request $request)
    {
    
        //
        if(Auth::attempt([
            'email'=>$request->email,
               'password'=>$request->password 
            ])
        )
        {
        
            $user=User::where('email',$request->email)->first();
        
            if($user->is_admin()){
                
                return redirect('admin/dashboard');

                }
            elseif(!$user->is_admin())
            {
                \Auth::logout();
                $request->session()->put('error', 'Your Not Authorise for this page');
           
                return redirect('/admin');
            }

        }

        $request->session()->put('error', 'Invalide Email and PassWord');
        return redirect('/admin');
         
   
    }


    public function adminLogout(Request $request)
{


    if(\Auth::check())
    {
        \Auth::logout();
        $request->session()->invalidate();
    }
    return  redirect('/admin');
}



protected function guard()
    {
        return Auth::guard();
    }
}

