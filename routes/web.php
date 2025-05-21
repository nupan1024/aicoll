<?php

use App\Http\Controllers\Company\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyController::class, 'index'])->name('dashboard');

Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');

Route::post('/company/{company}/update', [CompanyController::class, 'update'])->name('company.update');

Route::delete('/company/{company}/delete', [CompanyController::class, 'delete'])->name('company.delete');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
