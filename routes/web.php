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

// Route::get('/', 'HomeController')->name('home');

Route::get('/', function () {
	return view('contact');
})->name('contact');

Route::resource('leads', 'LeadController');
Route::resource('appointments', 'AppointmentController');

Auth::routes();

Route::prefix('auth')->group(function () {
	Route::get('email-authenticate/{token}', 'Auth\LoginController@authenticateEmail')->name('auth.email-authenticate');

	Route::post('recaptcha', 'Auth\VerifyRecaptchaController')->name('auth.recaptcha');

	Route::middleware(['auth'])->group(function () {
		Route::get('logout', 'Auth\LogoutController')->name('auth.logout');
	});
});

Route::middleware(['auth'])->group(function () {
	Route::prefix('user')->group(function () {
		Route::get('profile', 'Account\ProfileController')->name('user.profile');
		Route::post('profile/update', 'Account\UpdateProfileController')->name('user.profile.update');
	});

	Route::middleware(['role:admin'])->group(function () {
		Route::resource('bookings', 'BookingController');
		
		Route::prefix('admin')->group(function () {
			Route::get('dashboard', 'Admin\DashboardController')->name('admin.dashboard');
			Route::get('availability', 'Admin\AvailabilityController')->name('admin.availability');
			Route::get('appointments', 'Admin\AppointmentController')->name('admin.appointments');
		});
	});
});

