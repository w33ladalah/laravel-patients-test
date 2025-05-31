<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('welcome');
});

// BUG 1: method create should be GET, store should be POST (swapped)
Route::post('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::get('/patients', [PatientController::class, 'store'])->name('patients.store');
