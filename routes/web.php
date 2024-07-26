<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\Admin\RegisterController as RegController;
use App\Http\Controllers\Auth\Admin\LoginController as LogController;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\Auth\customer\RegisterController as CustomerRegController;
use App\Http\Controllers\Auth\customer\LoginController as CustomerLogController;
use App\Models\Admin;

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



//..................Admin URL....................

Route::group(['prefix'=>'admin', 'as' => 'admins.'], function() {
    Route::get('/show_reg',[RegController::class,'showRegistrationForm'])->name('show_reg');
    Route::post('/register',[RegController::class,'register'])->name('register');
    Route::get('/show_log',[LogController::class,'showLoginForm'])->name('show_log');
    Route::get('/logout',[LogController::class,'logout'])->name('logout');
    Route::post('/login',[LogController::class,'login'])->name('login');

});
       
    Route::group(['prefix'=>'admin','as'=>'admins.','middleware' => ['admin']],function(){
        Route::get('/show',[Admincontroller::class,'admin'])->name('show');
        Route::get('/dashbord',[Admincontroller::class,'dashbord'])->name('dashbord');
    
        Route::group(['prefix'=>'product','as'=>'products.'],function(){
            Route::get('/show_add_product',[Admincontroller::class,'show_add_product'])->name('show_pro');
            Route::post('/stor_product',[Admincontroller::class,'store_product'])->name('store_product');
            Route::get('/show_edit_pro/{id}',[Admincontroller::class,'show_edit_pro'])->name('pro_edit');
            Route::put('/update_pro/{id}',[Admincontroller::class,'update_pro'])->name('update_pro');
            Route::get('/show_category',[Admincontroller::class,'show_category'])->name('show_category');
            Route::post('/category',[Admincontroller::class,'store_category'])->name('category');
            Route::get('/edit_category/{id}',[Admincontroller::class,'showedit'])->name('edit_category');
            Route::put('/update_category/{id}',[Admincontroller::class,'category_update'])->name('category_update');
            Route::delete('/delet/{id}',[Admincontroller::class,'delet'])->name('delete');
    
        });
    });





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//.............................Customer url......................................


Route::group(['prefix'=>'customer','as'=>'customers.'],function(){
    Route::get('/show_regi', [CustomerRegController::class, 'showRegistrationForm'])->name('show_regi');
    Route::post('/register', [CustomerRegController::class, 'register'])->name('register');
    Route::get('/show_login', [CustomerLogController::class, 'showLoginForm'])->name('sh_login');
    Route::post('/stor_log', [CustomerLogController::class, 'login'])->name('login');
    Route::post('/logout', [CustomerLogController::class, 'logout'])->name('logout');
});

Route::get('/',[Customercontroller::class,'base'])->name('base');


Route::group(['prefix'=> 'customer','as'=> 'customers.'],function(){

    Route::get('/productshow',[Customercontroller::class,'product'])->name('product');

    Route::get('/cart',[Customercontroller::class,'cart'])->name('cart');
    Route::post('/stor_cart/{id}',[Customercontroller::class,'stor_cart'])->name('stor_cart');
    Route::get('/contact',[Customercontroller::class,'contact']) ->name('contact');

    
});


