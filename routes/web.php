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
});

//Auth::routes();

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => true, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/social/google', [])->name('google');

Route::get('google/redirect', function () {
    //return Socialite::driver('google')->redirect();
    return Socialite::driver('google')->with(["access_type" => "offline", "prompt" => "consent select_account"])->redirect();
})->name('google');


Route::get('google/callback', 'UserController@callback');

/*
Route::get('google/callback', function () {
    $user = Socialite::driver('google')->user();
    //dd($user);
    
    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
        'nickname' => $user->nickname,
        'avatar' => $user->avatar,
        'id' => $user->id
    ]);
    
    //return view('home', )
    //return view('home', [
    //    'user' => $user
    //]);
});
*/

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
