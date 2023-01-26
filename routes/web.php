<?php

use App\Http\Controllers\Admin\ModuleController;
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
    Route::get('/master', [HomeController::class, 'master']);

   ///grupo admin
    Route::prefix('admin')->name('admin.')->group(function(){

        Route::prefix('operations')->name('operations.')->group(function(){
            Route::get('index',[OperationController::class,'index'])->name('index');
            Route::delete('delete-operation/{id}',[OperationController::class,'destroy']);
            Route::get('edit-operation/{id}',[OperationController::class,'edit']);
            Route::put('update-operation/{id}',[OperationController::class,'update']);
            Route::put('add-operation',[OperationController::class,'store']); 
        });
        Route::prefix('modules')->name('modules.')->group(function(){
            Route::get('index',[ModuleController::class,'index'])->name('index');
            Route::delete('delete-module/{id}',[ModuleController::class,'destroy']);
            Route::get('edit-module/{id}',[ModuleController::class,'edit']);
            Route::put('update-module/{id}',[ModuleController::class,'update']);
            Route::put('add-module',[ModuleController::class,'store']); 
            Route::get('list-operations/{id}',[ModuleController::class,'listOperations']);
            Route::put('store-operations/{id}',[ModuleController::class,'storeOperations']); 
        });


    });