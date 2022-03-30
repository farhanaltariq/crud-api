<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiPassportAuthController;
use App\Http\Controllers\API\ProductsController;
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

Route::post('/register', [ApiPassportAuthController::class, 'register']);
Route::post('/login', [ApiPassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('info-user/{id}', [ApiPassportAuthController::class, 'info']);
    Route::get('/products', [ProductsController::class, 'index']);
    Route::post('/storeProducts', [ProductsController::class, 'store']);
    Route::get('/products/{id}', [ProductsController::class, 'show']);
    Route::put('/updateProducts/{id}', [ProductsController::class, 'update']);
    Route::delete('/deleteProducts/{id}', [ProductsController::class, 'destroy']);
});