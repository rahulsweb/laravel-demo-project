<?php

namespace App\Http\Controllers\banner;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\BannerUpdateRequest;
use DB;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(['role:admin']);
    }

    /*
    |--------------------------------------------------------------------------
    | Banner Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    /**
     * Where to redirect users banner display on frontend.
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
        $perPage = 25;

        if (!empty($keyword)) {
            $banner = Banner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $banner = Banner::latest()->paginate($perPage);
        }

        return view('admin.banner.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banner.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BannerRequest $request)
    {

        $banner = new Banner;

        $banner->name = $request->name;
        $banner->description = $request->description;

        // Set user name

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('/images');

            $image->move($destinationPath, $name);
            $banner->image = $name;
            $banner->save();

        }

        return redirect('admin/banner')->with('flash_message', 'Banner added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Banner $banner)
    {

        return view('admin.banner.banner.show', compact('banner'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Banner $banner)
    {

        return view('admin.banner.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $location = 'Product Image/';
        $requestData = $request->all();
        $destinationPath = public_path('/images/');

        $image = $request->b_image;
        $file = $request->file('image');

        if ($request->has('image')) {

            unlink(public_path('/images/') . $image);
            $image = time() . "_" . $request->image->getClientOriginalName();
            $image_location = public_path("/images/");

            $file->move($destinationPath, $image);

        }

        $data = array('name' => $request->name, "image" => $image, 'description' => $request->description);

        DB::table('banners')->where('id', $banner->id)->update($data);

        return redirect('admin/banner')->with('flash_message', 'Banner updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect('admin/banner')->with('flash_message', 'Banner deleted!');
    }

}
