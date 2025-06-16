<?php

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\JobOrderStatementController;
use App\Http\Controllers\TypeOfWorkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('type-of-works', TypeOfWorkController::class);
Route::resource('contractors', ContractorController::class);
Route::resource('conductors', ConductorController::class);
Route::resource('job-orders', JobOrderController::class);
Route::resource('jos', JobOrderStatementController::class);

Route::get('/jos/{id}/pdf', [JobOrderStatementController::class, 'exportPDF'])->name('jos.pdf');
