<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderCartDetail;
use App\User;
use DB;
use Excel;
use Illuminate\Http\Request;
use Input;

class MaatwebsiteDemoController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function importExport()
    {
        return view('importExport');
    }
 
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel($type)
    {

        $data = User::get()->toArray();
        return Excel::create('itsolutionstuff_example', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if (Input::hasFile('import_file')) {
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $insert[] = ['title' => $value->title, 'description' => $value->description];
                }
                if (!empty($insert)) {
                    DB::table('users')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer(Request $request, $type, $search = null, $page = null)
    {

         $dataList = User::List();

        if ($search) {

            $dataList = User::CustomerSearch($search);
        } 

        return Excel::create('Customer', function ($excel) use ($dataList) {
            $excel->sheet('mySheet', function ($sheet) use ($dataList) {
                $sheet->fromArray($dataList);
            });
        })->download($type);

    }

    public function sales(Request $request, $type, $search = null, $page = null)
    {

            $dataList = OrderCartDetail::List();
       
        if ($search || $page) {

            $dataList = OrderCartDetail::SearchByProduct($search);

        } 

        

        return Excel::create('Customer', function ($excel) use ($dataList) {
            $excel->sheet('mySheet', function ($sheet) use ($dataList) {

                $sheet->fromArray($dataList);
            });
        })->download($type);

    }

    

    public function coupon(Request $request, $type,$search=NULL)
    {

        $dataList = Order::List();  
        if ( $search) {

            $dataList = Order::SearchByCoupon($search);
        }

        return Excel::create('Customer', function ($excel) use ($dataList) {
            $excel->sheet('mySheet', function ($sheet) use ($dataList) {

                $sheet->fromArray($dataList);
            });
        })->download($type);

    }

    public function customers(Request $request, $type, $page = null)
    {

        $start = 0;

        if ($page > 1) {

            $start = ($page * 5) - 5;

        }

        if ($page) {

            $dataList = User::whereHas('roles', function ($query) {
                $query->where('name', 'customer');

            })->select('first_name', 'last_name', 'email', 'created_at')->orderBy('id', 'DESC')
                ->get();

        }

        return Excel::create('Customer', function ($excel) use ($dataList) {
            $excel->sheet('mySheet', function ($sheet) use ($dataList) {

                $sheet->fromArray($dataList);
            });
        })->download($type);

    }

    public function coupons($type, $search = null, $page = null)
    {
                    $dataList = Order::List();

        if ($search) {
            $dataList = Order::SeachByCoupon($search);
        } 

        return Excel::create('Coupons', function ($excel) use ($dataList) {
            $excel->sheet('Coupons', function ($sheet) use ($dataList) {

                $sheet->fromArray($dataList);
            });
        })->download($type);

    }

    public function orders($type, $search = null)
    {

            $dataList = Order::latest()->get();

        if ($search) {

            $dataList = Order::OrderSearch($search);  
        } 
        

        return Excel::create('Coupons', function ($excel) use ($dataList) {
            $excel->sheet('Coupons', function ($sheet) use ($dataList) {

                $sheet->fromArray($dataList);
            });
        })->download($type);

    }

}
