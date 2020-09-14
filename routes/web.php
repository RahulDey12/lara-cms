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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', \App\Http\Livewire\Auth\Login::class)
        ->name('login');

    Route::get('register', \App\Http\Livewire\Auth\Register::class)
        ->name('register');
});

Route::get('password/reset', \App\Http\Livewire\Auth\Passwords\Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', \App\Http\Livewire\Auth\Passwords\Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', \App\Http\Livewire\Auth\Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', \App\Http\Livewire\Auth\Passwords\Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', 'Auth\EmailVerificationController@verify')
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', 'Auth\LogoutController@logout')
        ->name('logout');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' =>'dashboard.', 'section' => 'content'], function() {
    Route::group(['prefix' => 'post', 'as' =>'post.'], function() {
        Route::get('/', \App\Http\Livewire\Dashboard\Post\Index::class)->name('index');
        Route::get('new', \App\Http\Livewire\Dashboard\Post\Create::class)->name('new');
    });
});
