<?php

use App\Http\Controllers\API\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/employees')->group(function(){
    Route::get('/', [EmployeesController::class, 'index']);
    Route::post('/store', [EmployeesController::class, 'store']);
    Route::get('/show/{employee}', [EmployeesController::class, 'read']);
    Route::put('/update/{employee}', [EmployeesController::class, 'update']);
    Route::delete('/destroy/{employee}', [EmployeesController::class, 'destroy']);
});




