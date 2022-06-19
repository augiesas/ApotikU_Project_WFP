<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layouts.index');
// });


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MedicineController@showSomeData')->name('someData');

Route::middleware(['auth'])->group(function () {
  // Medicine

  Route::get('/shop', 'MedicineController@showAllData')->name('shop');
  Route::get('/topMedicine', 'MedicineController@showTopFiveSold')->name('topMedicine');
  Route::get('/topCustomer', 'HomeController@showRoyalBuyer')->name('topCustomer');
  Route::get('shop/detail/{id}','MedicineController@detail')->name('medicine.detail');
 
  // Route::get('/listuser', '')

	Route::get('cart', 'MedicineController@cart');
	Route::get('add-to-cart/{id}', 'MedicineController@addToCart');

	Route::get('/checkout', 'TransactionController@form_submit_front');
	Route::get('/submit_checkout','TransactionController@submit_front')->name('submitcheckout');

 
  Route::get('/history_user', 'TransactionController@showAllData_byId')->name('history');
});