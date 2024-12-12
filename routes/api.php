<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpMasterController;

Route::post('/employees/add', [EmpMasterController::class, 'addEmployee']);
Route::get('/employees', [EmpMasterController::class, 'getAllEmployees']);
Route::get('/employees/{id}', [EmpMasterController::class, 'getEmployeeById']);
Route::put('/employees/update/{id}', [EmpMasterController::class, 'updateEmp']);