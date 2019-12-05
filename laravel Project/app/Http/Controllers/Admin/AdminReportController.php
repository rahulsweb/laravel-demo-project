<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderCartDetail;
use App\User;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    /**
     * AdminReport Controller CustomerIndex
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

    public function customersIndex(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 10;
        $users = User::OrderById()->paginate($perPage);
        if (!empty($keyword)) {

            $users = User::SearchName($keyword)->paginate($perPage);
        }
        return view('admin.reports.customer', compact('users'));
    }

    /**
     * AdminReport Controller SalesIndex
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

    public function salesIndex(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 5;
        $orders = OrderCartDetail::latest()->orderBy('id', 'DESC')->paginate(10);
        if (!empty($keyword)) {

            $orders = OrderCartDetail::SearchByName($keyword)->paginate(10);

        }

        return view('admin.reports.sales', compact('orders'));
    }

    /**
     * AdminReport Controller CouponsIndex
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

    public function couponsIndex(Request $request)
    {

        $keyword = $request->get('search');
        $orders = Order::OrderById()->paginate(10);

        if (!empty($keyword)) {
            $orders = Order::SearchByCoupons($keyword)->paginate(10);

        }
        return view('admin.reports.coupon', compact('orders'));
    }

}
