<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TokenGeneratorController;
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
Route::get('/', fn () => response()->json(['message' => 'Hello World']));

Route::apiResource('products', ProductController::class);

Route::post('token/generator', TokenGeneratorController::class);
