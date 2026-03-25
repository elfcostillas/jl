<?php

use App\Http\Controllers\MasterFile\TiresController;
use App\Http\Controllers\MasterFile\VehicleController;
use App\Http\Controllers\ScriptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('copy-employees', [ScriptController::class, 'copyEmployees']);
Route::get('copy-suppliers', [ScriptController::class, 'copySuppliers']);

Route::middleware('auth:sanctum')->prefix('master-files')->group(function(){
    Route::prefix('vehicles')->group(function(){
        Route::post('create', [VehicleController::class, 'create'])->name('vehicle.create');
        Route::post('update', [VehicleController::class, 'update'])->name('vehicle.update');
    });

    Route::prefix('tires')->group(function(){
        Route::post('create', [TiresController::class, 'create'])->name('tires.create');
        Route::post('update', [TiresController::class, 'update'])->name('tires.update');
    });
   
});
