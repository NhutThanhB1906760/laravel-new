<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/form', function () {
    return view('form');
});
Route::get('/testBlade', function () {
    return view('test');
});
Route::get('/editForm/{id}', [HomeController::class ,'getProduct']);
Route::put('/edit/{id}', [HomeController::class ,'updateProduct']);
Route::get('/formProduct', [HomeController::class ,'next'])->middleware('admin');
Route::post('/login', [HomeController::class ,'login']);
Route::get('/logout', [HomeController::class ,'logout']);
Route::post('/add', [HomeController::class ,'add']);
Route::get('/product', [HomeController::class ,'getdata']);
Route::delete('/delete/{id}', [HomeController::class ,'delete']);