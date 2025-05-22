<?php

use App\Http\Controllers\Company\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyController::class, 'index'])->name('dashboard');

Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');

Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::patch('/company/{company}/update', [CompanyController::class, 'update'])->name('company.update');

Route::delete('/company/{company}/delete', [CompanyController::class, 'delete'])->name('company.delete');

Route::get('/companies', [CompanyController::class, 'getCompanies'])->name('companies');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
