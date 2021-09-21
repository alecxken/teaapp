<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\FarmerController;

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
    return redirect('home');
});

Auth::routes();

Route::get('/admin', [UserController::class, 'index'])->name('admin');

Route::get('/manage-roles',[UserController::class, 'viewroles'])->name('create.client');

Route::get('/employee', [UserController::class, 'employee'])->name('user.employee');

Route::get('/create_user', [UserController::class, 'createuser'])->name('user.creates');

Route::get('/user_create', [UserController::class, 'usercreate'])->name('create.user');

Route::post('profile_update', [UserController::class, 'profileupdate'])->name('profile.upload');

Route::get('image/{img_name}', [UserController::class, 'products_disp_data'])->name('image.display_img_name');

Route::post('/update-users', [UserController::class, 'user_update'])->name('users.update');

Route::post('/store-users', [UserController::class, 'user_store'])->name('users.store');

Route::get('/get-user-info/{id}', [UserController::class, 'userinfo']);

Route::post('/roles_store', [UserController::class, 'roles_store'])->name('roles.store');

Route::post('/users_update', [UserController::class, 'user_update'])->name('user.update');

Route::get('/get-user/{id}', [UserController::class, 'get_user'])->name('roles.destroy');

Route::get('/user_destroy/{id}', [UserController::class, 'user_destroy'])->name('user.destroy');

Route::get('/roles_destroy/{id}', [UserController::class, 'destroy'])->name('roles.destroy');

Route::post('/permissions_store', [UserController::class, 'permissions_store'])->name('permissions.store');

Route::get('getusersnow', [UserController::class, 'anyData'])->name('get.users');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('sendmessage', [FarmerController::class, 'sendmessage'])->name('get.sendmessage');



Route::get('new-collection', [FarmerController::class, 'newcollection'])->name('get.collection');

Route::get('new-payment', [FarmerController::class, 'newpayment'])->name('get.payment');

Route::get('get-payment', [FarmerController::class, 'getpayments'])->name('index.payment');


Route::post('/store-payment', [FarmerController::class, 'storepayment'])->name('payment.store');

Route::post('/store-collection', [FarmerController::class, 'storecollection'])->name('collection.store');

Route::get('get-collection', [FarmerController::class, 'getcollections'])->name('index.collections');

Route::get('new-farmer', [FarmerController::class, 'newfarmer'])->name('get.farmers');

Route::get('get-farmer', [FarmerController::class, 'getfarmer'])->name('index.farmers');

Route::post('/store-farmer', [FarmerController::class, 'storefarmer'])->name('farmers.store');

Route::get('getusersnow', [UserController::class, 'anyData'])->name('get.users');