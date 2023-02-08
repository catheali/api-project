<?php

use App\Http\Controllers\ApiController;
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


Route::get('usuarios', [ApiController::class, 'getAllUsuarios']);
Route::get('usuarios/{id}', [ApiController::class, 'getUsuario']);
Route::post('usuarios', [ApiController::class, 'createUsuario']);
Route::put("usuarios/{id}", [ApiController::class, 'updateUsuario']);
Route::delete('usuarios/{id}',[ApiController::class, 'deleteUsuario']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
