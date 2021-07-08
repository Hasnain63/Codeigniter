<?php

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
//     return view('welcome');
// });
Route::get('/', 'AdminController@index')->name('admin_login');

// Route::post('/2fa', function () {
//     return redirect(URL()->previous());
// })->name('2fa')->middleware('2fa');

// Route::get('/ledger', function () {
//     return view('ledger'); 
// })->name('ledgerUrl');

// ***********Admin**********
Route::get('/create', 'AdminController@create')->name('admin_signup');
Route::post('/createlogin', 'AdminController@createlogin')->name('admin_create_submit');
Route::post('/2fa', 'AdminController@authentication')->name('2fa');
Route::post('/loginsubmit', 'AdminController@loginsubmit')->name('admin_login_submit');
Route::get('/logout', 'AdminController@logout')->name('admin_logout');




Route::get('/dashboard', 'FrontPageController@index')->name('frontUrl');
Route::get('/ledger', 'LedgerController@index')->name('ledgerUrl');
// Route::get('/ledger/{month}/{year}', ['uses' => 'LedgerController@index'])->name('ledgerUrl');
Route::post('/ledgeraction', 'LedgerController@storeLedger');
Route::delete('/deleterecord/{id}', 'LedgerController@destroyLedger')->name('destroyurl');




Route::group(['middleware' => ['logData']], function () {
});
/* Ledger */