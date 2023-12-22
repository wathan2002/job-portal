<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UiController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

//LogIn
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginform'])->name('login');
//Register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerform'])->name('register');
Route::post('register/{id}/update', [AuthController::class, 'registerUpdate'])->name('registerUpdate')->middleware('auth');

//Ui_Panel
Route::get('/', [UiController::class, 'index'])->name('index');
//Search Category
Route::get('search', [UiController::class, 'search'])->name('search');
Route::get('search_category/{id}', [UiController::class, 'search_category'])->name('search_category');

Route::middleware('auth')->group(function () {
    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   //Employee Profile
    Route::get('employee-profile', [UiController::class, 'profile'])->name('profile');

    //Application
    Route::get('application/{id}', [ApplicationController::class, 'apply'])->name('apply');
    Route::post('application/store', [ApplicationController::class, 'store'])->name('applicationForm');
});

//Admin_panel
Route::prefix('admin')->middleware('auth', 'IsEmployer')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('payment', [DashboardController::class, 'payment'])->name('payment');
    Route::post('payment/create', [DashboardController::class, 'paymentStore'])->name('paymentStore');
    Route::get('user', [DashboardController::class, 'userList'])->name('userList');
    Route::get('payment/{employerId}/detail', [DashboardController::class, 'paymentDetail'])->name('paymentDetail');
    Route::get('payment/{userId}/confirm', [DashboardController::class, 'paymentConfirm'])->name('paymentConfirm');


    Route::resource('categories', CategoryController::class);
    Route::resource('jobs', JobController::class);
    Route::get('job/{id}/cv', [JobController::class, 'cv']);

    Route::post('application/{id}/accept', [JobController::class, 'acceptApplication'])->name('applications.accept');
    Route::post('application/{id}/reject', [JobController::class, 'rejectApplication'])->name('applications.reject');
});

