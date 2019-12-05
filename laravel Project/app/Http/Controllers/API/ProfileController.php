<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *ProfileController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

    /**
     * @api {post} http://localhost:8000/api/profile/details
     * @apiGroup  Profile
     * @apiName  Profile Details
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "User Not Found"
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "success",
    "data": {
    "id": 163,
    "first_name": "arul",
    "last_name": "acharya",
    "email": "arul234@gmail.com",
    "status": "1",
    "profile": null,
    "created_at": "2019-12-04 12:26:35",
    "updated_at": "2019-12-04 13:27:40",
    "google_id": null,
    "github_id": null
    }
    }


     * @apiError {String} status response status (False)
     * @apiError {object[]} data
     * @apiError {Object[]} error message to display
     *
     * @apiErrorExample {json} Error-Response:
    {
    "status": false,
    "message": {
    "User Not Found"
    },
    "data": []
    }

     */

    public function getProfileDetails(Request $request)
    {

        $user = User::find(Auth::user()->id);

        if (!$user) {
            return response()->json([

                'status' => false,
                'message' => 'User Not Found',

                'data' => [],
            ], 401);

        }

        return response()->json([

            'status' => true,
            'message' => 'success',

            'data' => $user,
        ], 401);
    }

/**
 * @param \App\Http\Controllers\Request $request
 *ProfileController store method pass one parameter ProfileRequest $request for storing a Profile user related
 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
 *ProfileController add Contact us in database
 * also edit ,delete Contact us in related user Contact us if exist
 */

    /**
     * @api {post} http://localhost:8000/api/profile/update
     * @apiGroup  Profile
     * @apiName  Profile Update
     * @apiError {String} status response status (False)
    {
    "status": false,
    "error": "User Not Found"
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "success",
    "data": {
    "id": 163,
    "first_name": "arul1",
    "last_name": "acharya1",
    "email": "arul234@gmail.com",
    "status": "1",
    "profile": "User/1575524439_s4.jpeg",
    "created_at": "2019-12-04 12:26:35",
    "updated_at": "2019-12-05 05:40:39",
    "google_id": null,
    "github_id": null
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
    "error": 'Profile Is Not Updated',

    },
    "data": []
    }

     */

    public function update(Request $request)
    {

        $user = User::find(Auth::user()->id);
        $location = "";
        $filename = "";
        if ($request->hasFile('profile')) {

            $filename = "";
            $file = $request->file('profile');
            $location = 'User/';

            $filename = time() . "_" . $file->getClientOriginalName();

            $user->profile = $location . $filename;

            $result = $file->move($location, $filename);

        }
        $fileLocation = $location . $filename;
        $data = [
            'first_name' => isset($request->firstname) ? $request->firstname : $user->first_name,
            'last_name' => isset($request->lastname) ? $request->lastname : $user->last_name,
            'profile' => isset($fileLocation) ? $fileLocation : $user->profile,

        ];
        if (!$user->update($data)) {
            return response()->json([

                'status' => false,
                'message' => 'Profile Is Not Updated',

                'data' => [],
            ], 401);

        }

        return response()->json([

            'status' => true,
            'message' => 'success',

            'data' => $user,
        ], 401);

    }

/**
 * @param \App\Http\Controllers\Request $request
 * ProfileController store method pass one parameter ProfileRequest $request for storing a Profile user related
 *User Profile password change
 *@return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
 *ProfileController add Contact us in database
 * also edit ,delete Contact us in related user Contact us if exist
 */

/**
 * @api {post} http://localhost:8000/api/profile/password
 * @apiGroup  Profile
 * @apiName  Profile Password change
 * @apiParam {String} current-password Mandatory
 * @apiParam {String} new-password Mandatory
 * @apiParam {String} new-password_confirmation Mandatory
 * @apiError {String} status response status (False)
{
"status": false,
"error":'Your current password does not matches with the password you provided. Please try again.'
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "Your Passsword Successfully Change",
"data": {
"id": 163,
"first_name": "arul1",
"last_name": "acharya1",
"email": "arul234@gmail.com",
"status": "1",
"profile": "User/1575525033_s4.jpeg",
"created_at": "2019-12-04 12:26:35",
"updated_at": "2019-12-05 05:56:18",
"google_id": null,
"github_id": null
}
}

 *
 * @apiError {String} status response status (False)
 * @apiError {object[]} data
 * @apiError {Object[]} error message to display
 *
 * @apiErrorExample {json} Error-Response:
{
{
"message": "The given data was invalid.",
"error": {
"current-password": [
"The current-password field is required."
],
"new-password": [
"The new-password field is required."
]
}
}
}

 */

    public function changePassword(Request $request)
    {

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches

            return response()->json([

                'status' => false,
                'message' => 'Your current password does not matches with the password you provided. Please try again.',

                'data' => [],
            ], 401);

        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same

            return response()->json([

                'status' => false,
                'message' => 'New Password cannot be same as your current password. Please choose a different password.',

                'data' => [],
            ], 401);

        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return response()->json([

            'status' => true,
            'message' => 'Your Passsword Successfully Change',

            'data' => $user,
        ], 401);

    }

}
