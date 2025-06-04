<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\WorkSiteController;
use App\Models\Machine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/maquinas', [MachineController::class, 'traerMaquinas'])->name('maquinas');
Route::get('/maquina/{id}/pdf', [MachineController::class, 'generarPDF'])->name('maquina.pdf');
Route::get('/borrarmaquina', [MachineController::class, 'traerMaquinas'])->name('borrarmaquinas');
Route::get('/maquinas/{id}/edit', [MachineController::class, 'edit'])->name('maquinas.edit');
Route::delete('/maquinas/{id}', [MachineController::class, 'delete'])->name('maquinas.destroy');
Route::patch('/maquinas/{id}', [MachineController::class, 'update'])->name('maquinas.update');
Route::get('/maquinas/create', [MachineController::class, 'prepare'])->name('maquinas.prepare');
Route::put('/maquinas/create',[MachineController::class, 'create'])->name('maquinas.create');

Route::get('/obras', [WorkSiteController::class, 'traerObras'])->name('obras');
Route::delete('/obras/{id}', [WorkSiteController::class, 'delete'])->name('obras.destroy');
Route::get('/obras/create', [WorkSiteController::class, 'prepare'])->name('obras.prepare');
Route::put('/obras/create',[WorkSiteController::class,'create'])->name('obras.create');
Route::get('/obras/{id}', [WorkSiteController::class, 'edit'])->name('obras.edit');
Route::patch('/obras/edit/{id}', [WorkSiteController::class, 'update'])->name('obras.update');

Route::get('/asignaciones', [AssignmentController::class, 'traerAsignaciones'])->name('asignaciones');
Route::delete('/asignaciones/{id}', [AssignmentController::class, 'delete'])->name('asignaciones.destroy');
Route::get('/asignaciones/create', [AssignmentController::class, 'prepare'])->name('asignaciones.prepare');
Route::post('/asignacionescreate',[AssignmentController::class,'store'])->name('asignaciones.create'); 
Route::get('/asignaciones/{id}', [AssignmentController::class, 'edit'])->name('asignaciones.edit');
Route::patch('/asignaciones/edit/{id}', [AssignmentController::class, 'update'])->name('asignaciones.update');
Route::get('/asignaciones/preparefinish/{id}', [AssignmentController::class, 'prepareFinish'])->name('asignaciones.prepare.finish');
Route::match(['get','patch'],'/asignaciones/finish/{id}', [AssignmentController::class, 'finish'])->name('asignaciones.finish');
Route::patch('/asignaciones/arrive/{id}', [AssignmentController::class, 'arrive'])->name('asignaciones.arrive');

Route::get('/mantenimientos', [ServiceController::class, 'traerMantenimientos'])->name('mantenimientos');
Route::delete('/mantenimientos/{id}', [ServiceController::class, 'delete'])->name('mantenimientos.destroy');
Route::get('/mantenimientos/create', [ServiceController::class, 'prepare'])->name('mantenimientos.prepare');
Route::post('/mantenimientos/create',[ServiceController::class,'create'])->name('mantenimientos.create');
Route::get('/mantenimientos/{id}', [ServiceController::class, 'edit'])->name('mantenimientos.edit');
Route::patch('/mantenimientos/edit/{id}', [ServiceController::class, 'update'])->name('mantenimientos.update');

require __DIR__.'/auth.php';