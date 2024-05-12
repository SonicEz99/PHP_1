<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\RegisterController;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('register', function () {
    return view('register');
});

Route::post('/register/add',[userController::class , 'register'] )->name('register.add');

Route::delete('/showData/delete/{id}',[userController::class , 'destroy'] )->name('user.delete');

Route::get('/showData',[userController::class , 'showData'] )->name('user.data');

Route::get('/showEditForm/{id}',[userController::class , 'showEdit'] )->name('user.editform');

Route::put('/showEditForm/update/{id}',[userController::class , 'update'] )->name('user.update');




