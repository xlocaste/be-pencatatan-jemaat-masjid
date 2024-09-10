<?php

use App\Http\Controllers\JemaatController;
use App\Http\Controllers\MasjidController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/jemaat', [JemaatController::class, 'index']);
Route::post('/jemaat', [JemaatController::class, 'store']);
Route::get('/jemaat/{jemaat}', [JemaatController::class, 'show']);
Route::put('/jemaat/{jemaat}', [JemaatController::class, 'update']);
Route::delete('/jemaat/{jemaat}', [JemaatController::class, 'destroy']);

Route::get('/masjid', [MasjidController::class, 'index']);
Route::post('/masjid', [MasjidController::class, 'store']);
Route::get('/masjid/{masjid}', [MasjidController::class, 'show']);
Route::put('/masjid/{masjid}', [MasjidController::class, 'update']);
Route::delete('/masjid/{masjid}', [MasjidController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
