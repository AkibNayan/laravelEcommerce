<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;


/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Frontend\PagesController@homepage')->name('homepage');

//All Product and product details
Route::get('/all-products', 'App\Http\Controllers\Frontend\PagesController@allProducts')->name('allProducts');
Route::get('{slug}/product-details', 'App\Http\Controllers\Frontend\PagesController@productDetails')->name('productDetails');

// Primary Category and Sub Category wise product show
Route::get('/primarycategory/{id}', 'App\Http\Controllers\Frontend\PagesController@pcategory')->name('pcategory.show');
// sub category
Route::get('/category/{slug}', 'App\Http\Controllers\Frontend\PagesController@category')->name('category.show');

// Search Product
Route::get('/search', 'App\Http\Controllers\Frontend\PagesController@search')->name('search');

// Add to Cart Routes
Route::group(['prefix' => 'cart'], function(){

    Route::get('/', 'App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
    Route::post('/store', 'App\Http\Controllers\Frontend\CartController@store')->name('cart.store');
    Route::post('/update/{id}', 'App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
    Route::post('/destroy/{id}', 'App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');


});

Route::get('/checkout', 'App\Http\Controllers\Frontend\PagesController@checkout')->name('checkout');

// Division and District Ajax Work Route
Route::get('get-district/{id}', function($id){
    return json_encode(App\Models\District::where('division_id', $id)->get());

});


Route::get('/customer-login', 'App\Http\Controllers\Frontend\PagesController@login')->name('customer-login');

Route::group(['prefix' => 'customer'], function () {

    //Customer Profile
    Route::get('/my-profile', 'App\Http\Controllers\Frontend\CustomerController@index')->name('customer-profile')->middleware('auth', 'verified');
    Route::get('/profile-edit/{id}', 'App\Http\Controllers\Frontend\CustomerController@edit')->name('profile.edit')->middleware('auth');
    Route::post('/profile-update/{id}', 'App\Http\Controllers\Frontend\CustomerController@update')->name('profile.update')->middleware('auth');

    //Order Management
    Route::get('/order-history', 'App\Http\Controllers\Frontend\OrderManagementController@index')->name('order-history');
    Route::get('/invoice/{id}', 'App\Http\Controllers\Frontend\OrderManagementController@invoice')->name('order-invoice');

});

// SSLCOMMERZ Start
//Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('make_payment');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('payment_success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('payment_fail');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('payment_cancel');

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Admin Group Routes
Route::group(['prefix' => 'admin'], function () {

    // Admin Dashboard Route
    Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@dashboard')->middleware('auth', 'verified', 'role')->name('admin.dashboard');
    //Blank-Page Route
    Route::get('/blank-page', 'App\Http\Controllers\Backend\PagesController@blank')->middleware('auth', 'verified', 'role')->name('admin.blank-page');

    //Brand Group Routes
    Route::group(['prefix' => '/brand'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->middleware('auth', 'verified', 'role')->name('brand.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->middleware('auth', 'verified', 'role')->name('brand.create');
        Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->middleware('auth', 'verified', 'role')->name('brand.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@edit')->middleware('auth', 'verified', 'role')->name('brand.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\BrandController@update')->middleware('auth', 'verified', 'role')->name('brand.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\BrandController@destroy')->middleware('auth', 'verified', 'role')->name('brand.destroy');
    });

    //Category Group Routes
    Route::group(['prefix' => '/category'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->middleware('auth', 'verified', 'role')->name('category.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->middleware('auth', 'verified', 'role')->name('category.create');
        Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->middleware('auth', 'verified', 'role')->name('category.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->middleware('auth', 'verified', 'role')->name('category.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->middleware('auth', 'verified', 'role')->name('category.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->middleware('auth', 'verified', 'role')->name('category.destroy');
    });

    //Product Group Routes
    Route::group(['prefix' => '/product'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->middleware('auth', 'verified', 'role')->name('product.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->middleware('auth', 'verified', 'role')->name('product.create');
        Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->middleware('auth', 'verified', 'role')->name('product.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->middleware('auth', 'verified', 'role')->name('product.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->middleware('auth', 'verified', 'role')->name('product.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->middleware('auth', 'verified', 'role')->name('product.destroy');
    });

    //Division Group Routes
    Route::group(['prefix' => '/division'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\DivisionController@index')->middleware('auth', 'verified', 'role')->name('division.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\DivisionController@create')->middleware('auth', 'verified', 'role')->name('division.create');
        Route::post('/store', 'App\Http\Controllers\Backend\DivisionController@store')->middleware('auth', 'verified', 'role')->name('division.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DivisionController@edit')->middleware('auth', 'verified', 'role')->name('division.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\DivisionController@update')->middleware('auth', 'verified', 'role')->name('division.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\DivisionController@destroy')->middleware('auth', 'verified', 'role')->name('division.destroy');
    });

    //District Group Routes
    Route::group(['prefix' => '/district'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\DistrictController@index')->middleware('auth', 'verified', 'role')->name('district.manage');
        Route::get('/create', 'App\Http\Controllers\Backend\DistrictController@create')->middleware('auth', 'verified', 'role')->name('district.create');
        Route::post('/store', 'App\Http\Controllers\Backend\DistrictController@store')->middleware('auth', 'verified', 'role')->name('district.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DistrictController@edit')->middleware('auth', 'verified', 'role')->name('district.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\DistrictController@update')->middleware('auth', 'verified', 'role')->name('district.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\DistrictController@destroy')->middleware('auth', 'verified', 'role')->name('district.destroy');
    });
    // Order Management Route
    Route::group(['prefix' => '/order-management'], function(){
        Route::get('/manage', 'App\Http\Controllers\Backend\OrderController@index')->middleware('auth', 'verified', 'role')->name('order.manage');
        Route::get('/order-details/{id}', 'App\Http\Controllers\Backend\OrderController@show')->middleware('auth', 'verified', 'role')->name('order.details');
        Route::post('/store', 'App\Http\Controllers\Backend\OrderController@store')->middleware('auth', 'verified', 'role')->name('order.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\OrderController@edit')->middleware('auth', 'verified', 'role')->name('order.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\OrderController@update')->middleware('auth', 'verified', 'role')->name('order.update');
        Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\OrderController@destroy')->middleware('auth', 'verified', 'role')->name('order.destroy');
    });
});

require __DIR__ . '/auth.php';
