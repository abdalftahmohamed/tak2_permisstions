<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
//Route::group(['middleware'=>'auth','check_user'],function () {
////    Route::get('role',function (){
////       $user = Auth::user();
////       if ($user->hasrole('author')){
////           dd('author');
////       }
////    });
//});
Route::get('dashboard',[HomeController::class,'dashboard'])->middleware('auth')->name('dashboard');

Route::group(['middleware'=>['check_user']],function () {
    Route::resource('invoices','\App\Http\Controllers\InvoicesController');
    Route::resource('sections','\App\Http\Controllers\SectionsController');
    Route::resource('products','\App\Http\Controllers\ProductsController');
    Route::resource('users','\App\Http\Controllers\UserController');
    Route::resource('roles','\App\Http\Controllers\roleController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
   Route::namespace('Auth')->middleware('guest:admin')-> group(function (){
       //login Route
       Route::get('login',[AuthenticatedSessionController::class,'create'])->name('login');
       Route::post('login',[AuthenticatedSessionController::class,'store'])->name('adminlogin');
   });
    Route::group(['middleware'=>['check_user']],function () {
        Route::get('dashboard',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('dashboard');
    });
    Route::post('logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');
    Route::get('inviocespayed',[\App\Http\Controllers\Admin\HomeController::class,'inviocespayed'])->name('inviocespayed');
});

require __DIR__.'/auth.php';

