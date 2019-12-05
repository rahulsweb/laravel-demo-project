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
Route::get('/', 'frontend\FrontendController@index')->name('frontend.index');

//routes here

//Customer Login Page
Route::get('login', function () {
    if (auth()->user()) {
        return back();
    }

    return view('frontend.login.login', ['formMode' => 'create']);
})->name('frontend.login');
//email of frontend login
Route::get('email', function () {
    return view('frontend.login.email');
})->name('frontend.email');
//frontend user registration form
Route::get('register', 'frontend\RegisterController@create')->name('frontend.register.create');
//frontend user registration submit data
Route::post('/register', 'frontend\RegisterController@store')->name('frontend.register.store');
//frontend user login submit data
Route::post('/login', 'frontend\LoginController@login')->name('frontend.login');
//frontend login user logout
Route::post('/logout', 'frontend\LoginController@logout')->name('frontend.logout');
//delete specific  product in cart with the help of product id
Route::get('cart/delete/{id}', 'frontend\\CartController@removeProduct')->name('cart.delete');
//cart information
Route::resource('cart', 'frontend\\CartController');
//add specific  product in cart with the help of product id
Route::get('cart/add/{id}', 'frontend\CartController@addCart')->name('cart.add');
//remove specific  product in cart with the help of product id
Route::get('cart/minus/{id}', 'frontend\CartController@minusCart')->name('cart.minus');
//display specific  product in cart with the help of product id
Route::get('cart/detail/{id}', 'frontend\CartController@cart')->name('cart');
//display cart information
Route::get('/shopping/cart/', 'frontend\CartController@shoppingCart')->name('shoppingCart');

//web group
Route::group(['middleware' => ['web']], function () {

    Route::resource('address', 'frontend\\AddressController');
    Route::resource('profile', 'frontend\\CartController');
    Route::resource('checkout', 'frontend\\CheckoutController');

    //get specific  addresses with the help of user id
    Route::get('checkout/address/{id}', 'frontend\\CheckoutController@getAddress')->name('checkoutAddress');

//paypal payment after successfully
    Route::get('paywithpaypal', array('uses' => 'frontend\\AddMoneyController@payWithPaypal'))->name('addmoney.paywithpaypal');
//paypal order place request
    Route::post('paypal', array('uses' => 'frontend\\AddMoneyController@postPaymentWithpaypal'))->name('addmoney.paypal');
    //paypal order place get status
    Route::get('paypal', array('uses' => 'frontend\\AddMoneyController@getPaymentStatus'))->name('payment.status');

    // get category of subcategory in index page

    Route::get('categories/subcategory/{id}', 'frontend\FrontendController@subCategory')->name('frontend.subcategory');

//wishlist add
    Route::post('wishlist/add', 'frontend\WishListController@store')->name('wishlist.add');
    //wishlist index page list of wishlist
    Route::get('wishlist', 'frontend\WishListController@index')->name('wishlist');
    //wishlist delete
    Route::get('wishlist/delete/{id}', 'frontend\WishListController@deleteWish')->name('wishlist.delete');

//order track display
    Route::get('order/track', 'frontend\OrderController@showTrack');
    //order track show detail
    Route::post('order/track', 'frontend\OrderController@orderTrack')->name('order.track');

// order index page list

    Route::get('order', 'frontend\OrderController@index')->name('order');
    //show order id wise product information
    Route::get('order/{id}', 'frontend\OrderController@show')->name('order.show');

//profile details
    Route::resource('profile', 'frontend\\ProfileController');
    //show form password changes
    Route::get('password', 'frontend\\ProfileController@showForm')->name('profile.password');
    //changing profile password
    Route::post('/changePassword', 'frontend\\ProfileController@changePassword')->name('changePassword');
//cash on delivery
    Route::post('cod', 'frontend\\AddMoneyController@cod')->name('cod');
//product detail
    Route::get('product/detail/{id}', 'frontend\ProductController@show')->name('product.detail');
//show  contact us form

    Route::get('contact', 'frontend\ProfileController@contact')->name('profile.contact');

    //submit contact us form detail
    Route::post('contact-us', [ 'uses' => 'frontend\ContactUsController@contactSaveData'])->name('contactus.store');

});

//coupon search
Route::post('coupon/search', 'frontend\\SearchController@store')->name('coupon.search');

//coupon remove

Route::get('coupon/remove', 'frontend\\SearchController@remove')->name('coupon.remove');

//display data product subcategory wise
Route::post('sub_category/product', 'frontend\FrontendController@getProducts')->name('sub_category.product');

//google account show form
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle')->name('google.form');
//google  account form  submit
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback')->name('google.submit');
//github account show form
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('github.form');
//github account form submit
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback')->name('github.submit');

//email register
Route::get('emails_register', function () {
    return view('emails.register');
})->name('email.register');

//email order
Route::get('emails_order', function () {
    return view('emails.order_place');
})->name('email.order');

//only for testing purpose
Route::get('test', 'frontend\FrontendController@test');
