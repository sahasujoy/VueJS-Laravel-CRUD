<?php

use App\Http\Controllers\LandController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lands', [LandController::class, 'landViewApi'])->name('api.land.view');

Route::post('/store_land', [LandController::class, 'storeLandApi'])->name('api.land.store');

Route::delete('/delete_land/{id}', [LandController::class, 'deleteLandApi'])->name('api.land.delete');

Route::get('/edit_land/{id}', [LandController::class, 'editLandApi'])->name('api.land.edit');

Route::post('/update_land/{id}', [LandController::class, 'updateLandApi'])->name('api.land.update');
