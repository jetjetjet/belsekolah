<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\KelasController;

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
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout']);
Route::post('login', [AuthController::class, 'postLogin']);

Route::group(['middleware' => 'auth'], function() {
	Route::get('/',  [DashboardController::class, 'index']);

	// Route::resource('user', UserController::class);
	Route::get('/user',  [UserController::class, 'index'])->middleware('can:user-view');;	
	Route::get('/user/edit/{id?}',  [UserController::class, 'edit']);	
	Route::get('/user/grid',  [UserController::class, 'grid']);	
	Route::post('/user',  [UserController::class, 'save']);
	Route::delete('/user/{id}',  [UserController::class, 'delete']);	

  Route::get('/guru',  [GuruController::class, 'index']);;	
	Route::get('/guru/edit/{id?}',  [GuruController::class, 'edit']);	
	Route::get('/guru/grid',  [GuruController::class, 'grid']);	
	Route::post('/guru/{id?}',  [GuruController::class, 'save']);
	Route::delete('/guru/{id}',  [GuruController::class, 'delete']);	

  Route::get('/kelas',  [KelasController::class, 'index']);;	
	Route::get('/kelas/edit/{id?}',  [KelasController::class, 'edit']);	
	Route::get('/kelas/grid',  [KelasController::class, 'grid']);	
	Route::post('/kelas/{id?}',  [KelasController::class, 'save']);
	Route::delete('/kelas/{id}',  [KelasController::class, 'delete']);

  Route::get('/mapel',  [MataPelajaranController::class, 'index']);;	
	Route::get('/mapel/edit/{id?}',  [MataPelajaranController::class, 'edit']);	
	Route::get('/mapel/grid',  [MataPelajaranController::class, 'grid']);	
	Route::post('/mapel/{id?}',  [MataPelajaranController::class, 'save']);
	Route::delete('/mapel/{id}',  [MataPelajaranController::class, 'delete']);
	
	Route::get('/role', [RoleController::class, 'index']);
	Route::get('/role/edit/{id?}', [RoleController::class, 'edit']);
	Route::get('/role/grid', [RoleController::class, 'grid']);
	Route::post('/role', [RoleController::class, 'save']);
	Route::delete('/role/{id}',  [RoleController::class, 'delete']);
});
