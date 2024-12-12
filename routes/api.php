<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CEOMasterController; //controller define


Route::post('/ceomaster/add', [CEOMasterController::class, 'addCEO']);
Route::get('/ceomaster', [CEOMasterController::class, 'getCEO']);
Route::get('/ceomaster/{id}', [CEOMasterController::class, 'getCEOById']);
Route::put('/ceomaster/update/{id}', [CEOMasterController::class, 'updateCEO']);