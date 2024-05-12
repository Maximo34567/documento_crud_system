<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AuthenController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/download/{filename}', [FileController::class, 'download'])->name('file.download');
Route::get('/file/view', [FileController::class, 'view'])->name('file.view');
Route::get('/file/create', [FileController::class, 'create'])->name('file.create');
Route::post('/file/store', [FileController::class, 'store'])->name('file.store');
Route::delete('/file/{id}', [FileController::class, 'destroy'])->name('file.destroy');
Route::get('/file/{id}/update', [FileController::class, 'update'])->name('file.update');
Route::put('/file/{id}/update', [FileController::class, 'edit'])->name('file.edit');

Route::get('/folder/view', [FolderController::class, 'view'])->name('folder.view');
Route::get('/folder/create', [FolderController::class, 'create'])->name('folder.create');
Route::post('/folder/store', [FolderController::class, 'store'])->name('folder.store');
Route::delete('/folder/{id}', [FolderController::class, 'destroy'])->name('folder.destroy');
Route::get('/folder/{id}/update', [FolderController::class, 'update'])->name('folder.update');
Route::put('/folder/{id}/update', [FolderController::class, 'edit'])->name('folder.edit');

Route::get('/client/view', [ClientController::class, 'view'])->name('client.view');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
Route::get('/client/{id}/update', [ClientController::class, 'update'])->name('client.update');
Route::put('/client/{id}/update', [ClientController::class, 'edit'])->name('client.edit');

Route::get('/roles/view', [RolesController::class, 'view'])->name('roles.view');
Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
Route::post('/roles/store', [RolesController::class, 'store'])->name('roles.store');
Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{id}/update', [RolesController::class, 'update'])->name('roles.update');
Route::put('/roles/{id}/update', [RolesController::class, 'edit'])->name('roles.edit');

Route::get('/registration', [AuthenController::class, 'registration'])->middleware('alreadyLoggedIn');
Route::post('/registration-user', [AuthenController::class, 'registerUser'])->name('register-user');
Route::get('/login', [AuthenController::class, 'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login-user', [AuthenController::class, 'loginUser'])->name('login-user')->middleware('alreadyLoggedIn');
Route::get('/file/dashboard', [FileController::class, 'dashboard'])->name('file.dashboard')->middleware('isLoggedIn');
Route::get('/logout', [AuthenController::class, 'logout'])->name('logout');





