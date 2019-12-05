<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;

class ForgotPasswordController extends Controller
{

    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *ForgetPasswordController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

    // ForgetPasswordController store method pass one parameter ForgetPasswordRequest $request for storing a ForgetPassword user related

    use SendsPasswordResetEmails;
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @api {post} http://localhost:8000/api/password/email
     * @apiGroup  User
     * @apiName  User Password Forget
     * @apiParam {String} email Mandatory
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Email Or Password Does Not Exist"
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "Success"
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
    ]
    },
    "data": []
    }

     */

    public function getResetToken(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',

        ],
            [
                'email.required' => 'Email Required',

            ]

        );

        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

                'data' => [],
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([

                'status' => false,
                'message' => 'Email Or Password Does Not Exist',

            ], 401);
        }

        $sent = $this->sendResetLinkEmail($request);

        return ($sent)
        ? response()->json(['status' => true, 'message' => 'Success'])
        : response()->json(['message' => 'Failed']);

    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        return $response == Password::RESET_LINK_SENT ? 1 : 0;
    }

}
