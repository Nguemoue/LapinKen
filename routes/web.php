<?php

use App\Http\Controllers\Admin\AdminCailleController;
use App\Http\Controllers\Admin\AdminChienController;
use App\Http\Controllers\Admin\AdminCochonController;
use App\Http\Controllers\Admin\AdminFormationController;
use App\Http\Controllers\Admin\AdminLapinController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CailleController;
use App\Http\Controllers\ChienController;
use App\Http\Controllers\CochonController;
use App\Http\Controllers\LapinController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|P
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("index");
})->name("home");



// routes des lapins
Route::get("lapin",[LapinController::class,"index"])->name("lapin");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// route des cochons
Route::get("cochons",[CochonController::class,"index"])->name("cochons");

Route::get("cailles",[CailleController::class,"index"])->name("cailles");
// route des caills

// routes des chiens
Route::get("chiens",[ChienController::class,"index"])->name("chiens");

Route::view("test","adminDashboard");

Route::get("admin",[AdminController::class,"index"])->name("admin");
// route pour l'administration
Route::group(["middleware"=>"admin","as"=>"admin.","prefix"=>"admin"],function(){
    Route::post('profile/update',[AdminController::class,"updateProfile"])->name("profile.update");
    Route::post('password/update',[AdminController::class,"updateProfile"])->name("password.update");

    // admin des lapins
    Route::resource("lapins",AdminLapinController::class);
    // admin des chiens
    Route::resource("chiens",AdminChienController::class);

    Route::resource("cailles",AdminCailleController::class);

    Route::resource("cochons",AdminCochonController::class);

    Route::resource("formations",AdminFormationController::class);


});

require __DIR__.'/auth.php';

