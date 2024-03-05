<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('user', [UserController::class, 'user_register'])->name('user');
Route::post('User_Register', [UserController::class, 'user_store']);
Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
Route::get('/userShow/{id}', [UserController::class, 'userShow']);
Route::post('/update_user/{id}', [UserController::class, 'update_user']);
// Route::get('/user', [UserController::class, 'index']);
