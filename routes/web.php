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
Route::get('/test', function () {
return view('test');
});

Route::middleware(['auth'])->group(function () {
Route::prefix('/issues/{issue_id}')->group(function () {
    Route::get('/solution/create',[SolutionController::class,'createSolution'])->name('create.solution');
    Route::post('/solution',[SolutionController::class,'storeSolution'])->name('solution.post');

    Route::get('/solution/{solution_id}/edit',[SolutionController::class,'editSolution']);
    Route::get('/solution/{solution_id}',[SolutionController::class,'showSolution']);

Route::put('/solution/{solution_id}', [SolutionController::class,'updateSolution'])->name('solution.put');
});

    Route::resource('dashboard', DashboardController::class);
    Route::resource('issues', IssueController::class);
    Route::resource('solutions', SolutionController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

