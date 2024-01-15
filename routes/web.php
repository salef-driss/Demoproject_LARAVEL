<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BierManager;
use App\Http\Controllers\Winkelkar;
use App\Http\Controllers\OrderManager;
use App\Http\Controllers\NewsManager;
use App\Http\Controllers\FAQManager;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ForgetPasswordManager;






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
Route::get("/forgetPassword" , [ForgetPasswordManager::class, "forgetPassword"])->name("forgot.password");
Route::post("/forgetPassword" , [ForgetPasswordManager::class, "forgetPasswordPost"])->name("forgot.password.Post");
Route::get("/resetPassword/{token}", [ForgetPasswordManager::class , "resetPassword"])->name("reset.password");
Route::post("/reste-password",[ForgetPasswordManager::class , "resetPasswordPost"])->name("reste.password.post");

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group(["middleware" => "auth"] , function(){
    Route::get("/home" , [AuthManager::class ,"homeAssortiment"])->name("home");
    Route::get("/bestell/{id}" , [BierManager::class, "showBestelling"])->name("showBestelling");
    Route::post("/add-to-cart/{bier_id}", [BierManager::class, "addToCart"])->name("addToCart");
    Route::get("/winkelkar" , [Winkelkar::class , "showWinkelkar"])->name("showWinkelkar");
    Route::get('/winkelkar/delete/{id}', [Winkelkar::class, 'deleteFromCart'])->name('deleteFromCart');
    Route::Post('/OrdersPost', [OrderManager::class, 'createOrder'])->name('createOrder');
    Route::get('/Orders', [OrderManager::class, 'showOrders'])->name('showOrders');
    Route::get("/News" , [NewsManager::class, "showNews"])->name("showNews");

    Route::get("/FAQCategorie" , [FAQManager::class, "showFAQCategorie"])->name("FAQCategorie");
    Route::get("/FAQQuestions/{id}" , [FAQManager::class , "showFAQQuestions"])->name("FAQQuestionsGet");
    Route::get("/ContactForm" , [ContactFormController::class , "ContactFormShow"])->name("ContactForm");
    Route::get("/ContactFomrCreate", [ContactFormController::class , "ContactFormCreate"])->name("ContactFormCreaet");
    Route::get("/AboutBronnen", [AuthManager::class , "AboutBronnen"])->name("AboutBronnen");
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
    Route::post('/Orders/{id}/update',[OrderManager::class, "OrderUpdate"])->name("OrderUpdate");
    Route::post("/AddNews",[NewsManager::class, "CreateNews"])->name("NewsAddPost");
    Route::get("/News/delete/{id}" ,[NewsManager::class, "DeleteNews"])->name("DeleteNewsPost");

    Route::get("/News/Update/{id}",[NewsManager::class, "showUpdateNews"])->name("UpdateNews");
    Route::post("/News/Update/{id}", [NewsManager::class,"UpdateNewsPost"])->name("Update_News_Post");

    Route::post("/FAQCategorie/Create" , [FAQManager::class, "createFAQ"])->name("FAQCreate");
    Route::get("/FAQCategorie/Delete/{id}", [FAQManager::class, "DeleteFAQ"])->name("FAQDelete");
    Route::get("/FAQCategorie/update/{id}" , [FAQManager::class, "FAQUpdateGet"])->name("FAQUpdateGET");

    Route::post("/FAQCategorie/updatePost/{id}" , [FAQManager::class, "FAQUpdatePOST"])->name("FAQUpdatePost");
    Route::get("/FAQQuestion/Delete/{id}" , [FAQManager::class , "FAQQuestionDelete"])->name("FAQQuestionDelete");
    Route::post("/FAQQuestion/Create/{id}" , [FAQManager::class , "FAQCreate"])->name("FAQQuestionCreate");
    Route::get("/FAQQuestion/Update/{id}" , [FAQManager::class , "FAQQuestionUpdateShow"])->name("FAQQuestion_Update_show");
    Route::post("/FAQQuestion/UpdatePost/{id}" , [FAQManager::class , "FAQQuestionUpdatePOST"])->name("FAQQuestion_Update_Post");

    Route::get("/ContactForm/Delete/{id}", [ContactFormController::class , "ContactFormDelete"])->name("ContactFormDelete");
});





