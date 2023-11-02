<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//dashboard routes
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/export', [DashboardController::class, 'export'])->middleware(['auth'])->name('dashboard.export');

Route::middleware('auth')->group(function () {

    //profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //employees routes
    Route::get('/employee/{employee}/add-vacation', [EmployeeController::class, 'addVacation'])->name('employees.add-vacation');
    Route::resource('employees', EmployeeController::class);

    //projects routes
    Route::resource('projects', ProjectController::class);

    //vacations routes
    Route::get('/vacations/{vacation}/download', [VacationController::class, 'download'])->name('vacations.download');
    Route::resource('vacations', VacationController::class);

    //salaries routes
    Route::resource('salaries', SalaryController::class);

});

require __DIR__ . '/auth.php';
