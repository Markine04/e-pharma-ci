<?php

use App\Models\Regions;
use App\Models\Medicaments;
use App\Models\CategorieMedicaments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\CommunesController;
use App\Http\Controllers\PharmaciesController;
use App\Http\Controllers\MedicamentsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\CategorieMedicamentsController;

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


    //Pharmacies
    Route::get('dashboard/pharmacies', [PharmaciesController::class, 'index'])->name('pharmacies.index');
    Route::get('dashboard/pharmacie/create', [PharmaciesController::class, 'create'])->name('pharmacies.create');
    Route::post('dashboard/pharmacie', [PharmaciesController::class, 'store'])->name('pharmacies.store');
    Route::get('dashboard/pharmacie/{id}/edit', [PharmaciesController::class, 'edit'])->name('pharmacies.edit');
    Route::post('dashboard/pharmacie/{id}', [PharmaciesController::class, 'update'])->name('pharmacies.update');
    Route::delete('dashboard/pharmacie/{id}', [PharmaciesController::class, 'destroy'])->name('pharmacies.destroy');
    Route::get('dashboard/pharmacie-uploadImages', [PharmaciesController::class, 'upload'])->name('pharmacies.upload');

    //Communes
    Route::get('dashboard/communes', [CommunesController::class, 'index'])->name('communes.index');
    Route::get('dashboard/commune/create', [CommunesController::class, 'create'])->name('communes.create');
    Route::post('dashboard/commune', [CommunesController::class, 'store'])->name('communes.store');
    Route::get('dashboard/commune/{id}/edit', [CommunesController::class, 'edit'])->name('communes.edit');
    Route::put('dashboard/commune/{id}', [CommunesController::class, 'update'])->name('communes.update');
    Route::delete('dashboard/commune/{id}', [CommunesController::class, 'destroy'])->name('communes.destroy');
    Route::get('dashboard/commune-uploadImages', [CommunesController::class, 'uploadImages'])->name('communes.temp');


    //Regions
    Route::get('dashboard/regions', [RegionsController::class, 'index'])->name('regions.index');
    Route::get('dashboard/region/create', [RegionsController::class, 'create'])->name('regions.create');
    Route::post('dashboard/region', [RegionsController::class, 'store'])->name('regions.store');
    Route::get('dashboard/region/{id}/edit', [RegionsController::class, 'edit'])->name('regions.edit');
    Route::put('dashboard/region/{id}', [RegionsController::class, 'update'])->name('regions.update');
    Route::delete('dashboard/region/{id}', [RegionsController::class, 'destroy'])->name('regions.destroy');
    Route::get('dashboard/region-uploadImages', [RegionsController::class, 'uploadImages'])->name('regions.temp');


    //Regions
    Route::get('dashboard/categorie-medicaments', [CategorieMedicamentsController::class, 'index'])->name('categoriemedicaments.index');
    Route::get('dashboard/categorie-medicament/create', [CategorieMedicamentsController::class, 'create'])->name('categoriemedicaments.create');
    Route::post('dashboard/categorie-medicament', [CategorieMedicamentsController::class, 'store'])->name('categoriemedicaments.store');
    Route::get('dashboard/categorie-medicament/{id}/edit', [CategorieMedicamentsController::class, 'edit'])->name('categoriemedicaments.edit');
    Route::put('dashboard/categorie-medicament/{id}', [CategorieMedicamentsController::class, 'update'])->name('categoriemedicaments.update');
    Route::delete('dashboard/categorie-medicament/{id}', [CategorieMedicamentsController::class, 'destroy'])->name('categoriemedicaments.destroy');
    Route::get('dashboard/categorie-medicament-uploadImages', [CategorieMedicamentsController::class, 'uploadImages'])->name('categoriemedicaments.temp');

    

})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
