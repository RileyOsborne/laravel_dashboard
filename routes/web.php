<?php
require __DIR__.'/auth.php';

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Set landing page to login
Route::get('/', function () {
    return view('auth.login');
});

// Middleware is handled in the controller
Route::resource('company_dashboard', CompanyController::class)->parameters([
    'company_dashboard' => 'company_id'
]);

// Middleware is handled in the controller
Route::resource('employee_dashboard', EmployeeController::class)->parameters([
    'employee_dashboard' => 'employee_id'
]);

//Only allow logged in employees to view the dashbord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');