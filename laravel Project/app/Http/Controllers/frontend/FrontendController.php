<?php

namespace App\Http\Controllers\frontend;

use App\Banner;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


/*
    |--------------------------------------------------------------------------
    | FrontendController
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling checkout requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users manage checkout system in applicaton
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
 

    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $products = Product::Active();
        if (!empty($keyword)) {
            $products = Product::Search($keyword);

        }

        $categories = Category::all();
        $carts = isset(session('cart')->items) ? session('cart')->items : null;
        $subCategory = ProductCategory::ProductCategory();

        $subCategoryProduct = Product::QtyLeft();

        $banners = Banner::all();

        return view('frontend_theme.index', compact('products', 'categories', 'banners', 'carts', 'subCategory', 'subCategoryProduct'));
    }
    public function subCategory($id)
    {

        $subCategoryProduct = Product::QtyLeft();
        $subCategory = ProductCategory::ProductCategory();

        $banners = Banner::all();
        $categories = Category::all();
        $products = Product::CategoryActive($id);

        return view('frontend_theme.frontend_index.subcategory', compact('products', 'categories', 'banners', 'subCategory', 'subCategoryProduct'));
    }

    public function getProducts(Request $request)
    {
        $id = $request->id;

        $subCategory = Product::StatusActive($id);

        return $subCategory;
    }

}
