<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\RegisterRequest;
use App\Mail\AdminRegisterUser;
use App\Mail\RegisterUser;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Session;
use Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'localhost:8000';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        return view('frontend.login.register', ['formMode' => 'create']);

    }
    public function store(RegisterRequest $request)
    {

        $users = new User;
  
        $data=[
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
 
        if ($users=$users->create($data)) {

            $users->assignRole('customer');
            Mail::to($users->email)->send(new RegisterUser($users, $request->password));

            Mail::to("rahul@gmail.com")->send(new AdminRegisterUser($users));
            Session::put('register', 'Registration Is Successfully');
            return redirect('login');

        }

        Session::put('register', 'Your Registraion not successfully done');
        return redirect('login');

    }

}
