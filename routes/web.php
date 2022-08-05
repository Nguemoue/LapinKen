<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChienController;
use App\Http\Controllers\LapinController;
use App\Http\Controllers\CailleController;
use App\Http\Controllers\CochonController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\Admin\AdminChienController;
use App\Http\Controllers\Admin\AdminLapinController;
use App\Http\Controllers\Admin\AdminCailleController;
use App\Http\Controllers\Admin\AdminCochonController;
use App\Http\Controllers\Admin\AdminFormationController;

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

Route::get('/',[HomeController::class,"index"])->name("home");
Route::get("/about.html",function(){
    return redirect()->route("about-us");
});
Route::get("/contact.html",function(){
return redirect()->route("contact-us");
});


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

Route::get("formations",[FormationController::class,"index"])->name("formations");


Route::view("test","adminDashboard");

Route::get("lapin/{id}/commander",[LapinController::class,"commander"])->name("lapin.commander");
Route::post("contact-us",[HomeController::class,"contact"])->name("post.contact-us");
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

Route::view("contact-us","contact-us")->name("contact-us");
Route::view("about-us","about-us")->name("about-us");
require __DIR__.'/auth.php';

