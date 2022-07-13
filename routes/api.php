<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\CountryController;
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

Route::get('/clients', [ClientController::class,'index']);
Route::post('/clients', [ClientController::class,'store']);
Route::get('/clients/{cnpj}', [ClientController::class,'show']);
Route::put('/clients/{cnpj}', [ClientController::class,'update']);
Route::delete('/clients/{cnpj}', [ClientController::class,'destroy']);

Route::get('/uf', [UfController::class,'index']);
Route::post('/uf', [UfController::class,'store']);
Route::get('/uf/{codigouf}', [UfController::class,'show']);
Route::put('/uf/{codigouf}', [UfController::class,'update']);
Route::delete('/uf/{codigouf}', [UfController::class,'destroy']);

Route::get('/country', [CountryController::class,'index']);
Route::post('/country', [CountryController::class,'store']);
Route::get('/country/{codigocountry}', [CountryController::class,'show']);
Route::put('/country/{codigocountry}', [CountryController::class,'update']);
Route::delete('/country/{codigocountry}', [CountryController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
