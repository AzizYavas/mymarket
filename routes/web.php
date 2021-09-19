<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\FarmerController;
use App\Http\Controllers\admin\HomePageController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\MarketController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeCategoryController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Mail\FarmerRegisterMail;
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


Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login-page');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'registerSave'])->name('register-save');

    Route::middleware('auth')->group(function () {

        Route::get('/index', [HomePageController::class, 'index'])->name('index');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        //KATEGORİLER
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::get('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/save', [CategoryController::class, 'save'])->name('category.save');
        Route::get('/category/subedit', [CategoryController::class, 'subedit'])->name('category.subedit');
        Route::post('/category/subsave', [CategoryController::class, 'subsave'])->name('category.subsave');
        Route::get('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/category/subdelete', [CategoryController::class, 'subdelete'])->name('category.subdelete');
        Route::get('/category/subcategoryedit', [CategoryController::class, 'subcategoryedit'])->name('category.subcategoryedit');
        Route::post('/category/subcategorysave', [CategoryController::class, 'subcategorysave'])->name('category.subcategorysave');

        //ÇİFTÇİLER
        Route::get('/farmer', [FarmerController::class, 'index'])->name('farmer');
        Route::get('/farmer/edit', [FarmerController::class, 'edit'])->name('farmer.edit');
        Route::post('/farmer/save', [FarmerController::class, 'save'])->name('farmer.save');
        Route::get('/farmer/delete', [FarmerController::class, 'delete'])->name('farmer.delete');


        //MARKETLER
        Route::get('/market', [MarketController::class, 'index'])->name('market');
        Route::get('/market/edit', [MarketController::class, 'edit'])->name('market.edit');
        Route::post('/market/save', [MarketController::class, 'save'])->name('market.save');
        Route::get('/market/delete', [MarketController::class, 'delete'])->name('market.delete');

        //ÜRÜNLER
        Route::get('/product', [ProductController::class, 'index'])->name('product');
        Route::get('/product/delete', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/product/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

    });

});


Route::get('/', [AnasayfaController::class, 'index'])->name('homepage');
Route::get('/category/{category_slug}', [HomeCategoryController::class, 'index'])->name('category');
Route::get('/product/{slug_product}', [HomeProductController::class, 'index'])->name('product');
Route::get('/farmerproduct', [HomeProductController::class, 'farmerproduct'])->name('farmerproduct');
Route::get('/farmerproductedit', [HomeProductController::class, 'farmerproductedit'])->name('farmerproductedit');



Route::get('/allorder', [OrderController::class, 'index'])->name('allorder');
Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order');

Route::prefix('user')->name('user.')->group(function () {

    //farmer
    Route::get('/loginfarmerform', [UserController::class, 'loginfarmer_form'])->name('loginfarmerform');
    Route::post('/loginfarmer', [UserController::class, 'loginfarmer'])->name('loginfarmer');
    Route::get('/registerfarmer', [UserController::class, 'registerfarmer_form'])->name('registerfarmerform');
    Route::post('/registerfarmer', [UserController::class, 'registerfarmer_save'])->name('registerfarmerformsave');
    /* Route::get('/farmerupdateform', [UserController::class, 'farmerupdateform'])->name('farmerupdateform');
     Route::post('/farmerupdateform', [UserController::class, 'farmerupdate'])->name('farmerupdate');*/
    Route::post('/farmerout', [UserController::class, 'farmerout'])->name('farmerout');
    Route::get('/activate/{farmkey}', [UserController::class, 'activate'])->name('activate');

    //market
    Route::get('/loginmarketform', [UserController::class, 'loginmarket_form'])->name('loginmarketform');
    Route::post('/loginmarket', [UserController::class, 'loginmarket'])->name('loginmarket');
    Route::get('/registermarket', [UserController::class, 'registermarket_form'])->name('registermarketform');
    Route::post('/registermarket', [UserController::class, 'registermarket_save'])->name('registermarketformsave');
    Route::post('/marketout', [UserController::class, 'marketout'])->name('marketout');
    Route::get('/marketactivate/{marketkey}', [UserController::class, 'marketactivate'])->name('marketactivate');

} );

Route::prefix('sepet')->name('sepet.')->group(function () {
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    Route::post('/add', [BasketController::class, 'add'])->name('add');
    Route::delete('/delete/{rowid}', [BasketController::class, 'basketdelete'])->name('delete');
    Route::delete('/unload', [BasketController::class, 'basketunload'])->name('unload');
    Route::patch('/update/{rowid}', [BasketController::class, 'update'])->name('update');
});
