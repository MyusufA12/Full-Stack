<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, Selamat Datang di Laravel!';
});

Route::get('/user/{name}', function ($name) {
    return 'Halo, ' . $name;
});

Route::get('/view-halo', function () {
    return view('halo');
});

Route::get('/halo-controller', [App\Http\Controllers\HaloController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
Route::get('/master', [App\Http\Controllers\HomeController::class, 'master']);

Route::get('/student/register', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/register', [StudentController::class, 'store'])->name('student.store');

Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');

