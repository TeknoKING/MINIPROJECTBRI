<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/', [DashboardController::class, 'store'])->middleware('auth');

Route::put('/', [DashboardController::class, 'update'])->middleware('auth');

Route::get('/attendancesreport', [DashboardController::class, 'attendances'])->middleware('admin');

Route::get('/myattendance', [DashboardController::class, 'attendancesByUser'])->middleware('auth');

Route::resource('codes', CodeController::class)->middleware('isNotAssistant');

Route::resource('materials', MaterialController::class)->middleware('admin');

Route::get('kelas', [KelasController::class, 'index'])->middleware('admin');

Route::get('kelas/{id}', [KelasController::class, 'destroy'])->middleware('admin');

Route::get('kelas/create', [KelasController::class, 'create'])->middleware('admin');

Route::post('kelas/create', [KelasController::class, 'store'])->middleware('admin');

Route::get('kelas/{id}/edit', [KelasController::class, 'edit'])->middleware('admin');

Route::put('kelas/{id}/edit', [KelasController::class, 'update'])->middleware('admin');

Route::resource('users', UserController::class)->middleware('admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
