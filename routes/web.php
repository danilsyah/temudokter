<?php

use Illuminate\Support\Facades\Route;

// import controller here
// frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

// backsite
use App\Http\Controllers\Backsite\DashboardController;;

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

Route::resource('/', LandingController::class);

// frontsite
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    // appointment page
    Route::resource('appointment', AppointmentController::class);
    // payment page
    Route::resource('payment', PaymentController::class);
    // success register
    Route::get('success-signup', function(){
        return view('pages.frontsite.success.signup-success');
    });
});


// backsite
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){
    // Dashboard
    Route::resource('dashboard', DashboardController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
