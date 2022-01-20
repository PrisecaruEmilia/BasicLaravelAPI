<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentClassController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/class', [StudentClassController::class, 'index']);
Route::post('/class/store', [StudentClassController::class, 'store']);
Route::get('/class/{id}', [StudentClassController::class, 'show']);
Route::get('/class/edit/{id}', [StudentClassController::class, 'edit']);
Route::post('/class/update/{id}', [StudentClassController::class, 'update']);
Route::get('/class/delete/{id}', [StudentClassController::class, 'delete']);
