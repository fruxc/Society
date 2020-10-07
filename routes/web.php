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

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('member.dashboard');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/users/maintenance', 'HomeController@showMain')->name('maintenance');
Route::get('/users/complaint', 'HomeController@showComp')->name('complaint');
Route::get('/users/payment', 'HomeController@showPayment')->name('payment');


Route::resource('/users/complaint/create', 'ComplaintControllerForUsers')->only([
  'create', 'store',
]);
//
// Route::resource('/users/payment/createp', 'PaymentControllerForUsers')->only([
//     'create', 'store',
// ]);
//

Route::get('/users/staff', 'HomeController@show')->name('staff');

Route::get('/users/maintenance/pdf', 'DynamicPDFController@index');

Route::get('/users/maintenance/pdf/pdf', 'DynamicPDFController@pdf');



Route::prefix('admin')->group(function () {

  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


  //add users

  Route::resource('user', 'UserController');

  //add maintenance

  Route::resource('maintenance', 'MaintenanceController');

  //add complaint

  Route::resource('complaint', 'ComplaintController');

  //add payment

  Route::resource('payment', 'PaymentController');

  //routes for password resetting

  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminForgotPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminForgotPasswordController@showResetForm')->name('admin.password.reset');
});
