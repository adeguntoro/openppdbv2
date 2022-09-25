<?php

use Illuminate\Support\Facades\Route;

//Socialite
use Laravel\Socialite\Facades\Socialite;

// use App\Http\Controllers\UserController;


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
});//->middleware(['role_check']);

//Auth::routes();

Auth::routes([
    'register'  => true, // Registration Routes...
    'reset'     => true, // Password Reset Routes...
    'verify'    => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//->middleware(['role_check']);


Route::get('/norole', function () {
    return 'no role';
});

Route::get('/greeting', function () {
    return 'Hello World';
})->middleware(['role_check']);

// Socialite Google
Route::get('google/redirect', function () {
    return Socialite::driver('google')->with(["access_type" => "offline", "prompt" => "consent select_account"])->redirect();
})->name('google');

Route::get('google/callback', 'UserController@callback');

//dashboard base on role
Route::group(['middleware' => ['auth','role:super-admin']], function () {
    //
    Route::prefix('supe')->group(function () {
        Route::get('/', function () {
            return 'super admin';
        });
    });
    
});

Route::group(['middleware' => ['auth','role:stundent|super-admin']], function () {
    //
    Route::prefix('student')->group(function () {
        Route::get('/', function () {
            return 'stud';
        });
    });
});

Route::group(['middleware' => ['auth','role:teacher|super-admin']], function () {
    //
    Route::prefix('teacher')->group(function () {
        Route::get('/', function () {
            return 'teach';
        });
    });
});
