<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{

    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *OrderController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

/**
 * @api {post} http://localhost:8000/api/order/track
 * @apiGroup  Order
 * @apiName  Order Track
 * @apiError {String} status response status
{
"status": false,
"message": "Order Not Found",
"data": []
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "Success",
"data": [
{
"id": 46,
"order_code": "OD_1575528115",
"user_id": 163,
"billing_id": 117,
"coupon_id": 7,
"deleted_at": null,
"created_at": "2019-12-05 06:41:55",
"updated_at": "2019-12-05 06:41:55",
"shipping_id": 117,
"users": {
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
},
"order_payment": [
{
"id": 46,
"order_id": 46,
"payment_id": null,
"payment_type": "COD",
"status": "Pending",
"deleted_at": null,
"created_at": "2019-12-05 06:41:55",
"updated_at": "2019-12-05 06:41:55"
}
],
"order_carts": [
{
"id": 68,
"created_at": "2019-11-05 10:23:05",
"updated_at": "2019-11-05 10:23:05",
"name": "appo x9",
"rate": "6700",
"qty_left": "1",
"status": "Active",
"pivot": {
"order_id": 46,
"product_id": 68,
"qty": 1,
"total": "6700",
"images": "Product Image/1572949385_appo.jpeg",
"created_at": "2019-12-05 06:41:55",
"total_cart": "3350",
"total_qty": "1",
"category_name": "Mobile"
}
}
]
}
]
}
 *
 * @apiError {String} status response status (False)
 * @apiError {object[]} data
{
"status": false,
"message": "Your Order Code Or Email Is invalid",
"data": []
}
 * @apiError {Object[]} error message to display

 *
 * @apiErrorExample {json} Error-Response:
{
"status": false,
"message": {
"email": [
"Email Required"
],
"order_code": [
"Order Code Required"
]
},
"data": []
}

 */

    public function orderTrack(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'order_code' => 'required',
        ],
            [
                'email.required' => 'Email Required',
                'order_code.required' => 'Order Code Required',

            ]

        );

        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

                'data' => [],
            ], 401);
        }
        $orders = Order::where('order_code', $request->order_code)->with('users', 'orderPayment', 'order_carts')->get();

        if (isset($orders->first()->users->email)) {
            $email = $orders->first()->users->email;

        } else {

            return response()->json([

                'status' => false,
                'message' => 'Your Order Code Or Email Is invalid',

                'data' => [],
            ], 401);

        }

        if ($email == $request->email && isset($orders)) {

            return response()->json([

                'status' => true,
                'message' => 'Success',

                'data' => $orders,
            ], 401);
        }

    }

    /**
     * @param \App\Http\Controllers\Request $request
     * OrderController store method pass one parameter OrderRequest $request for storing a Order user related

     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *OrderController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

/**
 * @api {post} http://localhost:8000/api/order/details
 * @apiGroup  Order
 * @apiName  Order  Details
 * @apiError {String} status response status
{
"status": false,
"message": "Order Not Found",
"data": []
}
 * @apiSuccessExample {json} Success-Response:
{
"status": true,
"message": "Success",
"data": [
{
"id": 46,
"order_code": "OD_1575528115",
"user_id": 163,
"billing_id": 117,
"coupon_id": 7,
"deleted_at": null,
"created_at": "2019-12-05 06:41:55",
"updated_at": "2019-12-05 06:41:55",
"shipping_id": 117,
"users": {
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
},
"order_payment": [
{
"id": 46,
"order_id": 46,
"payment_id": null,
"payment_type": "COD",
"status": "Pending",
"deleted_at": null,
"created_at": "2019-12-05 06:41:55",
"updated_at": "2019-12-05 06:41:55"
}
],
"order_carts": [
{
"id": 68,
"created_at": "2019-11-05 10:23:05",
"updated_at": "2019-11-05 10:23:05",
"name": "appo x9",
"rate": "6700",
"qty_left": "1",
"status": "Active",
"pivot": {
"order_id": 46,
"product_id": 68,
"qty": 1,
"total": "6700",
"images": "Product Image/1572949385_appo.jpeg",
"created_at": "2019-12-05 06:41:55",
"total_cart": "3350",
"total_qty": "1",
"category_name": "Mobile"
}
}
]
}
]
}
 *
 * @apiError {String} status response status (False)
{
"status": false,
"message": "Order Not Found",
"data": []
}
 * @apiError {Object[]} error message to display
{
"status": false,
"message": "Order Not Found",
"data": []
}
 *
 * @apiErrorExample {json} Error-Response:

{
"status": false,
"message": "Order Not Found",
"data": []
}
 */

    public function getOrderDetails(Request $request)
    {

        $orders = Order::with('users', 'orderPayment', 'order_carts')->where('user_id', Auth::user()->id)->get();

        if (!$orders->first()) {
            return response()->json([

                'status' => false,
                'message' => 'Order Not Found',

                'data' => [],
            ], 401);
        }

        return response()->json([

            'status' => true,
            'message' => 'Success',

            'data' => $orders,
        ], 401);
    }

}
