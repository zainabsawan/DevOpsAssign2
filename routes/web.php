<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// GET METHODS

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/whyplants', function () {
    return view('whyplants');
});



// -----Admin------
Route::get('/adminLogin', '\App\Http\Controllers\AdminController@showLoginForm')->name('adminLogin');
Route::post('/adminLogin', '\App\Http\Controllers\AdminController@login')->name('adminLogin.post');
//Route::get('/adminLogin', '\App\Http\Controllers\AdminController@logout')->name('adminLogout');

Route::get('/adminLogout', '\App\Http\Controllers\AdminController@logout');

Route::get('/dashboard', '\App\Http\Controllers\AdminController@viewDashboard');

Route::get('/products', '\App\Http\Controllers\AdminController@viewProducts')->name('products');

Route::get('/addProduct', '\App\Http\Controllers\AdminController@viewAddProduct')->name('addProduct');
Route::post('/addProduct', '\App\Http\Controllers\AdminController@addProduct')->name('addProduct.post');


Route::get('products/{term}', '\App\Http\Controllers\AdminController@searchProduct');



Route::get('/editProduct/{id}', '\App\Http\Controllers\AdminController@viewEditProduct')->name('editProduct');



Route::post('/editProduct/{id}', '\App\Http\Controllers\AdminController@editProduct')->name('editProduct.post');

// Route::post('/products/{id}', '\App\Http\Controllers\AdminController@addProduct')->name('deleteProduct');
Route::delete('/products/{id}', '\App\Http\Controllers\AdminController@deleteProduct')->name('deleteProduct');

// ========


// Customer

Route::get('/login', '\App\Http\Controllers\CustomerController@showLoginForm')->name('login');

Route::get('/signup', '\App\Http\Controllers\CustomerController@showsignupForm')->name('signup');

Route::post('/login', '\App\Http\Controllers\CustomerController@login')->name('login.post');

Route::post('/signup', '\App\Http\Controllers\CustomerController@signup')->name('signup.post');;

Route::post('/logout', '\App\Http\Controllers\CustomerController@logout')->name('logout');

Route::get('/customerProfile', '\App\Http\Controllers\CustomerController@profile')->name('profile');

// BUY PAGE

Route::get('/buy', '\App\Http\Controllers\CustomerController@showBuyPage')->name('buy');

Route::get('buy/{term}', '\App\Http\Controllers\AdminController@searchProduct');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('checkout', '\App\Http\Controllers\CustomerController@checkout' );

Route::post('checkout', '\App\Http\Controllers\CustomerController@confirmOrder' );

// Route::get('/checkout', function () {
//     return view('checkout');
// });
