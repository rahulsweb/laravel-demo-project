<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

//Login Api
Route::post('login', 'API\UserController@login')->name('user.login');
//Register Api
Route::post('register', 'API\UserController@register')->name('user.register');
//Forget Password Api
Route::post('password/email', 'API\ForgotPasswordController@getResetToken')->name('user.forgetPassword');
//Reset Password Api
Route::post('password/reset', 'API\ResetPasswordController@reset')->name('user.resetPassword');
//Product List Api
Route::post('product/list', 'API\ProductController@getProductList')->name('product.list');

//Product Details
Route::post('product/details', 'API\ProductController@getProductDetails')->name('product.detail');
//contact-us Add
Route::post('contact-us/create', 'API\ContactUsController@store')->name('contact-us.store');

//Middleware Group use
Route::group(['middleware' => 'auth:api'], function () {

    //profile details
    Route::post('profile/details', 'API\ProfileController@getProfileDetails')->name('profile.detail');
    //profile update
    Route::post('profile/update', 'API\ProfileController@update')->name('profile.update');

    //change Password
    Route::post('profile/password', 'API\ProfileController@changePassword')->name('profile.password');
    //wishlist add
    Route::post('wishlist/add', 'API\WishListController@store')->name('wishlist.add');
    //wishlist details
    Route::post('wishlist/details', 'API\WishListController@index')->name('wishlist.detail');
    //wishlist delete
    Route::post('wishlist/delete', 'API\WishListController@deleteWishlist')->name('wishlist.delete');

    //order details
    Route::post('order/details', 'API\OrderController@getOrderDetails')->name('order.detail');
    //order Track
    Route::post('order/track', 'API\OrderController@orderTrack')->name('order.track');
    //Category Wise Product
    Route::post('product/category', 'API\ProductController@getProducts')->name('product.category');

    //User Address routes
    //Address details
    Route::post('address/details', 'API\AddressController@index')->name('address/details');
    //Address store n database
    Route::post('address/store', 'API\AddressController@store')->name('address.store');
    //Address update in a database
    Route::post('address/update', 'API\AddressController@update')->name('address.update');
    //Address delete from database
    Route::post('address/delete', 'API\AddressController@destroy')->name('address.delete');
    //order place api
    Route::post('order/place', 'API\OrderPlaceController@orderPlace')->name('order.place');

    //order status api
    Route::post('order/status', 'API\OrderPlaceController@orderStatus')->name('order.status');
});
