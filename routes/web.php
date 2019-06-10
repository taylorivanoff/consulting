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

Route::get('/', 'HomeController')->name('home');

Route::apiResource('appointments', 'AppointmentController');
Route::apiResource('bookings', 'BookingController');
Route::apiResource('leads', 'LeadController');
Route::apiResource('packages', 'PackageController');

Auth::routes();
Route::prefix('auth')->group(function () {
	Route::post('recaptcha', 'Auth\VerifyRecaptchaController')->name('auth.recaptcha');
	Route::get('logout', 'Auth\LogoutController')->name('auth.logout');
	Route::get('email-authenticate/{token}', 'Auth\LoginController@authenticateEmail')->name('auth.email-authenticate');
});

// Route::middleware(['auth', 'role:user'])->group(function () {
// 	Route::prefix('user')->group(function () {
// 		Route::get('dashboard', 'User\DashboardController');
// 	});
// });

Route::middleware(['auth', 'role:admin'])->group(function () {
	Route::prefix('admin')->group(function () {
		Route::get('dashboard', 'Admin\DashboardController')->name('admin.dashboard');
	});
});