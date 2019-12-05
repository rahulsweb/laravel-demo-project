<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{

    /**
     * ProductController store method pass one parameter ProductRequest $request for storing a Product user related
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *ProductController add Contact us in database
     * also edit ,delete Contact us in related user Contact us if exist
     */

    /**
     * @api {post} http://localhost:8000/api/product/details
     * @apiGroup  Product
     * @apiName  Product Details
     * @apiParam {Integer} id Mandatory
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Product Not Found",
    "data": []
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "success",
    "data": {
    "id": 60,
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-11-01 12:03:15",
    "name": "Yamaha KTM",
    "rate": "500000",
    "qty_left": "14",
    "status": "Active",
    "categories": [
    {
    "id": 56,
    "created_at": "2019-10-30 12:21:09",
    "updated_at": "2019-10-30 12:21:09",
    "name": "Bike",
    "parent_id": 53,
    "deleted_at": null,
    "pivot": {
    "product_id": 60,
    "category_id": 56,
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-10-30 12:23:07"
    }
    }
    ],
    "product_image": [
    {
    "id": 65,
    "name": "Product Image/1572438187_ktm.jpeg",
    "product_id": 60,
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-10-30 12:23:07"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 27,
    "product_id": 60,
    "quantity": 15,
    "color": "RED",
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-11-01 04:44:15"
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
    "id": [
    "The id field is required."
    ]
    }
    }

     */
    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * AddressController add address in database
     * also edit ,delete addresses in related user address if exist
     */

    public function getProductDetails(Request $request)
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

        $products = Product::with('categories', 'product_image', 'order_carts', 'users', 'product_attribute')->find($request->id);

        if (!$products) {
            return response()->json([

                'status' => false,
                'message' => 'Product Not Found',

                'data' => [],
            ], 401);

        }

        return response()->json([

            'status' => true,
            'message' => 'success',

            'data' => $products,
        ], 401);

    }

    /**
     * @api {post} http://localhost:8000/api/product/category
     * @apiGroup  Product
     * @apiName  Category Wise Product
     * @apiParam {Integer} id Mandatory
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Product Not Found",
    "data": []
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "success",
    "data": [
    {
    "id": 2,
    "category_id": 51,
    "product_id": 53,
    "created_at": "2019-10-29 08:46:42",
    "updated_at": "2019-10-29 09:16:17",
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
    }
     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": {
    "category_id": [
    "The category id field is required."
    ]
    }
    }


     */
    /**
     * @param \App\Http\Controllers\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * AddressController add address in database
     * also edit ,delete addresses in related user address if exist
     */

    public function getProducts(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'category_id' => 'required|numeric',
        ]
        );
        if ($validator->fails()) {
            return response()->json([

                'status' => false,
                'message' => $validator->errors(),

            ], 401);
        }

        $products = ProductCategory::with('products')->where('category_id', '=', $request->category_id)->get();

        if (!$products->first()) {
            return response()->json([

                'status' => false,
                'message' => 'Category Not Found',

                'data' => [],
            ], 401);

        }

        return response()->json([

            'status' => true,
            'message' => 'success',

            'data' => $products,
        ], 401);

    }

    /**
     * @api {post} http://localhost:8000/api/product/list
     * @apiGroup  Product
     * @apiName  Product Lists

     * @apiError {String} status response status (False)
    {
    "status": false,
    "message": "Products Not Found"
    }
     * @apiSuccessExample {json} Success-Response:
    {
    "status": true,
    "message": "success",
    "data": [
    {
    "id": 53,
    "created_at": "2019-10-11 12:56:14",
    "updated_at": "2019-11-01 12:06:41",
    "name": "LG WashingMachine X2",
    "rate": "5555",
    "qty_left": "15",
    "status": "Active",
    "categories": [
    {
    "id": 51,
    "created_at": "2019-10-29 09:16:06",
    "updated_at": "2019-10-29 09:16:06",
    "name": "Washing Machine",
    "parent_id": 47,
    "deleted_at": null,
    "pivot": {
    "product_id": 53,
    "category_id": 51,
    "created_at": "2019-10-29 08:46:42",
    "updated_at": "2019-10-29 09:16:17"
    }
    }
    ],
    "product_image": [
    {
    "id": 50,
    "name": "Product Image/1570798574_lg7.jpeg",
    "product_id": 53,
    "created_at": "2019-10-11 12:56:14",
    "updated_at": "2019-10-11 12:56:14"
    }
    ],
    "order_carts": [],
    "users": [
    {
    "id": 49,
    "first_name": "rahul",
    "last_name": "shingate",
    "email": "kajal@gmail.com",
    "status": "1",
    "profile": "User/1574343023_x.jpeg",
    "created_at": "2019-10-07 11:33:25",
    "updated_at": "2019-12-04 10:01:28",
    "google_id": null,
    "github_id": null,
    "pivot": {
    "product_id": 53,
    "user_id": 49
    }
    }
    ],
    "product_attribute": {
    "id": 20,
    "product_id": 53,
    "quantity": 15,
    "color": "blue",
    "created_at": "2019-10-11 12:56:14",
    "updated_at": "2019-11-01 12:06:42"
    }
    },
    {
    "id": 56,
    "created_at": "2019-10-11 12:59:31",
    "updated_at": "2019-11-01 12:06:31",
    "name": "HONOR S3",
    "rate": "15000",
    "qty_left": "15",
    "status": "Active",
    "categories": [
    {
    "id": 48,
    "created_at": "2019-10-25 12:11:40",
    "updated_at": "2019-10-25 12:11:40",
    "name": "Mobile",
    "parent_id": 47,
    "deleted_at": null,
    "pivot": {
    "product_id": 56,
    "category_id": 48,
    "created_at": "2019-10-29 08:46:32",
    "updated_at": "2019-10-29 09:12:11"
    }
    }
    ],
    "product_image": [
    {
    "id": 58,
    "name": "Product Image/1570798771_honor4.jpeg",
    "product_id": 56,
    "created_at": "2019-10-11 12:59:31",
    "updated_at": "2019-10-11 12:59:31"
    },
    {
    "id": 59,
    "name": "Product Image/1570798771_honor2.jpeg",
    "product_id": 56,
    "created_at": "2019-10-11 12:59:31",
    "updated_at": "2019-10-11 12:59:31"
    },
    {
    "id": 60,
    "name": "Product Image/1570798772_honor1.jpeg",
    "product_id": 56,
    "created_at": "2019-10-11 12:59:32",
    "updated_at": "2019-10-11 12:59:32"
    }
    ],
    "order_carts": [],
    "users": [
    {
    "id": 49,
    "first_name": "rahul",
    "last_name": "shingate",
    "email": "kajal@gmail.com",
    "status": "1",
    "profile": "User/1574343023_x.jpeg",
    "created_at": "2019-10-07 11:33:25",
    "updated_at": "2019-12-04 10:01:28",
    "google_id": null,
    "github_id": null,
    "pivot": {
    "product_id": 56,
    "user_id": 49
    }
    }
    ],
    "product_attribute": {
    "id": 23,
    "product_id": 56,
    "quantity": 15,
    "color": "blue",
    "created_at": "2019-10-11 12:59:32",
    "updated_at": "2019-11-01 12:06:31"
    }
    },
    {
    "id": 57,
    "created_at": "2019-10-29 09:15:45",
    "updated_at": "2019-11-01 06:03:25",
    "name": "MI F7",
    "rate": "34444",
    "qty_left": "15",
    "status": "Active",
    "categories": [
    {
    "id": 48,
    "created_at": "2019-10-25 12:11:40",
    "updated_at": "2019-10-25 12:11:40",
    "name": "Mobile",
    "parent_id": 47,
    "deleted_at": null,
    "pivot": {
    "product_id": 57,
    "category_id": 48,
    "created_at": "2019-10-29 09:15:45",
    "updated_at": "2019-10-29 09:15:45"
    }
    }
    ],
    "product_image": [
    {
    "id": 62,
    "name": "Product Image/1572340545_appo1.jpeg",
    "product_id": 57,
    "created_at": "2019-10-29 09:15:45",
    "updated_at": "2019-10-29 09:15:45"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 24,
    "product_id": 57,
    "quantity": 15,
    "color": "yellow",
    "created_at": "2019-10-29 09:15:45",
    "updated_at": "2019-11-01 06:03:25"
    }
    },
    {
    "id": 58,
    "created_at": "2019-10-30 12:10:41",
    "updated_at": "2019-11-01 12:06:19",
    "name": "Laptop",
    "rate": "50000",
    "qty_left": "15",
    "status": "Active",
    "categories": [
    {
    "id": 50,
    "created_at": "2019-10-25 12:12:49",
    "updated_at": "2019-10-25 12:12:49",
    "name": "Computer",
    "parent_id": 47,
    "deleted_at": null,
    "pivot": {
    "product_id": 58,
    "category_id": 50,
    "created_at": "2019-10-30 12:10:41",
    "updated_at": "2019-10-30 12:10:41"
    }
    }
    ],
    "product_image": [
    {
    "id": 63,
    "name": "Product Image/1572437441_hp3.jpeg",
    "product_id": 58,
    "created_at": "2019-10-30 12:10:41",
    "updated_at": "2019-10-30 12:10:41"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 25,
    "product_id": 58,
    "quantity": 15,
    "color": "blue",
    "created_at": "2019-10-30 12:10:41",
    "updated_at": "2019-11-01 12:06:19"
    }
    },
    {
    "id": 59,
    "created_at": "2019-10-30 12:22:27",
    "updated_at": "2019-11-01 12:06:12",
    "name": "bullet",
    "rate": "350000",
    "qty_left": "15",
    "status": "Active",
    "categories": [
    {
    "id": 56,
    "created_at": "2019-10-30 12:21:09",
    "updated_at": "2019-10-30 12:21:09",
    "name": "Bike",
    "parent_id": 53,
    "deleted_at": null,
    "pivot": {
    "product_id": 59,
    "category_id": 56,
    "created_at": "2019-10-30 12:22:28",
    "updated_at": "2019-10-30 12:22:28"
    }
    }
    ],
    "product_image": [
    {
    "id": 64,
    "name": "Product Image/1572438147_bullet.jpeg",
    "product_id": 59,
    "created_at": "2019-10-30 12:22:27",
    "updated_at": "2019-10-30 12:22:27"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 26,
    "product_id": 59,
    "quantity": 15,
    "color": "black",
    "created_at": "2019-10-30 12:22:28",
    "updated_at": "2019-11-01 12:06:13"
    }
    },
    {
    "id": 60,
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-11-01 12:03:15",
    "name": "Yamaha KTM",
    "rate": "500000",
    "qty_left": "14",
    "status": "Active",
    "categories": [
    {
    "id": 56,
    "created_at": "2019-10-30 12:21:09",
    "updated_at": "2019-10-30 12:21:09",
    "name": "Bike",
    "parent_id": 53,
    "deleted_at": null,
    "pivot": {
    "product_id": 60,
    "category_id": 56,
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-10-30 12:23:07"
    }
    }
    ],
    "product_image": [
    {
    "id": 65,
    "name": "Product Image/1572438187_ktm.jpeg",
    "product_id": 60,
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-10-30 12:23:07"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 27,
    "product_id": 60,
    "quantity": 15,
    "color": "RED",
    "created_at": "2019-10-30 12:23:07",
    "updated_at": "2019-11-01 04:44:15"
    }
    },
    {
    "id": 61,
    "created_at": "2019-10-30 12:24:19",
    "updated_at": "2019-11-01 12:06:44",
    "name": "YAMAHA Z1",
    "rate": "70000",
    "qty_left": "13",
    "status": "Active",
    "categories": [
    {
    "id": 56,
    "created_at": "2019-10-30 12:21:09",
    "updated_at": "2019-10-30 12:21:09",
    "name": "Bike",
    "parent_id": 53,
    "deleted_at": null,
    "pivot": {
    "product_id": 61,
    "category_id": 56,
    "created_at": "2019-10-30 12:24:19",
    "updated_at": "2019-10-30 12:24:19"
    }
    }
    ],
    "product_image": [
    {
    "id": 66,
    "name": "Product Image/1572438259_bike1.jpeg",
    "product_id": 61,
    "created_at": "2019-10-30 12:24:19",
    "updated_at": "2019-10-30 12:24:19"
    }
    ],
    "order_carts": [
    {
    "id": 12,
    "order_code": "OD_1572609724",
    "user_id": 117,
    "billing_id": 64,
    "coupon_id": null,
    "deleted_at": null,
    "created_at": "2019-11-01 12:02:04",
    "updated_at": "2019-11-01 12:02:04",
    "shipping_id": 65,
    "pivot": {
    "product_id": 61,
    "order_id": 12,
    "qty": 2,
    "total": "140000",
    "images": "Product Image/1572438259_bike1.jpeg",
    "created_at": "2019-11-01 12:02:04",
    "total_cart": "192100",
    "total_qty": "3",
    "category_name": "Bike"
    }
    }
    ],
    "users": [],
    "product_attribute": {
    "id": 28,
    "product_id": 61,
    "quantity": 15,
    "color": "yellow",
    "created_at": "2019-10-30 12:24:19",
    "updated_at": "2019-11-01 12:06:07"
    }
    },
    {
    "id": 62,
    "created_at": "2019-10-30 12:24:55",
    "updated_at": "2019-11-01 12:06:44",
    "name": "Pulser",
    "rate": "9",
    "qty_left": "13",
    "status": "Active",
    "categories": [
    {
    "id": 56,
    "created_at": "2019-10-30 12:21:09",
    "updated_at": "2019-10-30 12:21:09",
    "name": "Bike",
    "parent_id": 53,
    "deleted_at": null,
    "pivot": {
    "product_id": 62,
    "category_id": 56,
    "created_at": "2019-10-30 12:24:55",
    "updated_at": "2019-10-30 12:24:55"
    }
    }
    ],
    "product_image": [
    {
    "id": 67,
    "name": "Product Image/1572438295_bajaj.jpeg",
    "product_id": 62,
    "created_at": "2019-10-30 12:24:55",
    "updated_at": "2019-10-30 12:24:55"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 29,
    "product_id": 62,
    "quantity": 15,
    "color": "black",
    "created_at": "2019-10-30 12:24:55",
    "updated_at": "2019-11-01 12:06:01"
    }
    },
    {
    "id": 63,
    "created_at": "2019-10-30 12:25:32",
    "updated_at": "2019-11-01 12:06:45",
    "name": "Avast Antivirus",
    "rate": "700",
    "qty_left": "8",
    "status": "Active",
    "categories": [
    {
    "id": 58,
    "created_at": "2019-10-30 12:21:49",
    "updated_at": "2019-10-30 12:21:49",
    "name": "Anti Virus",
    "parent_id": 55,
    "deleted_at": null,
    "pivot": {
    "product_id": 63,
    "category_id": 58,
    "created_at": "2019-10-30 12:25:32",
    "updated_at": "2019-10-30 12:25:32"
    }
    }
    ],
    "product_image": [
    {
    "id": 68,
    "name": "Product Image/1572438332_avast.jpeg",
    "product_id": 63,
    "created_at": "2019-10-30 12:25:32",
    "updated_at": "2019-10-30 12:25:32"
    }
    ],
    "order_carts": [
    {
    "id": 11,
    "order_code": "OD_1572609627",
    "user_id": 117,
    "billing_id": 62,
    "coupon_id": 6,
    "deleted_at": null,
    "created_at": "2019-11-01 12:00:27",
    "updated_at": "2019-11-01 12:00:27",
    "shipping_id": 63,
    "pivot": {
    "product_id": 63,
    "order_id": 11,
    "qty": 7,
    "total": "4900",
    "images": "Product Image/1572438332_avast.jpeg",
    "created_at": "2019-11-01 12:00:27",
    "total_cart": "4165",
    "total_qty": "1",
    "category_name": "Anti Virus"
    }
    },
    {
    "id": 12,
    "order_code": "OD_1572609724",
    "user_id": 117,
    "billing_id": 64,
    "coupon_id": null,
    "deleted_at": null,
    "created_at": "2019-11-01 12:02:04",
    "updated_at": "2019-11-01 12:02:04",
    "shipping_id": 65,
    "pivot": {
    "product_id": 63,
    "order_id": 12,
    "qty": 3,
    "total": "2100",
    "images": "Product Image/1572438332_avast.jpeg",
    "created_at": "2019-11-01 12:02:04",
    "total_cart": "192100",
    "total_qty": "3",
    "category_name": "Anti Virus"
    }
    },
    {
    "id": 45,
    "order_code": "OD_1574080794",
    "user_id": 49,
    "billing_id": 66,
    "coupon_id": 3,
    "deleted_at": null,
    "created_at": "2019-11-18 12:39:54",
    "updated_at": "2019-11-18 12:39:54",
    "shipping_id": 108,
    "pivot": {
    "product_id": 63,
    "order_id": 45,
    "qty": 3,
    "total": "2100",
    "images": "Product Image/1572438332_avast.jpeg",
    "created_at": "2019-11-18 12:39:54",
    "total_cart": "1575",
    "total_qty": "1",
    "category_name": "Anti Virus"
    }
    }
    ],
    "users": [],
    "product_attribute": {
    "id": 30,
    "product_id": 63,
    "quantity": 20,
    "color": "red",
    "created_at": "2019-10-30 12:25:32",
    "updated_at": "2019-11-01 12:05:33"
    }
    },
    {
    "id": 64,
    "created_at": "2019-10-30 12:27:19",
    "updated_at": "2019-11-01 12:05:54",
    "name": "Quick Heal",
    "rate": "500",
    "qty_left": "20",
    "status": "Active",
    "categories": [
    {
    "id": 58,
    "created_at": "2019-10-30 12:21:49",
    "updated_at": "2019-10-30 12:21:49",
    "name": "Anti Virus",
    "parent_id": 55,
    "deleted_at": null,
    "pivot": {
    "product_id": 64,
    "category_id": 58,
    "created_at": "2019-10-30 12:27:19",
    "updated_at": "2019-10-30 12:27:19"
    }
    }
    ],
    "product_image": [
    {
    "id": 69,
    "name": "Product Image/1572438439_quick.jpeg",
    "product_id": 64,
    "created_at": "2019-10-30 12:27:19",
    "updated_at": "2019-10-30 12:27:19"
    }
    ],
    "order_carts": [],
    "users": [],
    "product_attribute": {
    "id": 31,
    "product_id": 64,
    "quantity": 20,
    "color": "oranges",
    "created_at": "2019-10-30 12:27:19",
    "updated_at": "2019-11-18 10:19:01"
    }
    },
    {
    "id": 66,
    "created_at": "2019-10-31 12:45:59",
    "updated_at": "2019-11-01 12:06:45",
    "name": "JCB Pokelane",
    "rate": "780000",
    "qty_left": "18",
    "status": "Active",
    "categories": [
    {
    "id": 57,
    "created_at": "2019-10-30 12:21:24",
    "updated_at": "2019-11-18 09:29:42",
    "name": "JCB",
    "parent_id": 0,
    "deleted_at": null,
    "pivot": {
    "product_id": 66,
    "category_id": 57,
    "created_at": "2019-10-31 12:45:59",
    "updated_at": "2019-10-31 12:45:59"
    }
    }
    ],
    "product_image": [
    {
    "id": 71,
    "name": "Product Image/1572525959_poklane.jpeg",
    "product_id": 66,
    "created_at": "2019-10-31 12:45:59",
    "updated_at": "2019-10-31 12:45:59"
    }
    ],
    "order_carts": [],
    "users": [
    {
    "id": 49,
    "first_name": "rahul",
    "last_name": "shingate",
    "email": "kajal@gmail.com",
    "status": "1",
    "profile": "User/1574343023_x.jpeg",
    "created_at": "2019-10-07 11:33:25",
    "updated_at": "2019-12-04 10:01:28",
    "google_id": null,
    "github_id": null,
    "pivot": {
    "product_id": 66,
    "user_id": 49
    }
    }
    ],
    "product_attribute": {
    "id": 33,
    "product_id": 66,
    "quantity": 20,
    "color": "YELLOW",
    "created_at": "2019-10-31 12:45:59",
    "updated_at": "2019-11-01 12:05:41"
    }
    },
    {
    "id": 67,
    "created_at": "2019-11-01 03:19:57",
    "updated_at": "2019-11-01 12:03:15",
    "name": "Apple XXL",
    "rate": "25000",
    "qty_left": "25",
    "status": "Active",
    "categories": [
    {
    "id": 48,
    "created_at": "2019-10-25 12:11:40",
    "updated_at": "2019-10-25 12:11:40",
    "name": "Mobile",
    "parent_id": 47,
    "deleted_at": null,
    "pivot": {
    "product_id": 67,
    "category_id": 48,
    "created_at": "2019-11-01 03:19:57",
    "updated_at": "2019-11-01 03:19:57"
    }
    }
    ],
    "product_image": [
    {
    "id": 72,
    "name": "Product Image/1572578397_APPLE.jpeg",
    "product_id": 67,
    "created_at": "2019-11-01 03:19:57",
    "updated_at": "2019-11-01 03:19:57"
    },
    {
    "id": 73,
    "name": "Product Image/1572578397_Apple2.jpeg",
    "product_id": 67,
    "created_at": "2019-11-01 03:19:57",
    "updated_at": "2019-11-01 03:19:57"
    },
    {
    "id": 74,
    "name": "Product Image/1572578397_apple2.jpeg",
    "product_id": 67,
    "created_at": "2019-11-01 03:19:57",
    "updated_at": "2019-11-01 03:19:57"
    }
    ],
    "order_carts": [
    {
    "id": 10,
    "order_code": "OD_1572609008",
    "user_id": 117,
    "billing_id": 60,
    "coupon_id": 7,
    "deleted_at": null,
    "created_at": "2019-11-01 11:50:08",
    "updated_at": "2019-11-01 11:50:08",
    "shipping_id": 61,
    "pivot": {
    "product_id": 67,
    "order_id": 10,
    "qty": 3,
    "total": "75000",
    "images": "Product Image/1572578397_APPLE.jpeg",
    "created_at": "2019-11-01 11:50:08",
    "total_cart": "37500",
    "total_qty": "1",
    "category_name": "Mobile"
    }
    },
    {
    "id": 12,
    "order_code": "OD_1572609724",
    "user_id": 117,
    "billing_id": 64,
    "coupon_id": null,
    "deleted_at": null,
    "created_at": "2019-11-01 12:02:04",
    "updated_at": "2019-11-01 12:02:04",
    "shipping_id": 65,
    "pivot": {
    "product_id": 67,
    "order_id": 12,
    "qty": 2,
    "total": "50000",
    "images": "Product Image/1572578397_APPLE.jpeg",
    "created_at": "2019-11-01 12:02:04",
    "total_cart": "192100",
    "total_qty": "3",
    "category_name": "Mobile"
    }
    }
    ],
    "users": [
    {
    "id": 49,
    "first_name": "rahul",
    "last_name": "shingate",
    "email": "kajal@gmail.com",
    "status": "1",
    "profile": "User/1574343023_x.jpeg",
    "created_at": "2019-10-07 11:33:25",
    "updated_at": "2019-12-04 10:01:28",
    "google_id": null,
    "github_id": null,
    "pivot": {
    "product_id": 67,
    "user_id": 49
    }
    }
    ],
    "product_attribute": {
    "id": 34,
    "product_id": 67,
    "quantity": 30,
    "color": "black",
    "created_at": "2019-11-01 03:19:57",
    "updated_at": "2019-11-01 04:11:08"
    }
    },
    {
    "id": 68,
    "created_at": "2019-11-05 10:23:05",
    "updated_at": "2019-11-05 10:23:05",
    "name": "appo x9",
    "rate": "6700",
    "qty_left": "1",
    "status": "Active",
    "categories": [
    {
    "id": 48,
    "created_at": "2019-10-25 12:11:40",
    "updated_at": "2019-10-25 12:11:40",
    "name": "Mobile",
    "parent_id": 47,
    "deleted_at": null,
    "pivot": {
    "product_id": 68,
    "category_id": 48,
    "created_at": "2019-11-05 10:23:05",
    "updated_at": "2019-11-05 10:23:05"
    }
    }
    ],
    "product_image": [
    {
    "id": 75,
    "name": "Product Image/1572949385_appo.jpeg",
    "product_id": 68,
    "created_at": "2019-11-05 10:23:05",
    "updated_at": "2019-11-05 10:23:05"
    },
    {
    "id": 76,
    "name": "Product Image/1572949385_appo2.jpeg",
    "product_id": 68,
    "created_at": "2019-11-05 10:23:05",
    "updated_at": "2019-11-05 10:23:05"
    }
    ],
    "order_carts": [
    {
    "id": 43,
    "order_code": "OD_1573099276",
    "user_id": 49,
    "billing_id": 10,
    "coupon_id": 7,
    "deleted_at": null,
    "created_at": "2019-11-07 04:01:16",
    "updated_at": "2019-11-07 04:01:16",
    "shipping_id": 106,
    "pivot": {
    "product_id": 68,
    "order_id": 43,
    "qty": 1,
    "total": "6700",
    "images": "Product Image/1572949385_appo.jpeg",
    "created_at": "2019-11-07 04:01:16",
    "total_cart": "3350",
    "total_qty": "1",
    "category_name": "Mobile"
    }
    }
    ],
    "users": [
    {
    "id": 49,
    "first_name": "rahul",
    "last_name": "shingate",
    "email": "kajal@gmail.com",
    "status": "1",
    "profile": "User/1574343023_x.jpeg",
    "created_at": "2019-10-07 11:33:25",
    "updated_at": "2019-12-04 10:01:28",
    "google_id": null,
    "github_id": null,
    "pivot": {
    "product_id": 68,
    "user_id": 49
    }
    }
    ],
    "product_attribute": {
    "id": 35,
    "product_id": 68,
    "quantity": 1,
    "color": "RED",
    "created_at": "2019-11-05 10:23:05",
    "updated_at": "2019-11-05 10:23:05"
    }
    }
    ]
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

/**
 * ProductController store method pass one parameter ProductRequest $request for storing a Product user related
 * @param \App\Http\Controllers\Request $request
 *
 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
 *ProductController add Contact us in database
 * also edit ,delete Contact us in related user Contact us if exist
 */

    public function getProductList(Request $request)
    {
        $products = Product::GetAll();

        if (!$products) {
            return response()->json([

                'status' => false,
                'message' => 'Product Not Found',

                'data' => $products,
            ], 401);

        }

        return response()->json([

            'status' => true,
            'message' => 'success',

            'data' => $products,
        ], 401);

    }

}
