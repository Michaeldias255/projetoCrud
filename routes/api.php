<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::get('produtos', [ProdutoController::class, 'index']);
Route::post('produto', [ProdutoController::class, 'store']);
Route::get('produto/{id}', [ProdutoController::class, 'show']);
Route::put('produto/{id}', [ProdutoController::class, 'update']);
Route::delete('produto/{id}', [ProdutoController::class, 'destroy']);

/*
    Route::middleware('api')->group(function () {
});
*/