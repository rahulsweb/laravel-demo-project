<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\AddressRequest;
use App\Http\Requests\frontend\AddressUpdateRequest;
use Illuminate\Http\Request;
use Validator;

class AddressController extends Controller
{

    /**
     * @api {post} http://localhost:8000/api/address/details
     * @apiGroup  Address
     * @apiName  Address Details
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Address Not Found",
    "data": []
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "SuccessFully inserted Address in database",
    "data": {
    "fullname": "Arul Acharya",
    "address1": "Dange Chauwk  Pune -33",
    "address2": "Hinjawadi Pune-17",
    "state": "maharashtra",
    "country": "India",
    "pincode": "979797",
    "user_id": 163,
    "updated_at": "2019-12-05 06:10:52",
    "created_at": "2019-12-05 06:10:52",
    "id": 116
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
    "message": "Address Not Found",
    "data": []
    }

     */

    public function index(Request $request)
    {

        $address = Address::where('user_id', Auth()->user()->id)->latest()->get();

        if (!$address->first()) {
            return response()->json([

                'status' => false,
                'message' => 'Address Not Found',
                'data' => $address,

            ], 401);
        }
        return response()->json([

            'status' => true,
            'message' => 'Success',
            'data' => $address,

        ], 401);
    }

    /**
     * Address Controller CustomerIndex
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

/**
 * @api {post} http://localhost:8000/api/address/store
 * @apiGroup  Address
 * @apiName  Address Store
 * @apiParam {String} fullname Mandatory
 * @apiParam {String} address1 Mandatory
 * @apiParam {String} address2 Optional
 * @apiParam {String} state Mandatory
 * @apiParam {String} country Mandatory
 * @apiParam {String} pincode Mandatory
 * @apiError {String} status response status (False)
{
"status": false,
"message": "Address Not Found",
"data": []
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "SuccessFully inserted Address in database",
"data": {
"fullname": "Arul Acharya",
"address1": "Dange Chauwk  Pune -33",
"address2": "Hinjawadi Pune-17",
"state": "maharashtra",
"country": "India",
"pincode": "979797",
"user_id": 163,
"updated_at": "2019-12-05 06:10:52",
"created_at": "2019-12-05 06:10:52",
"id": 116
}
}
 *
 * @apiError {String} status response status (False)
 * @apiError {object[]} data
 * @apiError {Object[]} error message to display
 *
 * @apiErrorExample {json} Error-Response:
{
"message": "The given data was invalid.",
"errors": {
"fullname": [
"The fullname field is required."
],
"country": [
"The country field is required."
],
"state": [
"The state field is required."
],
"address1": [
"The address1 field is required."
],
"pincode": [
"The pincode field is required."
]
}
}

 */

    public function store(AddressRequest $request)
    {

        $data = $request->all();
        $address = new Address;
        $data['user_id'] = auth()->user()->id;
        $addressData = $address->create($data);
        if (!$addressData) {
            return response()->json([

                'status' => false,
                'message' => 'Address is not inserted in A database',
                'data' => [],

            ], 401);
        }

        return response()->json([

            'status' => true,
            'message' => 'SuccessFully inserted Address in database',
            'data' => $addressData,

        ], 401);
    }

    /**
     * AddressController store method pass one parameter AddressUpdate $request for update a *address user related

     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

/**
 * @api {post} http://localhost:8000/api/address/update
 * @apiGroup  Address
 * @apiName  Address Update
 * @apiParam {String} fullname Mandatory
 * @apiParam {String} address1 Mandatory
 * @apiParam {String} address2 Optional
 * @apiParam {String} state Mandatory
 * @apiParam {String} country Mandatory
 * @apiParam {Integer} pincode Mandatory
 * @apiError {String} status response status
{
"status": false,
"message": "Address Not Found",
"data": []
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "SuccessFully Updated Address in database",
"data": {
"fullname": "Arul Acharya",
"address1": "Dange Chauwk  Pune -33",
"address2": "Hinjawadi Pune-17",
"state": "maharashtra",
"country": "India",
"pincode": "979797",
"user_id": 163,
"updated_at": "2019-12-05 06:10:52",
"created_at": "2019-12-05 06:10:52",
"id": 116
}
}
 *
 * @apiError {String} status response status
{
"status": false,
"message": "Address Not Found",
"data": []
}
 * @apiError {object[]} data
 * @apiError {Object[]} error message to display
{
"message": "The given data was invalid.",
"errors": {
"pincode": [
"The pincode must be 6 digits.",
"The pincode must be an integer."
]
}
}
 * @apiErrorExample {json} Error-Response:

{
"status": false,
"message": "Address Not Found",
"data": []
}
 */

    public function update(AddressUpdateRequest $request)
    {

        $requestData = $request->all();
        $address = Address::find($request->id);

        if (!isset($address->id)) {
            return response()->json([

                'status' => false,
                'message' => 'Address is not Updated in A database',
                'data' => [],

            ], 401);
        }
        $address->update($requestData);

        return response()->json([

            'status' => true,
            'message' => 'Update your Address Successfully',
            'data' => $address,

        ], 401);
    }

    /**
     *  AddressController destroy method pass one parameter Request $request for deleting a address user related

     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

/**
 * @api {post} http://localhost:8000/api/address/delete
 * @apiGroup  Address
 * @apiName  Address Delete

 * @apiError {String} status response status (False)
{
"status": false,
"message": "Address Not Found",
"data": []
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "Address is Deleted Successfully",
"data": []
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
"id": [
"The id field is required."
]
}
}



 */

    public function destroy(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'id' => 'required|numeric',
        ]
        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

            ], 401);
        }

        $address = Address::find($request->id);
        if (!isset($address->id)) {
            return response()->json([

                'status' => false,
                'message' => 'Address is not Found',
                'data' => [],

            ], 401);
        }
        $address->delete();

        return response()->json([

            'status' => true,
            'message' => 'Address is Deleted Successfully',
            'data' => [],

        ], 401);
    }
}
