<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\MobilController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user2', function (Request $request) {
    return $request->user();
});

Route::post('/acquireToken', [MainController::class, 'acquireToken']);

Route::middleware(['auth:sanctum', 'activeuser'])->group(function () {
    Route::post('/getTokenInfo', [MainController::class, 'getTokenInfo']);
    
    Route::middleware('leveladmin')->group(function () {
        Route::apiResources([
            'skpd' => SkpdController::class,
            'mobil' => MobilController::class,
        ]);
    });

    Route::middleware('levelskpd')->group(function () {
        Route::apiResources([
            
        ]);
    });
});