<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\SubjectController;
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

Route::get('/subject', [SubjectController::class, 'index']);
Route::post('/subject/store', [SubjectController::class, 'store']);
Route::get('/subject/{id}', [SubjectController::class, 'show']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);
Route::post('/subject/update/{id}', [SubjectController::class, 'update']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']);


Route::get('/section', [SectionController::class, 'index']);
Route::post('/section/store', [SectionController::class, 'store']);
Route::get('/section/{id}', [SectionController::class, 'show']);
Route::get('/section/edit/{id}', [SectionController::class, 'edit']);
Route::post('/section/update/{id}', [SectionController::class, 'update']);
Route::get('/section/delete/{id}', [SectionController::class, 'delete']);
