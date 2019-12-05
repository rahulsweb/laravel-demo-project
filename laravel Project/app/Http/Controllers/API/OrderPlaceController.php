<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\OrderPlace;
use DB;
use Illuminate\Http\Request;
use Validator;

class OrderPlaceController extends Controller
{

    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *OrderPlaceController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

    /**
     * @param \App\Http\Controllers\Request $request
     * OrderController store method pass one parameter OrderRequest $request for storing a Order user related

     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *OrderController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

/**
 * @api {post} http://localhost:8000/api/order/place
 * @apiGroup  Order
 * @apiName  Order  Place
 * @apiParam {Integer} amount Mandatory
 * @apiError {String} status response status
{
"status": false,
"error": {
"amount": [
"The amount field is required."
]
}
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "Order Place Successfully",
"data": {
"amount": "500",
"user_id": 163,
"order_code": "OD_1575528749",
"updated_at": "2019-12-05 06:52:29",
"created_at": "2019-12-05 06:52:29",
"id": 8
}
}
 *
 * @apiErrorExample {json} Error-Response:
{
"status": false,
"error": {
"amount": [
"The amount field is required."
]
}
}


 */

    public function orderPlace(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'amount' => 'required|numeric',
        ]
        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'error' => $validator->errors(),

            ], 401);
        }

        $data = [
            'amount' => $request->amount,
            'user_id' => auth()->user()->id,
            'order_code' => 'OD_' . now()->timestamp,
        ];
        $order = OrderPlace::create($data);
        if (!$order) {
            return response()->json([

                'status' => false,
                'message' => 'Order Is Not Place',
                'data' => [],
            ], 401);
        }

        return response()->json([

            'status' => true,
            'message' => 'Order Place Successfully',
            'data' => $order,
        ], 401);
    }

/**
 * @api {post} http://localhost:8000/api/order/status
 * @apiGroup  Order
 * @apiName  Order  Status
 * @apiParam {String} order_code Mandatory
 * @apiParam {String} payment_status Mandatory
 * @apiParam {String} payment_mode Mandatory
 * @apiError {String} status response status
{
"status": false,
"message": "Your Order Code Is Not Exist"
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "Order Status Successfully Changed",
"data": {
"id": 8,
"amount": 500,
"order_code": "OD_1575528749",
"payment_status": "Delivered",
"payment_mode": "Online",
"user_id": 163,
"created_at": "2019-12-05 12:26:30",
"updated_at": "2019-12-05 06:56:30"
}
}
 *
 * @apiErrorExample {json} Error-Response:
{
"status": false,
"error": {
"order_code": [
"The order code field is required."
],
"payment_status": [
"The payment status field is required."
],
"payment_mode": [
"The payment mode field is required."
]
}
}


 */

    public function orderStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'order_code' => 'required',
            'payment_status' => 'required',
            'payment_mode' => 'required',
        ]
        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'error' => $validator->errors(),

            ], 401);
        }
        DB::beginTransaction();
        $order = OrderPlace::where('order_code', '=', $request->order_code)->first();
        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Your Order Code Is Not Exist',

            ], 401);
        }
        $data = [
            'order_code' => $request->order_code,
            'payment_mode' => $request->payment_mode,
            'payment_status' => $request->payment_status,
        ];

        try {
            $orderData = $order->update($data);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return response()->json([
                'status' => false,
                'message' => 'Your Enter Payment Mode Or Payment Status Wrong ',
                'data' => [],
            ], 401);
        }

        if (!isset($orderData)) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Order Status Not Change',
                'data' => [],
            ], 401);

        }

        DB::commit();
        return response()->json([

            'status' => true,
            'message' => 'Order Status Successfully Changed',
            'data' => $order,
        ], 401);

    }

}
