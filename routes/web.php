<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SignOutController;
use App\Http\Controllers\SolutionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('auth/sign-in', LoginController::class);
Route::resource('auth/register', RegisterController::class);
Route::resource('auth/sign-out', SignOutController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('issues', IssueController::class);
    Route::resource('solutions', SolutionController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

