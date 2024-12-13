<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CEOMasterController; //controller define
use App\Http\Controllers\ManagerMasterController; //controller define
use  App\Http\Controllers\AuthController; //controller define


//CEOMasterController routes define
Route::post('/ceomaster/add', [CEOMasterController::class, 'addCEO']);
Route::get('/ceomaster', [CEOMasterController::class, 'getCEO']);
Route::get('/ceomaster/{id}', [CEOMasterController::class, 'getCEOById']);
Route::put('/ceomaster/update/{id}', [CEOMasterController::class, 'updateCEO']);
Route::delete('/ceomaster/delete/{id}', [CEOMasterController::class, 'deleteCEO']);

//ManagerMasterController routes define
Route::post('/managermaster/add', [ManagerMasterController::class, 'addManager']);
Route::get('/managermaster', [ManagerMasterController::class, 'getManager']);
Route::get('/managermaster/{id}', [ManagerMasterController::class, 'getManagerById']);
Route::put('/managermaster/update/{id}', [ManagerMasterController::class, 'updateManager']);
Route::delete('/managermaster/delete/{id}', [ManagerMasterController::class, 'deleteManager']);

//CEOLOGIN_MASTER routes define for register
Route::post('/ceoregister', [AuthController::class, 'register']);
//CEOLOGIN_MASTER routes define for login
Route::post('/ceologin', [AuthController::class, 'login']);	

//MANAGERLOGIN_MASTER routes define for register
Route::post('/managerregister', [AuthController::class, 'manager_register']);
//MANAGERLOGIN_MASTER routes define for login
Route::post('/managerlogin', [AuthController::class, 'manager_login']);	