<?php

use App\Http\Controllers\InstallController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(InstallController::class)->prefix('install')->group(function(){
   Route::get('/', 'index')->name('install');
   Route::get('/step-1', 'step_1');
   Route::get('/step-2', 'step_2');
   Route::get('/step-3', 'step_3');

   Route::post('/save-1', 'save');
   Route::post('/save-2', 'save_logos');
});

Route::controller(UploadController::class)->prefix('upload')->group(function(){
    Route::post('/logo', 'logo');
});