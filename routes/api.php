<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserController;
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


Route::group([
    'middleware'=>'api',
], function () {

    Route::post('api/login', [AuthController::class,'login']);
    Route::post('api/logout', [AuthController::class,'logout']);
    Route::get('api/user/info/{id}', [UserController::class,'show']);
    Route::post('api/user/update/{id}', [UserController::class,'update']);
});

