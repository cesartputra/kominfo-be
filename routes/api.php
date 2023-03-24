<?php

use App\Http\Controllers\API\AuthController;
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

Route::group(['middleware => auth:sanctum'], function () {
    Route::prefix('pelatihan')->group(function () {
        Route::get('/', [PelatihanController::class, 'index']);
        Route::post('/add-pelatihan', [PelatihanController::class, 'addPelatihan']);
        Route::post('/edit-pelatihan', [PelatihanController::class, 'editPelatihan']);
        Route::post('/delete-pelatihan', [PelatihanController::class, 'deletePelatihan']);
        Route::post('/approval-pelatihan', [PelatihanController::class, 'approvalPelatihan']);
    });
});

Route::post('/login', [AuthController::class, 'login']);
