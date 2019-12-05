<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductAttribute;
use App\ProductCategory;
use App\ProductImage;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Product Controller CustomerIndex
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */
    public function index()
    {

        $product = Product::latest()->get();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductRequest $request)
    {

        $product = new Product;

        $product->name = $request->name;
        DB::beginTransaction();
        $product = $product->create([
            'name' => $request->name,
            'rate' => $request->rate,
            'status' => $request->status,
            'qty_left' => $request->quantity,
        ]);

        if ($product) {

            if ($request->hasFile('image')) {

                $filename = "";
                $files = $request->file('image');
                $location = 'Product Image/';
                foreach ($files as $file) {
                    $filename = time() . "_" . $file->getClientOriginalName();

                    $file->move($location, $filename);

                    $productImage = new ProductImage;

                    $productImage->create(
                        [
                            'name' => $location . $filename,
                            'product_id' => $product->id,

                        ]
                    );
                }

            }

// product attribte insert data

            ProductAttribute::create([
                'color' => $request->color,
                'quantity' => $request->quantity,
                'product_id' => $product->id,

            ]);

            ProductCategory::create([
                'product_id' => $product->id,
                'category_id' => $request->subcategory,
            ]);

// product category table data  insert data
            DB::commit();
        } else {
            DB::rollback();
        }

        return redirect('admin/product')->with('flash_message', 'Product added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, Product $product)
    {

        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $products = array('name' => $request->name, "rate" => $request->rate, 'status' => $request->status, 'qty_left' => isset($request->quantity) ? $request->quantity : $product->qty_left);

        $product->update($products);

        $productAttribute = ProductAttribute::where('product_id', $product->id);

        $productAttribute->update([
            'color' => $request->color, "quantity" => $request->quantity, 'product_id' => $product->id,
        ]);
        $productsCategories = array('category_id' => $request->subcategory, 'product_id' => $product->id);
        $categoryProduct = ProductCategory::where('product_id', $product->id)->first();

        if (isset($categoryProduct)) {

            $categoryProduct->update($productsCategories);

        } else {
            $categoryProduct = new ProductCategory;
            $categoryProduct->create($productsCategories);
        }

        if ($request->hasFile('image')) {

            $filename = "";
            $files = $request->file('image');
            $location = 'Product Image/';

            foreach ($files as $file) {
                $filename = time() . "_" . $file->getClientOriginalName();

                $productImage = new ProductImage;

                $productImage->create(
                    ['name' => $location . $filename,
                        'product_id' => $product->id,
                    ]
                );
                $file->move($location, $filename);

            }

        }

        return redirect('admin/product')->with('flash_message', 'Product updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }

/**
 * Product Controller CustomerIndex
 *
 * @param \Illuminate\Http\Request $request
 *
 * @return the json object of the states
 */
    public function imageDelete($id)
    {

        $imageName = ProductImage::where('id', $id)->get();

        foreach ($imageName as $img) {
            unlink(public_path($img->name));
        }
        ProductImage::where('id', $id)->delete();
        return back()->with('flash_message', 'Image deleted!');
    }

}
