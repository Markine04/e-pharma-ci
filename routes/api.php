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

Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);


Route::get('/users', [UsersController::class, 'index']);
Route::post('/logout', [UsersController::class, 'logout']);

Route::get('/categories', [CategoriesController::class, 'index_categories']);
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




Route::group(['middleware'=>['auth:sanctum']],function(){
	
Route::get('/communes', [CommunesController::class, 'index']);


Route::post('/upload-ordonnances', [UploadController::class, 'store']);

Route::post('/panier-store', [CartsController::class, 'addToCart']);

});
