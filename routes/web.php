<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;
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

// home
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::post('/language-switch', [LanguageController::class, 'languageSwitch'])->name('language.switch');

///////////////////////////
// Auth
Route::get('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('user.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/company/index', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/destroy/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/company/show/{company}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/company/update/{company}', [CompanyController::class, 'update'])->name('company.update');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/employee/create/{company}', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee/store/{company}', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::get('/employee/show/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
});

Route::fallback(function () {
    abort(404);
});
