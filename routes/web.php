<?php

use Illuminate\Support\Facades\Route;

// import controller here
// frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\RegisterController;

// backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\UserTypeController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;


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
    Route::resource('successregister', RegisterController::class);
});


// backsite
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){
    // Dashboard
    Route::resource('dashboard', DashboardController::class);
    // Permission
    Route::resource('permission', PermissionController::class);
    // Role
    Route::resource('role', RoleController::class);
    // User
    Route::resource('user', UserController::class);
    // UserType
    Route::resource('type_user', UserTypeController::class);
    // Consultation
    Route::resource('consultation', ConsultationController::class);
    // Specialist
    Route::resource('specialist', SpecialistController::class);
    // Config Payment
    Route::resource('config_payment', ConfigPaymentController::class);
    // Doctor
    Route::resource('doctor', DoctorController::class);
    // hospital patient
    Route::resource('hospital_patient', HospitalPatientController::class);
    // report appointment
    Route::resource('appointment', ReportAppointmentController::class);
    // report transaction
    Route::resource('transaction', ReportTransactionController::class);

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
