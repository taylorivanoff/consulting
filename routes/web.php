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

Route::resource('contact', 'ContactController');

Route::resource('leads', 'Account/LeadController');

Route::resource('appointments', 'Booking/AppointmentController');
Route::resource('bookings', 'Booking/BookingController');
Route::resource('packages', 'Booking/PackageController');

Auth::routes();

Route::prefix('auth')->group(function () {
	Route::post('recaptcha', 'Auth\VerifyRecaptchaController')->name('auth.recaptcha');
	Route::get('email-authenticate/{token}', 'Auth\LoginController@authenticateEmail')->name('auth.email-authenticate');

	Route::middleware(['auth'])->group(function () {
		Route::get('logout', 'Auth\LogoutController')->name('auth.logout');
	});
});

Route::middleware(['auth', 'role:admin|user'])->group(function () {
	Route::prefix('user')->group(function () {
		Route::get('profile', 'Account\ProfileController')->name('user.profile');
		Route::post('profile/update', 'Account\UpdateProfileController')->name('user.profile.update');
	});
});

Route::middleware(['auth', 'role:admin'])->group(function () {
	Route::prefix('admin')->group(function () {
		Route::get('dashboard', 'Admin\DashboardController')->name('admin.dashboard');
	});
});