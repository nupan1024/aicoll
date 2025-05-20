<?php

use App\Http\Controllers\Company\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyController::class, 'index'])->name('home');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
