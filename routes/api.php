<?php

use App\Http\Controllers\APIControllers\SolutionController;
use App\Http\Controllers\APIControllers\IssueController;
use App\Http\Controllers\APIControllers\PermissionController;
use App\Http\Controllers\APIControllers\RoleController;
use App\Http\Controllers\APIControllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('auth/sign-in', [LoginController::class,'getToken']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('issues', IssueController::class);
    Route::resource('solutions', SolutionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});
