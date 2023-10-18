<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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




Route::get("/login" , [AuthManager::class , "login"])->name("login");
Route::post("/login" , [AuthManager::class , "loginPost"])->name("login.post");

Route::get("/registration" , [AuthManager::class, "registration"])->name("registration");
Route::post("/registration" , [AuthManager::class, "registrationPost"])->name("registration.post");

Route::get("/logout" , [AuthManager::class, "logout"])->name("logout");

Route::get("/acountsettings" , [AuthManager::class, "Showacountsettings"])->name("acountsettings");
Route::post("/acountsettings" , [AuthManager::class, "UpdateAcountsettings"])->name("acountsettings.post");



Route::group(["middleware" => "auth"], function(){
    Route::get('/home', function () {
        return view('welcome');
    })->name("home");
});

Route::group(["middleware" => "auth"], function () {
    Route::get('/admin', [AuthManager::class, "admin"])->name("admin");
});





