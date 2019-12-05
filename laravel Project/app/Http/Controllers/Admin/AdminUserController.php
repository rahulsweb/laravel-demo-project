<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Order;
use App\OrderCartDetail;
use App\User;
use Charts;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{

    /**
     * AdminUser Controller contruct() to initilisation
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display  the data on dashboard page.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return the json object of the states
     */

    public function dashboard(Request $request)
    {
        $contactUs = ContactUs::all();
        $users = User::whereHas('roles', function ($query) {

            $query->where('name', '=', 'customer');

        })->get();
        $orders = Order::all();
        $chart = Charts::database($orders, 'bar', 'highcharts')
            ->title("Monthly Order Placed")
            ->elementLabel("Total Orders")
            ->dimensions(500, 350)
            ->responsive(true)
            ->colors(['#ff6347', '#ff0000', '#3cb371', '#0000ff', '#fa4807', '#faf607', '#0778fa', '#68fa07', '#3407fa', '#07e6fa', '#13fa07', '#ee07fa', '#fa075c', '#fa0707'])
            ->groupByMonth(date('Y'), true);

        $category = OrderCartDetail::groupBy('category_name')->select('category_name', DB::raw('sum(total_qty) as total'))->get();
        if (isset($category)) {
            foreach ($category as $key => $value) {
                $name[] = $value->category_name;
                $total[] = $value->total;

            }
        }
        //use chart console/tv package
        $chart2 = Charts::create('pie', 'highcharts')
            ->title('Category wise Order Placed ')
            ->labels(isset($name) ? $name : ['empty order place'])
            ->values(isset($total) ? $total : [0])
            ->dimensions(1000, 500)
            ->responsive(true)
            ->colors(['#ff6347', '#ff0000', '#3cb371', '#0000ff', '#fa4807', '#faf607', '#0778fa', '#68fa07', '#3407fa', '#07e6fa', '#13fa07', '#ee07fa', '#fa075c', '#fa0707']);

        return view('admin.dashboard', compact('chart', 'chart2', 'orders', 'users', 'contactUs'));
    }

/**
 * listing data on index page
 *
 * @param \Illuminate\Http\Request $request
 *
 * @return the json object of the states
 */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $adminUser = User::latest()->paginate($perPage);
        if (!empty($keyword)) {
            $adminUser = User::all()
                ->latest()->paginate($perPage);
        }
        return view('admin.user.index', compact('adminUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created Admin User  in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminUserRequest $request)
    {

        $user = new User;

        $user = $user->create($request->toArray());
        $user->assignRole($request->roles);

        return redirect('admin/user')->with('flash_message', 'adminUser added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $adminUser = User::findOrFail($id);

        return view('admin.user.show', compact('adminUser'));
    }

    /**
     * Show the form for editing the specified User
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $adminUser = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.user.edit', compact('adminUser', 'roles'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(adminUserUpdateRequest $request, $id)
    {

        $adminUser = User::findOrFail($id);
        if (isset($adminUser->getRoleNames()[0])) {
            $adminUser->removeRole($adminUser->getRoleNames()[0]);
        }

        $adminUser->assignRole($request->roles);

        if (!empty($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        } else {
            $request = array_except($request, array('password'));
        }

        $adminUser->update($request->all());

        return redirect('admin/user')->with('flash_message', 'adminUser updated!');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/user')->with('flash_message', 'adminUser deleted!');
    }

/**
 * Fetch the categories of subcategory.
 *
 * @param \Illuminate\Http\Request $request
 *
 * @return the json object of the category
 */
    public function getSubcategory($id)
    {
        $category = Category::where('parent_id', '=', $id)->get();
        return $category;

    }

}
