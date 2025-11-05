<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportController::class, 'view'])->name('landing.page');

Route::get('/open_ticket', [ReportController::class, 'create'])->name('report.ticket');
route::post('/submit', [ReportController::class, 'store'])->name('report.store');

Route::get('/admin', [ReportController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/edit/{id}', [ReportController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [ReportController::class, 'update'])->name('admin.update');

Route::get('/check-tiket', [ReportController::class, 'checkTiketForm'])->name('ticket.form');
Route::post('/check-tiket', [ReportController::class, 'checkTiket'])->name('ticket.check');