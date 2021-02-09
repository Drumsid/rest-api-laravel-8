<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Country\CountryController;

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

// еще бы добавить where для id
Route::prefix('/country')->group(function () {
    Route::get('/', [CountryController::class, 'country']);
    Route::get('/{id}', [CountryController::class, 'show']);
    Route::post('/', [CountryController::class, 'create']);
    Route::put('/{id}', [CountryController::class, 'edit']);
    Route::delete('/{id}', [CountryController::class, 'destroy']);
});

