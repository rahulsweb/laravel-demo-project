<?php



namespace App\Http\Controllers\frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    //
    protected $redirectTo = '/';
   
    /**     
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    /*
    |--------------------------------------------------------------------------
    | LoginController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling login requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage login system in applicaton
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
 

    public function login(Request $request)
    {

        $google = User::whereNotNull('google_id')->where('email', $request->email)->first();
        
        $github = User::whereNotNull('github_id')->where('email', $request->email)->first();
     
        if(isset($google) || isset($github))
        {
            \Auth::logout();
                $request->session()->put('error', 'Please Login Your Account Google Or Github'); 
                return redirect('/login');
        }
        $this->validate($request, [
            'email' => 'required|email|',
            'password' => 'required|min:8|'
         

           
        ]);
        //
        if(Auth::attempt([
            'email'=>$request->email,
               'password'=>$request->password 
            ])
        )
        {
           

            $user=User::where('email',$request->email)->first();
        
            if($user->customer()){
                
                return redirect('/');

                }
            else
            {
                session()->forget('error');
                \Auth::logout();
                $request->session()->put('error', 'Invalid Email Or Password');
           
                return redirect('/login');
            }

         


         
   

        }

        $request->session()->put('error', 'Not Exist Email and PassWord');
        return redirect('login');
         
   
    }


    public function logout(Request $request)
{
 
    if(\Auth::check())
    {
        \Auth::logout();
        $request->session()->invalidate();
    }
    return  redirect('login');
}



protected function guard()
    {
        return Auth::guard();
    }
}

