<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Dashboard' , 'middleware' => 'auth:admin'],function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::group(['prefix' => 'settings'],function (){
        Route::get('shipping-methods/{type}',[SettingsController::class,'editShippingMethod'])->name('edit.shipping.methods');
        Route::put('shipping-methods/{id}',[SettingsController::class,'updateShippingMethod'])->name('update.shipping.methods');
    });
});

Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin'],function (){
    Route::get('login',[LoginController::class,'login'])->name('admin.login');
    Route::post('login',[LoginController::class,'loginPost'])->name('admin.login.post');
});
