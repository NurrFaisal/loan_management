<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::GET('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::GET('/employee', [EmployeeController::class, 'employee'])->name('employee');
    Route::POST('/employee', [EmployeeController::class, 'store'])->name('employees.store');


    Route::GET('/somitee', [DashboardController::class, 'somitee'])->name('somitee');
    Route::GET('/member', [DashboardController::class, 'member'])->name('member');
    Route::GET('/loan', [DashboardController::class, 'loan'])->name('loan');
    Route::GET('/cashbook', [DashboardController::class, 'cashbook'])->name('cashbook');
    Route::GET('/due-collection', [DashboardController::class, 'dueCollection'])->name('due-collection');
    Route::GET('/voucher', [DashboardController::class, 'voucher'])->name('voucher');

    Route::GET('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
