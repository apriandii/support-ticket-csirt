<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportController::class, 'create'])->name('report.create');
route::post('/submit', [ReportController::class, 'store'])->name('report.store');

Route::get('/admin', [ReportController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/edit/{id}', [ReportController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [ReportController::class, 'update'])->name('admin.update');