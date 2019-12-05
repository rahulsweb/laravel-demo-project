<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\WishList;
use Auth;
use Symfony\Component\HttpFoundation\Request;
use Validator;

class WishListController extends Controller
{

    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *WishlistController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist



     */

    /**
     * @api {post} http://localhost:8000/api/wishlist/details
     * @apiGroup  Wishlist
     * @apiName  Wishlist Details
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Product Not Found",
    "data": {
    "wishlist": []
    }
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "Success",
    "data": {
    "wishlist": [
    [
    {
    "id": 15,
    "user_id": 163,
    "product_id": 53,
    "created_at": "2019-12-05 06:31:26",
    "updated_at": "2019-12-05 06:31:26",
    "products": {
    "id": 53,
    "created_at": "2019-10-11 12:56:14",
    "updated_at": "2019-11-01 12:06:41",
    "name": "LG WashingMachine X2",
    "rate": "5555",
    "qty_left": "15",
    "status": "Active",
    "product_image": [
    {
    "id": 50,
    "name": "Product Image/1570798574_lg7.jpeg",
    "product_id": 53,
    "created_at": "2019-10-11 12:56:14",
    "updated_at": "2019-10-11 12:56:14"
    }
    ]
    }
    }
    ]
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
    {
    "status": false,
    "message": "Product Not Found",
    "data": {
    "wishlist": []
    }
    }

     */

    public function index()
    {
        $products = WishList::with('products')
            ->where('user_id', Auth::user()->id)
            ->get();
        if (!$products->first()) {
            return response()->json([
                'status' => false,
                'message' => 'Product Not Found',

                'data' => [

                    'wishlist' => [],

                ],

            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Success',

            'data' => [

                'wishlist' => [$products],

            ],

        ]);

    }

    /**
     * @api {post} http://localhost:8000/api/wishlist/store
     * @apiGroup  Wishlist
     * @apiName  Wishlist Add
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Product Not Found",
    "data": {
    "wishlist": []
    }
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "WishList Add SuccessFully",
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
    "wish": [
    "The wish field is required."
    ]
    }
    }

     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'wish' => 'required|numeric',
        ]
        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

            ], 401);
        }

        $product = Product::find($request->wish);

        if (!$product) {
            return response()->json([

                'status' => false,
                'message' => 'Product Not Found',

                'data' => [],
            ], 401);
        }

        $wishlist = new WishList;
        if (auth()->user()->id) {
            $wishlistData = $wishlist->where('product_id', '=', $request->wish)->where('user_id', '=', auth()->user()->id)->pluck('id');

            if (!$wishlistData->first()) {

                $data = [
                    'user_id' => auth()->user()->id,
                    'product_id' => $request->wish,

                ];

                $wishlist = $wishlist->create($data);
                return response()->json([

                    'status' => true,
                    'message' => 'WishList Add SuccessFully',

                    'data' => [],

                ], 401);

            } else {
                return response()->json([

                    'status' => false,
                    'message' => 'Product Already Added',

                    'data' => [],
                ], 401);
            }

        }
        return response()->json([

            'status' => false,
            'message' => 'Please Login Your Account',

            'data' => [],
        ], 401);
    }

    /**
     * @api {post} http://localhost:8000/api/wishlist/delete
     * @apiGroup  Wishlist
     * @apiName  Wishlist Delete
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Wishlist Not Found",
    "data": []
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "WishList Add SuccessFully",
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
    "wish": [
    "The wish field is required."
    ]
    }
    }

     */

    public function deleteWishlist(Request $request)
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

        $wishlist = WishList::where('id', $request->id)->where('user_id', Auth::user()->id);

        if (!$wishlist->first()) {
            return response()->json([
                'status' => false,
                'message' => 'Wishlist Not Found',

                'data' => [

                ],

            ]);
        }
        $wishlist->delete();
        return response()->json([
            'status' => true,
            'message' => 'Delete Successfully',

            'data' => [

            ],

        ]);

    }

}
