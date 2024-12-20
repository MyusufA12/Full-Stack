<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/master', [RequestController::class, 'master'])->name('master');
Route::get('/home', [RequestController::class, 'home'])->name('home');
Route::get('/about', [RequestController::class, 'about'])->name('about');
Route::get('/contact', [RequestController::class, 'contact'])->name('contact');
Route::post('/post-request', [RequestController::class, 'postRequest']);
Route::get('/get-request', [RequestController::class, 'getRequest']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::apiResource('dosens', DosenController::class);
//     Route::apiResource('students', StudentController::class);
//     Route::apiResource('makuls', MakulController::class);

//     Route::get('makul/{kode_makul}/dosens', [MakulController::class, 'getDosensByMakul']);
// });

// Route::middleware('auth:sanctum')->group(function () {

    
// });


Route::get('/students', [RequestController::class, 'index']);
    Route::get('/studentss', [RequestController::class, 'index1']);
    Route::delete('/students/{id}', [RequestController::class, 'destroy']);
    Route::put('/students/{id}', [RequestController::class, 'update']);
    Route::post('/students', [RequestController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

