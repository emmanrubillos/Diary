<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiariesController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\ApprovalRequestController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/not-authorized', function(){
    return view('auth.not-authorized');
})->name('not-authorized');

Route::middleware('checkRouteAccess')->group(function (){
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::resource('/diary',DiariesController::class);
    
    Route::resource('/documentation',DocumentationController::class);
    
    Route::resource('/approvalrequest',ApprovalRequestController::class);
    
    Route::resource('/user',UserController::class);

    Route::get('/print/approval-requests/{id}',[App\Http\Controllers\ApprovalRequestController::class, 'print'])->name('approval-requests.print');

    Route::put('/approve/approval-requests/{id}',[App\Http\Controllers\ApprovalRequestController::class, 'approve'])->name('approval-requests.approve');

    Route::put('/reject/approval-requests/{id}',[App\Http\Controllers\ApprovalRequestController::class, 'reject'])->name('approval-requests.reject');
    
});
