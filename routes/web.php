<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeownerController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomeownerController::class, 'index'])->name('homeowners.index');
Route::get('/homeowners/create', [HomeownerController::class, 'create'])->name('homeowners.create');
Route::post('/homeowners', [HomeownerController::class, 'store'])->name('homeowners.store');

Route::get('/homeowners/{homeowner}/edit', [HomeownerController::class, 'edit'])->name('homeowners.edit');
Route::put('/homeowners/{homeowner}', [HomeownerController::class, 'update'])->name('homeowners.update');
Route::delete('/homeowners/{homeowner}', [HomeownerController::class, 'destroy'])->name('homeowners.destroy');