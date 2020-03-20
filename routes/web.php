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

// Route::get('/', function () {
//     return view('/layout/frontlayout');
// });

Route::get('/','loginController@main');

Route::get('/crud_index', function () {
    return view('crud');
});

Route::get('/login','loginController@index');
Route::get('/login/submit','loginController@submit');

Route::get('/admin/dashboard','adminController@index');

Route::get('/member/dashboard','MemberController@index');
Route::get('/member/dashboard/get_destination','MemberController@get_destination');
Route::get('/member/dashboard/get_destination/book_now','MemberController@book_now');

Route::get('/register','registerController@index');
Route::resource('/customer/register','registerController');

Route::get('admin/booking/create','BookingController@get_create');
Route::get('admin/booking/list','BookingController@index');
Route::get('admin/booking/list/get_data','BookingController@get_data');
Route::resource('/booking/submit','BookingController');
Route::post('/booking/submit/update','BookingController@update');
Route::resource('payment/submit','PaymentController');
Route::get('admin/booking/list/destination','BookingController@get_destination');


Route::get('admin/destination/create','DestinationController@get_create');
Route::get('admin/destination/list','DestinationController@index');
Route::get('admin/destination/list/get_data','DestinationController@get_data');
Route::resource('/destination/submit','DestinationController');
Route::post('/destination/submit/update','DestinationController@update');


Route::get('/crud_index','CrudController@index');
Route::get('/crud_index/get_data','CrudController@get_data');
Route::resource('/add','CrudController');
Route::get('/update','CrudController@update');
