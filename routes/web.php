<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::resource('branch', BranchController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('product', ProductController::class);
Route::resource('transaction', TransactionController::class);
Route::resource('transaction-detail', TransactionDetailController::class);


