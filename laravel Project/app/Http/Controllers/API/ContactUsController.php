<?php

namespace App\Http\Controllers\API;

use App\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ContactUsController extends Controller
{

    /**
     *   ContactUSController store method pass one parameter ContactUSRequest $request for storing *  ContactUS user related

     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *ContactUsController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

    /**
     * @api {post} http://localhost:8000/api/contact-us/create
     * @apiGroup  Contact
     * @apiName  Contact Us
     * @apiParam {String} Name Mandatory
     * @apiParam {String} email Mandatory
     * @apiParam {String} Subject Mandatory
     * @apiParam {String} Contact Mandatory
     * @apiParam {String} Message Mandatory


     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": {
    "name": [
    "name is required"
    ],
    "email": [
    "Email Required"
    ],
    "subject": [
    "subject Required"
    ],
    "contact": [
    "contact required"
    ],
    "message": [
    "message Required"
    ]
    },
    "data": []
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "thank you for contact us",
    "data": {
    "name": "rahul sonawane",
    "email": "rahul@gmail.com",
    "subject": "Creating API",
    "contact": "9763362767",
    "message": "asdasdas",
    "updated_at": "2019-12-05 07:08:57",
    "created_at": "2019-12-05 07:08:57",
    "id": 4
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
    "name": [
    "name is required"
    ],
    "email": [
    "Email Required"
    ],
    "subject": [
    "subject Required"
    ],
    "contact": [
    "contact required"
    ],
    "message": [
    "message Required"
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'contact' => 'required|numeric|digits:10',
            'message' => 'required',

        ],
            [

                'name.required' => 'name is required',
                'email.required' => 'Email Required',
                'subject.required' => 'subject Required',
                'message.required' => 'message Required',
                'contact.required' => 'contact required',
                'contact.digits' => 'contact number must be 10 digit',

            ]

        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),
                'data' => [],

            ], 401);
        }

        $requestData = $request->all();

        $data = ContactUs::create($requestData);
        return response()->json([

            'status' => true,
            'message' => 'thank you for contact us',
            'data' => $data,

        ], 401);

    }

}
