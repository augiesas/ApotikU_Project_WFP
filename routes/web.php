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


// Medicine
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'MedicineController@showAllData')->name('shop');
Route::get('/medicine', 'MedicineController@showTopFiveSold')->name('topMedicine');
Route::get('shop/detail/{id}','MedicineController@detail')->name('medicine.detail');
Route::get('/', 'MedicineController@showSomeData')->name('someData');