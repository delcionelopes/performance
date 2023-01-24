<?php

use App\Http\Controllers\Admin\OperationController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

   ///grupo admin
    Route::prefix('admin')->name('admin.')->group(function(){

        Route::prefix('operations')->name('operations.')->group(function(){
            Route::get('index',[OperationController::class,'index'])->name('index');
            Route::delete('delete-operation/{id}',[OperationController::class,'destroy']);
            Route::get('edit-operation/{id}',[OperationController::class,'edit']);
            Route::put('update-operation/{id}',[OperationController::class,'update']);
            Route::put('add-operation',[OperationController::class,'store']); 
        });


    });