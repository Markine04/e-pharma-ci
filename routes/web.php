<?php

use App\Models\Medicaments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicamentsController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/produits', [ProduitController::class, 'index'])->name('produits');
Route::get('/single-produits', [ProduitController::class, 'show'])->name('single-produit');

// DASHBOARD
Route::middleware('auth')->group(function () {
    Route::get('dashboard/home',[DashboardController::class,'index'])->name('dashboard');

    //Produits
    Route::get('dashboard/medicaments',[MedicamentsController::class,'index'])->name('medicaments.index');
    Route::get('dashboard/medicament/create',[MedicamentsController::class,'create'])->name('medicaments.create');
    Route::post('dashboard/medicament',[MedicamentsController::class,'store'])->name('medicaments.store');
    Route::get('dashboard/medicament/{id}/edit',[MedicamentsController::class,'edit'])->name('medicaments.edit');
    Route::put('dashboard/medicament/{id}',[MedicamentsController::class,'update'])->name('medicaments.update');
    Route::delete('dashboard/medicament/{id}',[MedicamentsController::class,'destroy'])->name('medicaments.destroy');
    Route::get('dashboard/medicaments-uploadImages', [MedicamentsController::class, 'uploadImages'])->name('upload.temp');

    



})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
