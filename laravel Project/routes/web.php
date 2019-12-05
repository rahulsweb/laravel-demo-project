<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//php artisan make:auth then create  Auth::routes(); for authentication
Auth::routes();



  


   
   
   



//all routes in group related to the admin and also after login

   Route::group(['middleware' => ['role:order manager|admin|inventory manager|super admin']], function () {
    //admin dashboard
    Route::get('admin/dashboard', 'Admin\\AdminUserController@dashboard')->name('home');
    
    //admin logout
    Route::post('admin/logout', 'LoginController@adminLogout')->name('admin.logout');
   
   //get subcategory using category id  
    Route::get('admin/subcategory/{id}', 'Admin\\AdminUserController@getSubcategory');
   
   

   //user management
   Route::resource('admin/user', 'Admin\\AdminUserController');
   
   //banner management
   Route::resource('admin/banner', 'banner\\BannerController');
   //configuration  management
   Route::resource('admin/configuration', 'configuration\\ConfigurationController');
   //category  management
   Route::resource('admin/category', 'admin\\CategoryController');
   //product  management
   Route::resource('admin/product', 'admin\\ProductController');
   //coupon management
   Route::resource('admin/coupon', 'admin\\CouponController');
   //role management
   Route::resource('admin/role', 'admin\\RoleController');
   //order management
   Route::resource('admin/order', 'admin\\OrderController');
   //search specific order using keyword 
   Route::get('admin/order/search/{key}', 'admin\\OrderController@search');


   
   //image delete on click
   Route::get('image/delete/{id}', 'admin\\ProductController@imageDelete')->name('image.delete');
   
   //admin contact us
   Route::resource('admin/contact-us', 'admin\\ContactUsController');
   
   //email template
   Route::resource('admin/email-template', 'admin\\EmailController');
   
   //Content Management System template
   Route::resource('admin/cms', 'admin\\CmsController');
   
   //mailchimp display form 
   Route::get('manageMailChimp', 'MailChimpController@manageMailChimp');
      //mailchimp subscribe
   Route::post('subscribe',['as'=>'subscribe','uses'=>'MailChimpController@store']);
   
          //mailchimp Compaign
   Route::post('sendCompaign',['as'=>'sendCompaign','uses'=>'MailChimpController@sendCompaign']);
   


   
//customer wise report
   Route::get('admin/customers', 'admin\\AdminReportController@customersIndex')->name('customers.report');
 //sales wise report
   Route::get('admin/sales', 'admin\\AdminReportController@salesIndex')->name('sales.report');
 //coupons wise report
   Route::get('admin/coupons', 'admin\\AdminReportController@couponsIndex')->name('coupons.report');
   //download file csv or excel 
   Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
   //search customer excel report
   Route::get('customer/{type}/{search?}/{page?}', 'MaatwebsiteDemoController@customer');
      //search customer search report
   Route::get('customers/{type}/{page?}', 'MaatwebsiteDemoController@customers');
        //search sales search report
   Route::get('sales/{type}/{search?}/{page?}', 'MaatwebsiteDemoController@sales');
       //search sale search report
   Route::get('sale/{type}/{page?}', 'MaatwebsiteDemoController@sale');
   //search coupons name wise report
  
   Route::get('coupons/{type}/{search?}/{page?}', 'MaatwebsiteDemoController@coupons');
    //coupons reports
   Route::get('coupon_search/{type}/{page?}', 'MaatwebsiteDemoController@coupon');
     //order type search report
   Route::get('orders/{type}/{search?}/{page?}', 'MaatwebsiteDemoController@orders');
   
       
});



          //pages cms
Route::get('pages/{slug}', 'admin\\CmsController@pageCreate');
















//Admin Frontend page display after successfully login
Route::get('/', function () {
    return view('frontend_theme.index');
});
//user cant access without permission that time page are display
Route::get('error', function () {
    return view('error.403');
})->name('error.403');
//page is not found then diplay 404 page
Route::get('page', function () {
    return view('error.404');
})->name('error.404');

//admin  login form

Route::post('/login/custom', [
    'uses'=>'LoginController@login',
  
    ])->name('login.custom');

//display admin login form 
Route::get('/admin', 'Auth\LoginController@showLoginForm')->name('login');