<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CEO_LOGIN_MASTERController;  //import ceo_l_m
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


Route::resource('ceologinmaster',CEO_LOGIN_MASTERController::class);