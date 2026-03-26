<?php

use App\Http\Controllers\ScriptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MasterFiles\CompanyController;
use App\Http\Controllers\MasterFiles\DepartmentsController;
use App\Http\Controllers\MasterFiles\EmployeesController;
use App\Http\Controllers\MasterFiles\JobTitlesController;
use App\Http\Controllers\MasterFiles\SiteLocationsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('copy-employees', [ScriptController::class, 'copyEmployees']);
Route::get('copy-suppliers', [ScriptController::class, 'copySuppliers']);

Route::middleware('auth:sanctum')->prefix('master-files')->group(function(){

    Route::prefix('company')->group(function(){
        Route::post('create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('update', [CompanyController::class, 'update'])->name('company.update');
    });

    Route::prefix('site-locations')->group(function(){
        Route::post('create', [SiteLocationsController::class, 'create'])->name('site-locations.create');
        Route::post('update', [SiteLocationsController::class, 'update'])->name('site-locations.update');
    });

    Route::prefix('departments')->group(function(){
        Route::post('create', [DepartmentsController::class, 'create'])->name('departments.create');
        Route::post('update', [DepartmentsController::class, 'update'])->name('departments.update');
    });

    Route::prefix('job-titles')->group(function(){
        Route::post('create', [JobTitlesController::class, 'create'])->name('job-titles.create');
        Route::post('update', [JobTitlesController::class, 'update'])->name('job-titles.update');
    });

    Route::prefix('employees')->group(function(){
        Route::post('create', [EmployeesController::class, 'create'])->name('employees.create');
        Route::post('update', [EmployeesController::class, 'update'])->name('employees.update');
    });
   
});
