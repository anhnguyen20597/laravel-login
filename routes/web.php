<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
//welcomeのホームページを表示
Route::get('/', function () {
    return view('welcome');
});

//login画面を表示
Route::get('/login',[CustomAuthController::class,'login']);


//Userを申し込む画面
Route::get('/registration',[CustomAuthController::class,'registration']);

Route::get('/usermanagement',[CustomAuthController::class,'show']);

Route::get('/logout',[CustomAuthController::class,'logout'
])->name('logout-user');
//
Route::post('/register-user',[CustomAuthController::class,'registerUser'
])->name('register-user');

//
Route::post('/login-user',[CustomAuthController::class,'loginUser'
])->name('login-user');

Route::get('/delete/{id}',[CustomAuthController::class,'delete']);