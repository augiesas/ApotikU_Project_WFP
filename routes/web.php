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
Route::get('/home', 'MedicineController@showSomeData')->name('home');
Route::get('/', 'MedicineController@showSomeData')->name('someData');
Route::get('/shop', 'MedicineController@showAllData')->name('shop');
Route::get('/detail/{id}','MedicineController@detail')->name('medicine.detail');
Route::resource('user','UserController');
Route::middleware(['auth'])->group(function () {
  // Medicine
  Route::resource('medicine', 'MedicineController');

  Route::get('/topMedicine', 'MedicineController@showTopFiveSold')->name('topMedicine');
  Route::get('/topCustomer', 'UserController@showRoyalBuyer')->name('topCustomer');
  Route::get('/listmedicine','MedicineController@showAllDataAdmin')->name('listmedicine');
  Route::post('/medicine/getEditForm', 'MedicineController@getEditForm')->name('medicine.getEditForm');
  Route::post('/medicine/deleteData', 'MedicineController@deleteData')->name('medicine.deleteData');

  Route::get('addmedicine', 'MedicineController@create')->name('addmedicine');

  Route::get('/listUser', 'UserController@listUsers')->name('listUser');
  Route::get('edituser/{id}', 'UserController@editUser');

	Route::get('cart', 'MedicineController@cart');
	Route::get('add-to-cart/{id}', 'MedicineController@addToCart');

	Route::get('/checkout', 'TransactionController@form_submit_front');
	Route::get('/submit_checkout','TransactionController@submit_front')->name('submitcheckout');

  Route::get('/alltrans', 'TransactionController@showAllData')->name('alltrans');
  Route::get('/history_user', 'TransactionController@showAllData_byId')->name('history');


  Route::resource('category','CategoryController');
  Route::get('categoryy', 'CategoryController@showAllData')->name('categoryy');
  Route::post('category/deleteData','CategoryController@deleteData')->name('category.deleteData');
  Route::post('category/getEditForm','CategoryController@getEditForm')->name('category.getEditForm');
  Route::post('category/updateData/{id}','CategoryController@update')->name('category.updateData');

  // Panggil waktu button click
  Route::post('/user/update', 'UserController@update')->name('user.update');
  Route::post('/user/delete', 'UserController@destroy')->name('user.delete');
});