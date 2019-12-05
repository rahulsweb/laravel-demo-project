<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = true;

    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * @api {post} http://localhost:8000/api/register
     * @apiGroup  User
     * @apiName  User Register
     * @apiParam {String} first_name Mandatory
     * @apiParam {String} last_name Mandatory
     * @apiParam {String} email Mandatory
     * @apiParam {String} password Mandatory
     * @apiParam {String} c_password Mandatory
     * @apiSuccess {Object[]} error


     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "Success",
    "data": {
    "first_name": "arul",
    "last_name": "acharya",
    "email": "arul234@gmail.com",
    "updated_at": "2019-12-04 12:26:35",
    "created_at": "2019-12-04 12:26:35",
    "id": 163,
    "roles": [
    {
    "id": 5,
    "name": "customer",
    "guard_name": "web",
    "created_at": "2019-09-07 06:26:27",
    "updated_at": "2019-09-07 06:26:27",
    "pivot": {
    "model_id": 163,
    "role_id": 5,
    "model_type": "App\\User"
    }
    }
    ]
    }
    }
     *
     * @apiError {String} status response status (False)
     * @apiError {object[]} data
     * @apiError {Object[]} error message to display
     *
     * @apiErrorExample {json} Error-Response:
    {
    "status": false,
    "message": {
    "first_name": [
    "First Name Required"
    ],
    "last_name": [
    "Last Name Required"
    ],
    "email": [
    "Email Required"
    ],
    "password": [
    "Password Required"
    ],
    "c_password": [
    "Confirm Password Required"
    ]
    }
    }

     */

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ],
            [
                'email.required' => 'Email Required',
                'password.required' => 'Password Required',
            ]

        );

        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

                'data' => [],
            ], 401);
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json([
                'status' => $this->successStatus,
                'message' => 'Success',

                'data' => [
                    'token' => $success['token'],
                    'data' => $user,

                ],

            ]);
        } else {
            return response()->json([

                'status' => false,
                'message' => 'Email Or Password Does Not Exist',

            ], 401);
        }
    }
/**
 * Register api
 *
 * @return \Illuminate\Http\Response
 */

    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * AddressController add address in database
     * also edit ,delete addresses in related user address if exist
     */

    /**
     * @api {post} http://localhost:8000/api/login
     * @apiGroup  User
     * @apiName  User Login
     * @apiParam {String} email Mandatory
     * @apiParam {String} password Mandatory


     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Email Or Password Does Not Exist"
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "Success",
    "data": {
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImVmYzBhNGJmYmVlN2IyOWQxZTM2YWMzZWI0MDdmYWNjZWRlNGIzMTJjMzdlNzI2M2VjNDA2YjQ2NWIwYTM0NWFlZjg3ZjM1YTA0YzcwYTllIn0.eyJhdWQiOiIxIiwianRpIjoiZWZjMGE0YmZiZWU3YjI5ZDFlMzZhYzNlYjQwN2ZhY2NlZGU0YjMxMmMzN2U3MjYzZWM0MDZiNDY1YjBhMzQ1YWVmODdmMzVhMDRjNzBhOWUiLCJpYXQiOjE1NzU0NjM3MDQsIm5iZiI6MTU3NTQ2MzcwNCwiZXhwIjoxNjA3MDg2MTA0LCJzdWIiOiIxNjMiLCJzY29wZXMiOltdfQ.g7rCRhMff_tXNypQYQDvHZWqRCFs0L9JMPrzFVBUyQJUiMFG8j7Eyb3NiFV1tPvhSYzgDU70JfpoNLRQs5u_5FuIrfAWrczkOIe1s6onLc3dpekXTPxISpU954wDdIP5CNKlXmDJiwLHFjoV7Iq9e_7CBhczCgyzQjF5UaGEhPwC4j8aNFyGGE5d5qpZXva9QITQPa_cf0zvJDNIG0COcQUEiJKQ7tXdAewU9i5JSbPmO_KlnKnWcr8bteWJKN3Xj6HszD2m8E3A1UGdQynYRLHz5v8FvWgMP7h5xVuyPGMveCuztT3N0u0mIMaaiy3lOLuBDCjlula5i4A1yQxWBAu8kRvErlo2aVdpT-9AMNi2kUYCA8rSw0NFMWaTRr1Ua68psnm3k0GYkfzCWMh5p0ZK7Bhg2NQ-rjGSg3RYJO3ZEmg_nsAER9xaQ-SP67MhKGlSM2y0y7hPrhQHsrFpsld_JeSxagnP4BLyz0zukPWHFSBKIteQFzDJ7NpH_Bcpo2O-9kEjvhqFOYdSPDShOsYvknANqY2EcC-cd3WHp6itFDO-mTwh3s2QaE40ZzRS3FKA2BFWJQcvsCzQyu0jXQw9tfEcFQixNOQ-0eqFzWIMOpUim3zK-2mIV4aGEqw-CtP58uRUaN4o02-IBK4rggpDhdYn9dGaYVOpm132b20",
    "data": {
    "id": 163,
    "first_name": "arul",
    "last_name": "acharya",
    "email": "arul234@gmail.com",
    "status": "1",
    "profile": null,
    "created_at": "2019-12-04 12:26:35",
    "updated_at": "2019-12-04 12:26:35",
    "google_id": null,
    "github_id": null
    }
    }
    }
     *
     * @apiError {String} status response status (False)
     * @apiError {object[]} data
     * @apiError {Object[]} error message to display
     *
     * @apiErrorExample {json} Error-Response:
    {
    "status": false,
    "message": {
    "email": [
    "Email Required"
    ],
    "password": [
    "Password Required"
    ]
    },
    "data": []
    }

     */
    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * AddressController add address in database
     * also edit ,delete addresses in related user address if exist
     */

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',

            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ],
            [

                'first_name.required' => 'First Name Required',
                'last_name.required' => 'Last Name Required',
                'email.required' => 'Email Required',
                'password.required' => 'Password Required',
                'c_password.required' => 'Confirm Password Required',

            ]

        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

            ], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole('customer');
        $success['token'] = $user->createToken('MyApp')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $user,

        ]);

    }
/**
 * details api
 *
 * @return \Illuminate\Http\Response
 */
    public function details()
    {
        $user = Auth::user();
        return response()->json([
            'status' => true,
            'message' => 'success',

        ]

        );
    }
}
