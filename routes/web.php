<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BierManager;


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

Route::group(["middleware" => "auth"] , function(){
    Route::get("/home" , [AuthManager::class ,"homeAssortiment"])->name("home");
});



Route::group(["middleware" => "adminChecker"], function () {
    Route::get('/admin', [AuthManager::class, "admin"])->name("admin");

    Route::get('/beers/{id}/edit', [BierManager::class, "showBeerUpdate"])->name("showUpdate"); // Show the edit form
    Route::post('/beers/{id}/update',[BierManager::class, "BeerUpdatePost"])->name("beer.update");

    Route::get("/addBier" , [BierManager::class, "addBierShow"])->name("showAddBier");
    Route::post("/addBier/post" , [BierManager::class, "addBierPost"])->name("AddBier.POST");


    Route::get("/beer/delete/{id}" , [BierManager::class, "deleteBier"])->name("deleteBier");


    Route::get('adminify',[AuthManager::class, "adminifyShow"])->name("adminifyShow");
    Route::post('/update-user-role/{id}', [AuthManager::class, "adminifyShowPost"])->name('adminify.post');
    Route::get('/delete-user-role/{id}', [AuthManager::class, 'deleteUser'])->name('adminify.delete');

    Route::post('/beers/{id}/update',[BierManager::class, "BeerUpdatePost"])->name("beer.update");

});





