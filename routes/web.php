<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\TransactionDetailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::match(['put', 'patch'], '/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('employees')->name('employee.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index'); 
    Route::get('/create', [EmployeeController::class, 'create'])->name('create'); 
    Route::post('/', [EmployeeController::class, 'store'])->name('store'); 
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit'); 
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('update'); 
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy'); 
});

Route::prefix('products')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});

Route::prefix('branches')->name('branch.')->group(function () {
    Route::get('/', [BranchController::class, 'index'])->name('index');
    Route::get('/create', [BranchController::class, 'create'])->name('create');
    Route::post('/', [BranchController::class, 'store'])->name('store');
    Route::get('/{branch}/edit', [BranchController::class, 'edit'])->name('edit');
    Route::put('/{branch}', [BranchController::class, 'update'])->name('update');
    Route::delete('/{branch}', [BranchController::class, 'destroy'])->name('destroy');
});

Route::prefix('transactions')->name('transaction.')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::get('/create', [TransactionController::class, 'create'])->name('create');
    Route::post('/', [TransactionController::class, 'store'])->name('store');
    Route::get('/{transaction}/edit', [TransactionController::class, 'edit'])->name('edit');
    Route::put('/{transaction}', [TransactionController::class, 'update'])->name('update');
    Route::delete('/{transaction}', [TransactionController::class, 'destroy'])->name('destroy');
});

Route::prefix('transaction-details')->name('transactionDetail.')->group(function () {
    Route::get('/', [TransactionDetailController::class, 'index'])->name('index');
    Route::get('/create', [TransactionDetailController::class, 'create'])->name('create');
    Route::post('/', [TransactionDetailController::class, 'store'])->name('store');
    Route::get('/{transactionDetail}/edit', [TransactionDetailController::class, 'edit'])->name('edit');
    Route::put('/{transactionDetail}', [TransactionDetailController::class, 'update'])->name('update');
    Route::delete('/{transactionDetail}', [TransactionDetailController::class, 'destroy'])->name('destroy');
});
require __DIR__.'/auth.php';
