<?php

use App\Models\Medicaments;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PharmaciesController;
use App\Http\Controllers\Api\MedicamentsController;
use App\Http\Controllers\Api\CommunesController;
use App\Http\Controllers\Api\QuartiersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/offres', [UsersController::class, 'offres']);

Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);
Route::post('/verify-otp', [UsersController::class, 'verifyOtp']);
Route::post('/resend-otp', [UsersController::class, 'resendOtp']);

Route::get('/users', [UsersController::class, 'index']);
Route::middleware('auth:sanctum')->post('/logout', [UsersController::class, 'logout']);
// Route::post('/logout', [UsersController::class, 'logout']);

Route::get('/categories', [CategoriesController::class, 'index_categories']);
Route::get('/categories-showapp', [CategoriesController::class, 'show_app']);
Route::get('/categories-show/{id}', [CategoriesController::class, 'show']);
Route::post('/categories-store', [CategoriesController::class, 'register_categories']);
Route::put('/categories-update/{id}/', [CategoriesController::class, 'update']);





Route::get('/medicaments', [MedicamentsController::class, 'index_medicaments']);
Route::get('/medicament-show/{id}', [MedicamentsController::class, 'show']);
Route::get('/medicament-search', [MedicamentsController::class, 'search_medicaments']);
Route::post('/medicament-store', [MedicamentsController::class, 'register_medicaments']);
Route::put('/medicament-update/{id}/', [MedicamentsController::class, 'update']);


Route::get('/pharmacies', [PharmaciesController::class, 'index_pharmacies']);
Route::get('/pharmacies-search', [PharmaciesController::class, 'search_pharmacies']);
Route::get('/pharmacie-show/{id}', [PharmaciesController::class, 'show']);
Route::post('/pharmacie-store', [PharmaciesController::class, 'register_pharmacies']);
Route::put('/pharmacie-update/{id}/', [PharmaciesController::class, 'update']);

Route::get('/oncall', [PharmaciesController::class, 'index_oncall']);
Route::get('/oncall/{id}', [PharmaciesController::class, 'index_oncall']);
Route::get('/oncall/{id}', [PharmaciesController::class, 'index_oncall']);
Route::get('/oncall', [PharmaciesController::class, 'index_oncall']);


Route::get('/communes', [CommunesController::class, 'index']);
Route::get('/communes', [CommunesController::class, 'index']);
Route::get('/communes/{id}', [CommunesController::class, 'show']);
Route::get('/communes-search', [CommunesController::class, 'search_communes']);
Route::post('/communes-store', [CommunesController::class, 'register_communes']);

Route::get('/quartiers', [QuartiersController::class, 'index']);
Route::get('/quartiers/{id}', [QuartiersController::class, 'show']);
Route::get('/quartiers-search', [QuartiersController::class, 'search_quartiers']);
Route::post('/quartiers-store', [QuartiersController::class, 'store']);
Route::put('/quartiers-update/{id}/', [QuartiersController::class, 'update']);


Route::get('/pharmacies-gardes', [PharmaciesController::class, 'index_pharmacies_gardes']);
Route::get('/pharmacie-garde-search', [PharmaciesController::class, 'search_pharmacies_gardes']);
Route::get('/pharmacie-garde-show/{id}', [PharmaciesController::class, 'show_gardes']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/users-info/{user_id}', [UsersController::class, 'info'])->name('users.info');

    // Route::get('/pharmacies-gardes', [PharmaciesController::class, 'index_pharmacies_gardes']);


    Route::post('/upload-ordonnances', [UploadController::class, 'store']);

    Route::post('/panier-store', [CartsController::class, 'addToCart']);
});
