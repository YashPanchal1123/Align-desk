<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpMasterController;
use App\Http\Controllers\ProjectMasterController;
use App\Http\Controllers\ProjectTaskMasterController;
use App\Http\Controllers\TeamMasterController;

//EmployeeMaster routes
Route::post('/employees/add', [EmpMasterController::class, 'addEmployee']);
Route::get('/employees', [EmpMasterController::class, 'getAllEmployees']);
Route::get('/employees/{id}', [EmpMasterController::class, 'getEmployeeById']);
Route::put('/employees/update/{id}', [EmpMasterController::class, 'updateEmp']);
Route::delete('/employees/delete/{id}', [EmpMasterController::class, 'deleteEmp']);

//projectMaster routes
Route::post('/project/add', [ProjectMasterController::class, 'addProject']);
Route::get('/projects', [ProjectMasterController::class, 'getAllProjects']);
Route::get('/project/{id}', [ProjectMasterController::class, 'getProjectById']);
Route::put('/project/update/{id}', [ProjectMasterController::class, 'updateProject']);
Route::delete('/project/delete/{id}', [ProjectMasterController::class, 'deleteProject']);

//projectTaskMaster routes
Route::post('/task/add', [ProjectTaskMasterController::class, 'addProjectTask']);
Route::get('/tasks', [ProjectTaskMasterController::class, 'getAllTasks']);
Route::get('/tasks/{id}', [ProjectTaskMasterController::class, 'getTaskById']);
Route::put('/tasks/update/{id}', [ProjectTaskMasterController::class, 'updateTask']);
Route::delete('/tasks/delete/{id}', [ProjectTaskMasterController::class, 'deleteTask']);

//Team_master Routes
Route::post('/team/add', [TeamMasterController::class, 'addTeam']);
Route::get('/team', [TeamMasterController::class, 'getAllTeam']);
Route::get('/team/{id}', [TeamMasterController::class, 'getTeamById']);
Route::put('/team/update/{id}', [TeamMasterController::class, 'updateTeam']);
Route::delete('/team/delete/{id}', [TeamMasterController::class, 'deleteTeam']);