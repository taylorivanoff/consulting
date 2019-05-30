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

Route::get('consulting', function () {
    return view('coming-soon');
});

Route::get('our-story', function () {
    return view('coming-soon');
});

Route::get('blog', function () {
    return view('coming-soon');
});

Route::get('contact', function () {
    return view('coming-soon');
});

Route::get('bespoke', function () {
    return view('coming-soon');
});

Route::apiResource('leads', 'LeadController');

Route::post('auth/recaptcha', 'Auth\VerifyRecaptchaController');