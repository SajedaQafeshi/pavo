<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/catalog', 'CatalogController@index');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/customer', 'Auth\LoginController@showCustomerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/customer', 'Auth\RegisterController@showCustomerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/customer', 'Auth\LoginController@customerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/customer', 'Auth\RegisterController@createCustomer');
Route::view('/admin', 'admin');
Route::view('/customer', 'customer');
Route::get('/code/{id}', DiscountController::class.'@check');

Route::resource('region', 'RegionController');
Route::resource('customers', CustomerController::class);
Route::get('customers/activate/{id}', CustomerController::class . '@activate');
Route::get('customers/deactivate/{id}', CustomerController::class . '@deactivate');
Route::resource('setting', SettingController::class);
Route::get('orderItems/{id}', OrderItemController::class . '@destroy');
Route::resource('orderItems', OrderItemController::class);
Route::resource('orders', OrderController::class);
Route::resource('city', CityController::class);
Route::resource('region', RegionController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('photo', PhotoController::class);
Route::resource('order', OrderAdminController::class);
Route::resource('invoice', InvoiceController::class);
Route::resource('discount', DiscountController::class);
Route::get('/discount/delete/{id}', DiscountController::class.'@destroy');
Route::resource('subscribe', SubscribeController::class);
Route::post('/subscribe/add', SubscribeController::class.'@storeSubscribtion');
Route::get('subscribe/archive/{id}', SubscribeController::class.'@archive');
Route::resource('point', PointController::class);
Route::put('/point/{id}/edit', PointController::class.'@update');

Route::get('/product/delete/{id}', ProductController::class.'@destroyImage');
Route::get('/product/color/delete/{id}', ProductController::class.'@removeColor');
Route::resource('advertisnment', AdvertisnmentController::class);
Route::get('product/image/{id}', ProductController::class.'@showImages');
Route::get('product/zoom/{id}', ProductController::class.'@zoomImage');
Route::get('city/archive/{id}', CityController::class.'@archive');
Route::get('product/archive/{id}', ProductController::class.'@archive');
Route::get('region/archive/{id}', RegionController::class.'@archive');
Route::get('setting/archive/{id}', SettingController::class.'@archive');
Route::get('category/archive/{id}', CategoryController::class.'@archive');
Route::get('advertisnment/archive/{id}', AdvertisnmentController::class.'@archive');
Route::post('/product/discount', ProductController::class.'@addDiscount');
Route::resource('favorite', FavoriteController::class);
/*Route::group(['middleware' => 'auth'], function () {
    
});*/




Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::resource('products', PageProductsController::class);
Route::resource('categories', PageCategoryController::class);
