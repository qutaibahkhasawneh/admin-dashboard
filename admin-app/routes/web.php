<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\AdminController;
use App\http\controllers\UserController;
use App\http\controllers\RoleController;

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
    return view('auth.login');
});

Route::group(['middleware'=>['admin']],function(){

// ****** Admin routes for register & login

Route::get('/login',[AdminController::class,'login']);
Route::get('/register',[AdminController::class,'register']);
Route::post('/register-admin',[AdminController::class,'registerAdmin'])->name('register_admin');
Route::post('/login-admin',[AdminController::class,'loginAdmin'])->name('login_admin');
Route::get('/logout',[AdminController::class,'logout'])->name('signUp');

// Admin routes for users

Route::get('/dashboard',[UserController::class,'showDashboard'])->name('dashboard');
Route::get('/users',[UserController::class,'index'])->name('all_user');
Route::get('/create-user',[UserController::class,'create'])->name('create_user');
Route::post('/added_user',[UserController::class,'store'])->name('added_user');
Route::get('/edit_user/{id}',[UserController::class,'edit'])->name('edit_user');
Route::post('/update_user',[UserController::class,'update'])->name('update_user');
Route::get('/delete_user/{id}',[UserController::class,'destroy'])->name('delete_user');

// Admin routes for roles

Route::get('/roles',[RoleController::class,'index'])->name('all-roles');
Route::get('/create',[RoleController::class,'create'])->name('create-roles');
Route::post('/added_roles',[RoleController::class,'store'])->name('added-roles');
Route::get('/edit_role/{id}',[RoleController::class,'edit'])->name('edit-role');
Route::post('/update_role',[RoleController::class,'update'])->name('update-role');
Route::get('/delete_role/{id}',[RoleController::class,'destroy'])->name('delete-role');

});



