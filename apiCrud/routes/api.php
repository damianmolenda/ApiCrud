<?php

use App\Http\Controllers\PeopleController;
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
Route::controller(PeopleController::class)->group(function () {    
    Route::get(   '/molenda/26230/people', 'index');
    Route::get(   '/molenda/26230/people/{id}', 'show');
    Route::post(  '/molenda/26230/people', 'store');
    Route::patch( '/molenda/26230/people/{id}', 'update');
    Route::delete('/molenda/26230/people/{id}', 'destroy');
    Route::fallback("fallback");
});