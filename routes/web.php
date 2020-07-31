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
// Route::get('send-mail', function () {
   
//     $data = [
//         'fullname' => 'Tên khách hàng',
//         'phone' => 'Số điện thoại khách hàng',
//         'start_at' => '00 giờ',
//         'staff' => [
//         	'0' => 'NV 1',
//         	'1' => 'NV 2',
//         ],
//         'service' => [
//         	'0' => 'DV 1',
//         	'1' => 'DV 2',
//         ],
//         'note' => 'Ghi chú',
//     ];
//     \Mail::to('maiduynghia87@gmail.com')->send(new \App\Mail\SendMail($data));
   
//     dd("Email is Sent.");
// });
// Start Route Client
Route::get('/', 'HomeController@index')->name('homepage');
Route::post('/booking', 'HomeController@booking')->name('booking');
Route::post('/history', 'HomeController@history')->name('history');
Route::get('/invoice/{id}', 'HomeController@invoice')->name('invoice');
Route::get('/re-booking/{id}', 'HomeController@duplidateBook')->name('re-booking');
Route::post('/re-update/{id}', 'HomeController@updateBook')->name('re-update');

// Start Route Admin
Route::get('/admin', 'Admin\HomeController@index')->name('dashboard')->middleware(['auth','checkAdmin']);
// Employees
Route::prefix('/admin/staff')->middleware(['auth','checkAdmin'])->group(function() {
	$controller = 'Admin\StaffController@';
	// List staff
	Route::get('/', $controller . 'index')->name('staff.index');
	// View add staff
	Route::get('/create', $controller . 'create')->name('staff.create');
	// View edit staff
	Route::get('/edit/{id}', $controller . 'edit')->name('staff.edit');
	// Logic edit staff
	Route::post('/update/{id}', $controller . 'update')->name('staff.update');
	// Logic add staff
	Route::post('/store', $controller . 'store')->name('staff.store');
	// Destroy staff
	Route::get('/delete/{id}', $controller . 'destroy')->name('staff.destroy');
});
// Services
Route::prefix('/admin/service')->middleware(['auth','checkAdmin'])->group(function() {
	$controller = 'Admin\ServiceController@';
	// List service
	Route::get('/', $controller . 'index')->name('service.index');
	// View add service
	Route::get('/create', $controller . 'create')->name('service.create');
	// View edit service
	Route::get('/edit/{id}', $controller . 'edit')->name('service.edit');
	// Logic edit service
	Route::post('/update/{id}', $controller . 'update')->name('service.update');
	// Logic add service
	Route::post('/store', $controller . 'store')->name('service.store');
	// Destroy service
	Route::get('/delete/{id}', $controller . 'destroy')->name('service.destroy');
});
// Orders
Route::prefix('/admin/order')->middleware(['auth','checkAdmin'])->group(function() {
	$controller = 'Admin\OrderController@';
	// List order
	Route::get('/', $controller . 'index')->name('order.index');
	// Logic edit order
	Route::get('/update/{id}', $controller . 'update')->name('order.update');
	// Detail order
	Route::get('/detail/{id}', $controller . 'detail')->name('order.detail');
});
// Customer
Route::prefix('/admin/customer')->middleware(['auth','checkAdmin'])->group(function() {
	$controller = 'Admin\CustomerController@';
	// List customer
	Route::get('/', $controller . 'index')->name('customer.index');
	// View edit customer
	Route::get('/edit/{id}', $controller . 'edit')->name('customer.edit');
	// Logic edit customer
	Route::post('/update/{id}', $controller . 'update')->name('customer.update');
	// Update all code
	Route::get('/update-code', $controller . 'updateCode')->name('customer.updateCode');
});
// Route For Authentication
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
