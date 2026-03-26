<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterFile\TiresController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MasterFile\VehicleController;
use App\Http\Controllers\MasterFiles\CompanyController;
use App\Http\Controllers\MasterFiles\DepartmentsController;
use App\Http\Controllers\MasterFiles\EmployeesController;
use App\Http\Controllers\MasterFiles\JobTitlesController;
use App\Http\Controllers\MasterFiles\SiteLocationsController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'web'])->name('dashboard');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'web']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('master-files')->group(function(){
    Route::get('company',[CompanyController::class, 'index'])->name('company.index');
    Route::get('site-locations',[SiteLocationsController::class, 'index'])->name('site-locations.index');
    Route::get('departments',[DepartmentsController::class, 'index'])->name('departments.index');
    Route::get('job-titles',[JobTitlesController::class, 'index'])->name('job-titles.index');
    Route::get('employees   ',[EmployeesController::class, 'index'])->name('employees.index');
})->middleware(['auth', 'web']);



require __DIR__.'/auth.php';

/*

/master-files/company
/master-files/site-locations
/master-files/departments
/master-files/job-titles
/master-files/employees
/payroll-settings/compensation-types
/payroll-settings/deduction-types
/payroll-settings/rates-by-location
/time-keeping/payroll-periods
/time-keeping/leave-credits
/time-keeping/leaves
/time-keeping/holidays
/time-keeping/upload-dtr
/time-keeping/manage-dtr
/deductions/philhealth-contribution
/deductions/sss-contribution
/deductions/withholding-tax
/deductions/government-loan
/deductions/one-time-deduction
/deductions/installments
/payroll-transactions/payroll-adjustments
/payroll-transactions/salary-hold
/payroll-transactions/payroll-register
/payroll-transactions/payslip
/payroll-transactions/bank-transmittal
/payroll-transactions/13th-month-pay
*/