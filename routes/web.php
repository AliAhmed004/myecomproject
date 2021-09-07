<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sym', function () {
  Artisan::call('storage:link');
});
//------------ Admin--Login--Routes------------
Route::get('admin',[AdminController::class,'index']);
Route::post('admin',[AdminController::class,'login_auth']);


Route::group(['middleware'=>'admin_auth'], function () {
    //------------ Dashboard------------
    Route::get('admin/dashboard',[dashboardController::class,'index']);
    //---------- Category ------------
    Route::get('admin/category',[categoryController::class,'show']);
    Route::get('admin/category/manage_category/{id?}',[categoryController::class,'manage_category']);
    Route::post('admin/category/manage_category',[categoryController::class,'manage_category_process']);
    Route::get('admin/category/manage_category/{id}/status/{status_value}',[categoryController::class,'status']);
    
    Route::get('admin/category/delete_category/{id}',[categoryController::class,'delete_category']);
    
     //---------- Coupon ------------
     Route::get('admin/coupon',[CouponController::class,'show']);
     Route::get('admin/coupon/manage_coupon/{id?}',[CouponController::class,'manage_coupon']);
     Route::post('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon_process']);
     Route::get('admin/coupon/manage_coupon/{id}/status/{status_value}',[CouponController::class,'status']);
     Route::get('admin/coupon/delete_coupon/{id}',[CouponController::class,'delete_coupon']);
      //---------- Size ------------
      Route::get('admin/size',[SizeController::class,'show']);
      Route::get('admin/size/manage_size/{id?}',[SizeController::class,'manage_size']);
      Route::post('admin/size/manage_size',[SizeController::class,'manage_size_process']);
      Route::get('admin/size/manage_size/{id}/status/{status_value}',[SizeController::class,'status']);
      Route::get('admin/size/delete_size/{id}',[SizeController::class,'delete_size']);
        //---------- Color ------------
        Route::get('admin/color',[ColorController::class,'show']);
        Route::get('admin/color/manage_color/{id?}',[ColorController::class,'manage_color']);
        Route::post('admin/color/manage_color',[ColorController::class,'manage_color_process']);
        Route::get('admin/color/manage_color/{id}/status/{status_value}',[ColorController::class,'status']);
        Route::get('admin/color/delete_color/{id}',[ColorController::class,'delete_color']);
          //---------- Product ------------
          Route::get('admin/product',[ProductController::class,'show']);
          Route::get('admin/product/manage_product/{id?}',[ProductController::class,'manage_product']);
          Route::post('admin/product/manage_product',[ProductController::class,'manage_product_process']);
          Route::get('admin/product/manage_product/{id}/status/{status_value}',[ProductController::class,'status']);
          Route::get('admin/product/delete_attr/{id}/{pid}',[ProductController::class,'delete_attribute']);
          Route::get('admin/product/delete_product/{id}',[ProductController::class,'delete_product']);
          Route::get('admin/product/single_img_delete/{id}/{pid}',[ProductController::class,'delete_single_img']);
           //---------- Brand ------------
     Route::get('admin/brand',[BrandController::class,'show']);
     Route::get('admin/brand/manage_brand/{id?}',[BrandController::class,'manage_brand']);
     Route::post('admin/brand/manage_brand',[BrandController::class,'manage_brand_process']);
     Route::get('admin/brand/manage_brand/{id}/status/{status_value}',[BrandController::class,'status']);
     Route::get('admin/brand/delete_brand/{id}',[BrandController::class,'delete_brand']);
    //------------ admin logout------------
Route::get('/logout',[AdminController::class,'admin_logout']);
});








