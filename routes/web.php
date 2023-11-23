<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
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


// ----Start---admin
// Route::prefix('admin')->name('admin')->middleware('checkLogin:admin')->group(function () {
//     Route::get('index', [AdminController::class, 'adminindex']);
//     Route::get('dashboard', [AdminController::class, 'showdashboard']);
//     Route::post('admin-dashboard', [AdminController::class, 'dashboard']);
//     Route::get('logout', [AdminController::class, 'logout']);
//     Route::get('manager_order', [AdminController::class, 'managerOder']);
//     Route::get('view_order/{order_id}', [AdminController::class, 'viewOrder']);

//     Route::get('index', [AdminController::class, 'adminindex']);
//     Route::get('customer', [AdminController::class, 'users']);
//     Route::get('staff', [AdminController::class, 'staff']);
//     Route::get('displayAddUser', [AdminController::class, 'displayAddUser']);
//     Route::post('addUser', [AdminController::class, 'addUser']);
//     Route::get('resetPassword/{id}', [AdminController::class, 'resetPassword']);
//     Route::get('details/{id}', [AdminController::class, 'details'])->name('profile');


// });

//login google
Route::get('login/google', [AccountController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AccountController::class, 'handleGoogleCallback']);

// route cho tat ca cac trang nguoi dung
// ----Start---
Route::get('home',[AccountController::class,'home']);

Route::get('store',[AccountController::class,'store']);
Route::get('user/page-items/checkout',[AccountController::class,'checkout']);
Route::get('sign',[AccountController::class,'sign']);
Route::get('user/page-items/login',[AccountController::class,'login']);
Route::get('user/page-items/login-checkout',[AccountController::class,'checkoutLogin']);

Route::get('user/page-items/success_order',[AccountController::class,'successOrder']);

//---- END---

// route cho tat ca cac trang nguoi quan ly
// ----Start---
Route::get('admin/index', [AdminController::class, 'adminindex']);
Route::get('admin/dashboard', [AdminController::class, 'showdashboard']);
Route::post('admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('logout', [AdminController::class, 'logout']);


// admin-dashboard: dang nhu 1 cai ham
// check out
Route::get('login_checkout', [CheckoutController::class, 'logincheckout']);
Route::get('logout_checkout', [CheckoutController::class, 'logoutcheckout']);
Route::get('checkout', [CheckoutController::class, 'checkout']);
Route::post('add_customer', [CheckoutController::class, 'addCustomer']);
Route::post('customer_information', [CheckoutController::class, 'customerInformation']);
Route::post('save_customer_shipping', [CheckoutController::class, 'saveCustomerShipping']);
Route::post('update_customer/{customer_id}',[CheckoutController::class,'updateCustomer']);
// Route::post('checkLogin', [CheckoutController::class, 'checkLogin']);

//---- END---


// Start//---Products---///
Route::get('product',[ProductController::class,'product']);
Route::get('ASCproduct',[ProductController::class,'ascproducts']);
Route::get('DESproduct',[ProductController::class,'descproducts']);
Route::get('view-favourite',[ProductController::class,'viewfavourite']);
Route::get('view-product/{id}',[ProductController::class,'viewproduct']);
Route::get('category',[ProductController::class,'category']);

Route::post('load-comment',[ProductController::class,'loadComment']);
Route::post('send-comment',[ProductController::class,'sendComment']);
Route::get('admin/comment_admin',[ProductController::class,'admin_comment_save']);
Route::post('allow_comment',[ProductController::class,'allowComment']);
Route::post('reply_comment',[ProductController::class,'replyComment']);



    //phan cua admin
    Route::get('index', [ProductController::class, 'index']);
    Route::get('adminproductmanage', [ProductController::class, 'adminproductmanage']);
    Route::get('productinsert', [ProductController::class, 'insert']);
    Route::post('insertPost', [ProductController::class, 'insertPost']);
    Route::get('productupdate/{product_id}', [ProductController::class, 'update']);
    Route::post('updatePost/{id}',  [ProductController::class, 'updatePost']);
    Route::get('delete/{id}', [ProductController::class, 'delete']);
// END

// Start//---Cart ---///

// Route::get('/AddCart/{prod_id}', [CartController::class, 'AddCart']);


Route::get('show_cart',[CartController::class,'show_cart']);
Route::post('save_cart',[CartController::class,'save_cart']);
Route::post('update_cart_quantity',[CartController::class,'update_cart_quantity']);
Route::get('delete-to-cart/{rowId}',[CartController::class,'deleteTocart']);

// END

// Start//---Category ---///

Route::get('submenu/{category_id}',[CategoryController::class,'submenu']);
Route::get('ascproducts_category/{category_id}',[CategoryController::class,'ascproducts_category']);
Route::get('desproducts_category/{category_id}',[CategoryController::class,'desproducts_category']);

// END
// Start//---Order ---///

Route::get('admin/manager_order', [OrderController::class, 'managerOder']);
Route::get('admin/view_order/{order_code}', [OrderController::class, 'viewOrder']);
Route::get('admin/update/{order_code}', [OrderController::class, 'Update']);
Route::post('update_status', [OrderController::class, 'updateStatus']);

// END
// Start//---User-information ---///
Route::get('user-infromation/{customer_id}',[HistoryController::class,'userinformation']);
Route::get('menu_order/{order_code}',[HistoryController::class,'menuOrder']);
Route::get('delete_order/{order_code}',[HistoryController::class,'DeleteOrder']);

Route::get('order_detail_user/{order_code}',[HistoryController::class,'OrderDetailUser']);
Route::get('admin/feedback_admin',[HistoryController::class,'admin_feedback_save']);
Route::post('load-feedback',[HistoryController::class,'loadfeedback']);
Route::post('send-feedback',[HistoryController::class,'sendfeedback']);
Route::post('allow_feedback',[HistoryController::class,'allowfeedback']);
Route::post('reply_feedback',[HistoryController::class,'replyfeedback']);
Route::post('load-rating',[HistoryController::class,'starFeedback']);
Route::post('insert-rating',[HistoryController::class,'insertRating']);
Route::post('send_feedback/{product_id}',[HistoryController::class,'sendFeedback']);
Route::post('showDetailorder',[HistoryController::class,'showDetailorder']);


// END
