<?php

use App\Models\Regions;
use App\Models\Medicaments;
use App\Models\CategorieMedicaments;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\CommunesController;
use App\Http\Controllers\QuartiersController;
use App\Http\Controllers\AssurancesController;
use App\Http\Controllers\PharmaciesController;
use App\Http\Controllers\MedicamentsController;
use App\Http\Controllers\OrdonnancesController;
use App\Http\Controllers\AffichageAppsController;
use App\Http\Controllers\FormeGaleniquesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

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
    Route::get('dashboard/home', [DashboardController::class, 'index'])->name('dashboard');

    //Produits
    Route::get('dashboard/medicaments', [MedicamentsController::class, 'index'])->name('medicaments.index');
    Route::get('dashboard/medicament/create', [MedicamentsController::class, 'create'])->name('medicaments.create');
    Route::post('dashboard/medicament', [MedicamentsController::class, 'store'])->name('medicaments.store');
    Route::get('dashboard/medicament/{id}/edit', [MedicamentsController::class, 'edit'])->name('medicaments.edit');
    Route::put('dashboard/medicament/{id}', [MedicamentsController::class, 'update'])->name('medicaments.update');
    Route::delete('dashboard/medicament/{id}', [MedicamentsController::class, 'destroy'])->name('medicaments.destroy');
    Route::get('dashboard/medicaments-uploadImages', [MedicamentsController::class, 'uploadImages'])->name('upload.temp');


    //Pharmacies
    Route::get('dashboard/pharmacies', [PharmaciesController::class, 'index'])->name('pharmacies.index');
    Route::get('dashboard/pharmacie/create', [PharmaciesController::class, 'create'])->name('pharmacies.create');
    Route::post('dashboard/pharmacie', [PharmaciesController::class, 'store'])->name('pharmacies.store');
    Route::get('dashboard/pharmacie/{id}/edit', [PharmaciesController::class, 'edit'])->name('pharmacies.edit');
    Route::post('dashboard/pharmacie/{id}', [PharmaciesController::class, 'update'])->name('pharmacies.update');
    Route::delete('dashboard/pharmacie/{id}', [PharmaciesController::class, 'destroy'])->name('pharmacies.destroy');
    Route::get('dashboard/pharmacie-uploadImages', [PharmaciesController::class, 'upload'])->name('pharmacies.upload');
    Route::get('dashboard/pharmacie-delete/{id}', [PharmaciesController::class, 'delete'])->name('pharmacies.delete');
    Route::post('dashboard/pharmacie-destroy', [PharmaciesController::class, 'destroy'])->name('pharmacies.destroy');


    //PharmaciesDeGarde
    Route::get('dashboard/pharmacies-gardes', [PharmaciesController::class, 'index_gardes'])->name('pharmacies-gardes.index');
    Route::get('dashboard/pharmacie-garde/create', [PharmaciesController::class, 'create_gardes'])->name('pharmacies-gardes.create');
    Route::get('dashboard/pharmacie-gard/{id}/{title}', [PharmaciesController::class, 'create_gardes'])->name('pharmacies-gardes.creat');
    Route::post('dashboard/pharmacie-gardes/store', [PharmaciesController::class, 'store_garde'])->name('pharmacies-gardes.store');

    // Route::post('dashboard/pharmacie-garde', [PharmaciesController::class, 'store'])->name('pharmacies-gardes.store');
    Route::get('dashboard/pharmacie-garde/{id}/edit', [PharmaciesController::class, 'edit'])->name('pharmacies-gardes.edit');
    Route::post('dashboard/pharmacie-garde/{id}', [PharmaciesController::class, 'update'])->name('pharmacies-gardes.update');
    Route::delete('dashboard/pharmacie-garde/{id}', [PharmaciesController::class, 'destroy'])->name('pharmacies-gardes.destroy');
    Route::get('dashboard/pharmacie-garde-uploadImages', [PharmaciesController::class, 'upload'])->name('pharmacies-gardes.upload');




    //Communes
    Route::get('dashboard/communes', [CommunesController::class, 'index'])->name('communes.index');
    Route::get('dashboard/commune/create', [CommunesController::class, 'create'])->name('communes.create');
    Route::post('dashboard/commune', [CommunesController::class, 'store'])->name('communes.store');
    Route::get('dashboard/commune/{id}/edit', [CommunesController::class, 'edit'])->name('communes.edit');
    Route::put('dashboard/commune/{id}', [CommunesController::class, 'update'])->name('communes.update');
    Route::get('dashboard/commune-delete/{id}', [CommunesController::class, 'delete'])->name('communes.delete');
    Route::post('dashboard/commune-destroy', [CommunesController::class, 'destroy'])->name('communes.destroy');


    //Quartiers
    Route::get('dashboard/quartiers', [QuartiersController::class, 'index'])->name('quartiers.index');
    Route::get('dashboard/quartier/create', [QuartiersController::class, 'create'])->name('quartiers.create');
    Route::post('dashboard/quartier', [QuartiersController::class, 'store'])->name('quartiers.store');
    Route::get('dashboard/quartier/{id}/edit', [QuartiersController::class, 'edit'])->name('quartiers.edit');
    Route::put('dashboard/quartier/{id}', [QuartiersController::class, 'update'])->name('quartiers.update');
    Route::get('dashboard/quartier-delete/{id}', [QuartiersController::class, 'delete'])->name('quartiers.delete');
    Route::post('dashboard/quartier-destroy', [QuartiersController::class, 'destroy'])->name('quartiers.destroy');


    //Regions
    Route::get('dashboard/regions', [RegionsController::class, 'index'])->name('regions.index');
    Route::get('dashboard/region/create', [RegionsController::class, 'create'])->name('regions.create');
    Route::post('dashboard/region', [RegionsController::class, 'store'])->name('regions.store');
    Route::get('dashboard/region/{id}/edit', [RegionsController::class, 'edit'])->name('regions.edit');
    Route::put('dashboard/region/{id}', [RegionsController::class, 'update'])->name('regions.update');
    Route::delete('dashboard/region/{id}', [RegionsController::class, 'destroy'])->name('regions.destroy');
    Route::get('dashboard/region-uploadImages', [RegionsController::class, 'uploadImages'])->name('regions.temp');


    //Categories medicament
    Route::get('dashboard/categorie-medicaments', [CategorieMedicamentsController::class, 'index'])->name('categoriemedicaments.index');
    Route::get('dashboard/categorie-medicament/create', [CategorieMedicamentsController::class, 'create'])->name('categoriemedicaments.create');
    Route::post('dashboard/categorie-medicament', [CategorieMedicamentsController::class, 'store'])->name('categoriemedicaments.store');
    Route::get('dashboard/categorie-medicament/{id}/edit', [CategorieMedicamentsController::class, 'edit'])->name('categoriemedicaments.edit');
    Route::put('dashboard/categorie-medicament/{id}', [CategorieMedicamentsController::class, 'update'])->name('categoriemedicaments.update');
    Route::delete('dashboard/categorie-medicament/{id}', [CategorieMedicamentsController::class, 'destroy'])->name('categoriemedicaments.destroy');
    Route::get('dashboard/categorie-medicament-uploadImages', [CategorieMedicamentsController::class, 'uploadImages'])->name('categoriemedicaments.temp');


    //Ordonnances
    Route::get('dashboard/ordonnances', [OrdonnancesController::class, 'index'])->name('ordonnances.index');
    Route::get('dashboard/ordonnance/create', [OrdonnancesController::class, 'create'])->name('ordonnances.create');
    Route::post('dashboard/ordonnance', [OrdonnancesController::class, 'store'])->name('ordonnances.store');
    Route::get('dashboard/ordonnance/{id}/edit', [OrdonnancesController::class, 'edit'])->name('ordonnances.edit');
    Route::put('dashboard/ordonnance/{id}', [OrdonnancesController::class, 'update'])->name('ordonnances.update');
    Route::get('dashboard/ordonnance-delete/{id}', [OrdonnancesController::class, 'delete'])->name('ordonnances.delete');
    Route::post('dashboard/ordonnance-destroy/{id}', [OrdonnancesController::class, 'destroy'])->name('ordonnances.destroy');
    Route::get('dashboard/ordonnance-image/{id}', [OrdonnancesController::class, 'show'])->name('ordonnances.image');
    Route::get('dashboard/ordonnance-traiter/{id}', [OrdonnancesController::class, 'traiter'])->name('ordonnances.traiter');
    Route::post('dashboard/ordonnance-verifier', [OrdonnancesController::class, 'verifier'])->name('ordonnances.verifier');




    //Assurances
    Route::get('dashboard/assurances', [AssurancesController::class, 'index'])->name('assurances.index');
    Route::get('dashboard/assurance/create', [AssurancesController::class, 'create'])->name('assurances.create');
    Route::post('dashboard/assurance', [AssurancesController::class, 'store'])->name('assurances.store');
    Route::get('dashboard/assurance/{id}/edit', [AssurancesController::class, 'edit'])->name('assurances.edit');
    Route::put('dashboard/assurance/{id}', [AssurancesController::class, 'update'])->name('assurances.update');
    Route::delete('dashboard/assurance/{id}', [AssurancesController::class, 'destroy'])->name('assurances.destroy');
    Route::get('dashboard/assurance-uploadImages', [AssurancesController::class, 'uploadImages'])->name('assurances.temp');


    //Assurances
    Route::get('dashboard/formegaleniques', [FormeGaleniquesController::class, 'index'])->name('formegaleniques.index');
    Route::get('dashboard/formegalenique/create', [FormeGaleniquesController::class, 'create'])->name('formegaleniques.create');
    Route::post('dashboard/formegalenique', [FormeGaleniquesController::class, 'store'])->name('formegaleniques.store');
    Route::get('dashboard/formegalenique/{id}/edit', [FormeGaleniquesController::class, 'edit'])->name('formegaleniques.edit');
    Route::post('dashboard/formegalenique/{id}', [FormeGaleniquesController::class, 'update'])->name('formegaleniques.update');
    Route::post('dashboard/formegalenique/{id}/destroy', [FormeGaleniquesController::class, 'destroy'])->name('formegaleniques.destroy');
    Route::get('dashboard/formegalenique/{id}-delete', [FormeGaleniquesController::class, 'delete'])->name('formegaleniques.delete');
    Route::get('dashboard/formegalenique-uploadImages', [FormeGaleniquesController::class, 'uploadImages'])->name('formegaleniques.temp');


    //Affichage App

    Route::get('dashboard/affiche-apps', [AffichageAppsController::class, 'index'])->name('afficheApp.index');
    Route::get('dashboard/affiche-app/create', [AffichageAppsController::class, 'create'])->name('afficheApp.create');
    Route::post('dashboard/affiche-app', [AffichageAppsController::class, 'store'])->name('afficheApp.store');
    Route::get('dashboard/affiche-app/{id}/edit', [AffichageAppsController::class, 'edit'])->name('afficheApp.edit');
    Route::post('dashboard/affiche-app/{id}', [AffichageAppsController::class, 'update'])->name('afficheApp.update');
    Route::post('dashboard/affiche-app/{id}/destroy', [AffichageAppsController::class, 'destroy'])->name('afficheApp.destroy');
    Route::get('dashboard/affiche-app/{id}-delete', [AffichageAppsController::class, 'delete'])->name('afficheApp.delete');
    Route::get('dashboard/affiche-app-uploadImages', [AffichageAppsController::class, 'uploadImages'])->name('afficheApp.temp');


    //Utilisateurs
    Route::get('dashboard/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('dashboard/delete/{id}', [UsersController::class, 'delete'])->name('users.delete');
    Route::post('dashboard/destroy', [UsersController::class, 'destroy'])->name('users.destroy');


    //SMS
    Route::get('dashboard/sms', [SmsController::class, 'index'])->name('sms.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
