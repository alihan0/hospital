<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\RoomController;
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

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/', 'index');
    });

    Route::controller(RoomController::class)->group(function(){
        Route::get('/rooms', 'index');
        Route::get('/rooms/new', 'new');
        Route::get('/rooms/detail/{id}', 'detail');

        Route::post('/rooms/create', 'create');
        Route::post('/rooms/empty', 'empty');
        Route::post('/rooms/new-bed', 'new_bed');
        Route::post('/rooms/bed-assigment', 'bed_assigment');
    });

});

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'login_check');
    Route::get('/logout', 'logout')->name('logout');
});


Route::controller(InstallController::class)->prefix('install')->group(function(){
   Route::get('/', 'index')->name('install');
   Route::get('/step-1', 'step_1');
   Route::get('/step-2', 'step_2');
   Route::get('/step-3', 'step_3');
   Route::get('/step-4', 'step_4');
   Route::get('/step-5', 'step_5');
   Route::get('/completed', 'completed');
   Route::get('/complete', 'complete');

   Route::post('/save-1', 'save');
   Route::post('/save-2', 'save_logos');
   Route::post('/save-3', 'save_colors');
   Route::post('/save-4', 'save_user');
});

Route::controller(UploadController::class)->prefix('upload')->group(function(){
    Route::post('/logo', 'logo');
});


Route::get('/change-locale/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('change-locale');