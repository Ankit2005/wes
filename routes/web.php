<?php

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

Route::get('/login', function () {
    return view('account/login');
});

Route::get('/', function () {
    return view('account/register');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('congratulations');
});


Route::post('/dumy','test@result');


// Route::get('/api/company', function () {
//     return view('congratulations');
// });
