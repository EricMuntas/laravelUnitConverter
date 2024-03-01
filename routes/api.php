<?php

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
use App\Http\Controllers\ConvertLengthController;
use App\Http\Controllers\ConvertWeightController;
use App\Http\Controllers\ConvertTemperatureController;
use App\Http\Controllers\ConvertVolumeController;
use App\Http\Controllers\ConvertSpeedController;

Route::get('/convert/length/{value}/{unit}', [ConvertLengthController::class, 'convertLength']);
Route::get('/convert/volume/{value}/{unit}', [ConvertVolumeController::class, 'convertVolume']);
Route::get('/convert/speed/{value}/{unit}', [ConvertSpeedController::class, 'convertSpeed']);
Route::get('/convert/temperature/{value}/{unit}', [ConvertTemperatureController::class, 'convertTemperature']);
Route::get('/convert/weight/{value}/{unit}', [ConvertWeightController::class, 'convertWeight']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
