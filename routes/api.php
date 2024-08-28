<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;

Route::get('visits', [VisitController::class, 'index'])->name('visits.index');

Route::post('visits', [VisitController::class, 'store'])->name('visits.store');

Route::get('visits/{id}', [VisitController::class, 'show'])->name('visits.show');

Route::put('visits/{id}', [VisitController::class, 'update'])->name('visits.update');

Route::delete('visits/{id}', [VisitController::class, 'destroy'])->name('visits.destroy');
