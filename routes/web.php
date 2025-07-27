<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SomiteeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\HolidayController;

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
//    return view('welcome');
    return redirect('/login');
});

// Route to serve storage files
Route::get('/storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    if (file_exists($fullPath)) {
        return response()->file($fullPath);
    }
    abort(404);
})->where('path', '.*');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::GET('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('employees', EmployeeController::class);
    Route::resource('somitees', SomiteeController::class);
    Route::resource('members', MemberController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('insurances', InsuranceController::class);
    Route::resource('days', DayController::class);
    Route::resource('holidays', HolidayController::class);

    Route::post('/dayend', [DashboardController::class, 'dayEnd'])->name('dayend');

    Route::GET('/cashbook', [DashboardController::class, 'cashbook'])->name('cashbook');
    Route::GET('/due-collection', [DashboardController::class, 'dueCollection'])->name('due-collection');
    Route::GET('/voucher', [DashboardController::class, 'voucher'])->name('voucher');

    Route::GET('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
