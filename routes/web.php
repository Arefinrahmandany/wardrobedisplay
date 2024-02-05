<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\RoleController;
use App\Http\Controllers\Front\Cart\CartController;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\PermissionController;
use App\Http\Controllers\Admin\Products\ProductsController;
use App\Http\Controllers\Front\CheckOut\CheckoutController;
use App\Http\Controllers\Admin\Materials\MaterialController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\MainSlide\MainSlideController;
use App\Http\Controllers\Front\Users\Home\UserPageController;

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

Route::get('/',[HomeController::class, 'index'])->name('home.index');

Route::get('/user-logout',[UserPageController::class, 'userLogout']) -> name('user.logout');


Route::get('/all-products',[HomeController::class, 'products'])->name('home.all-products');

Route::get('/product-detail/{id}',[HomeController::class, 'show'])->name('product-detail.show');



  // Route Group For Logged In user redirect
Route::group(['middleware' => 'user.redirect'],function(){

    // Show Dashboard
    Route::get('/register',[UserPageController::class, 'index'])->name('register.index');
    Route::get('/register-create',[UserPageController::class, 'create'])->name('register.create');
    Route::POST('/register-store',[UserPageController::class, 'store'])->name('register.store');
    Route::POST('/login/{provider}',[UserPageController::class, 'redirectToProvider'])->name('login.redirectToProvider');
    Route::POST('/login/{provider}/callback',[UserPageController::class, 'handleProviderCallback'])->name('login.handleProviderCallback');



});


 // Route Group For Logged In user
Route::group(['middleware' => 'user'],function(){



    Route::get('/register-show/{id}',[UserPageController::class, 'show'])->name('register.show');
    Route::get('/register-edit/{id}',[UserPageController::class, 'edit'])->name('register.edit');
    Route::PUT('/register-update/{id}',[UserPageController::class, 'update'])->name('register.update');

    // Route For Front Page Cart controller
    Route::resource('/cart',CartController::class);
    Route::delete('/cart/{id}/destroy',[CartController::class, 'destroy']) -> name('cart.destroy');
    Route::get('/addCart/{id}',[CartController::class, 'addCart']) -> name('cart.addCart');
    Route::get('/cart-addQuantity/{id}',[CartController::class, 'addQuantity']) -> name('cart.addQuantity');
    Route::get('/cart-minusQuantity/{id}',[CartController::class, 'minusQuantity']) -> name('cart.minusQuantity');

    // Route For Front CheckOut Page controller
    Route::resource('/checkout',CheckoutController::class);

    Route::get('/user/{id}',[UserPageController::class, 'userindex']) -> name('userhome.index');

});




Route::group(['middleware' => 'admin.redirect'],function(){

    Route::get('/login-page',[AdminAuthController::class, 'showloginForm']) -> name('admin.login.form');
    Route::post('/admin-login',[AdminAuthController::class, 'login']) -> name('admin.login');


});

//admin page route

Route::group(['middleware' => 'admin'],function(){

    // user role route
    Route::resource('/user',AdminController::class);

    Route::get('/admin-user-status-update/{id}',[AdminController::class, 'updateStatus'])->name('admin.status.update');
    Route::get('/admin-user-tresh-update/{id}',[AdminController::class, 'updateTrash'])->name('admin.trash.update');

    // Route For Admin Dashboard Logout controller
    Route::get('/admin-logout',[AdminAuthController::class, 'logout']) -> name('admin.logout');

    // user permission route
    Route::resource('/permission',PermissionController::class);

    // user role route
    Route::resource('/role',RoleController::class);



    Route::resource('/dashboard',DashboardController::class);

    // Route For Admin Products controller
    Route::resource('/products',ProductsController::class);

    // Route For Admin Products Brand controller
    Route::resource('/brand',BrandController::class);
    Route::get('/brand/{id}/trash',[BrandController::class, 'trash'])->name('brand.trash');

    // Route For Admin Products Category controller
    Route::resource('/category',CategoryController::class);
    Route::get('/category/{id}/trash',[CategoryController::class, 'trash'])->name('category.trash');

    // Route For Admin Products Material controller
    Route::resource('/material',MaterialController::class);
    Route::get('/material/{id}/trash',[MaterialController::class, 'trash'])->name('material.trash');

    // Route For Front page Main Slide controller
    Route::resource('/mainSlide',MainSlideController::class);
    Route::get('/mainSlide/{id}/trash',[MainSlideController::class, 'trash'])->name('mainSlide.trash');

});
