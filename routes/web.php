<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LigneCommandeController; 
use App\Http\Controllers\LigneCommandeClientController;
use App\Http\Controllers\BoncommandeclientController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BonCommandeFrsController;
use App\Http\Controllers\GenerateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// First Page Route

/*Route::get('/', function () {
    return view('auth.login');
});*/

Route::get('/', function () {
    return view('welcome2');
});

// Authentication Routes

require __DIR__.'/auth.php';

// Welcome Route 
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

// Cruds Routes

Route::middleware(['auth'])->group(function(){
    Route::resource('/fournisseur', FournisseurController::class);
    Route::resource('/produit', ProduitController::class);
    Route::resource('/categorie', CategorieController::class);
    Route::resource('/bon_commande_frs', BonCommandeFrsController::class);
    Route::resource('/Lignes_commandes', LigneCommandeController::class);  
    Route::resource('/client', ClientController::class);  
});

// Searching Routes

Route::middleware(['auth'])->group(function(){
    Route::post('/fournisseurSearch', [FournisseurController::class, 'search'])->name('fournisseurSearch');
    Route::post('/categorieSearch', [CategorieController::class, 'search'])->name('categorieSearch');
    Route::post('/produitSearch', [ProduitController::class, 'search'])->name('produitSearch');
});

//Special Routes 

Route::get('/Ligne_commandes/{id}', [LigneCommandeController::class, 'destroy']);
Route::post('/storeLignes_commandes', [LigneCommandeController::class, 'store'])->name('storeLignes_commandes');

//stock routes 

Route::middleware(['auth'])->group(function(){
    Route::post('/add', [StockController::class, 'store']);
    Route::post('/out', [StockController::class, 'store2']);
    Route::get('/input', [StockController::class, 'input']);
    Route::get('/output', [StockController::class, 'output']);
    Route::get('/add/{id}', [ProduitController::class, 'add']);
    Route::get('/out/{id}', [ProduitController::class, 'out']);
});

//client routes 

Route::middleware(['auth'])->group(function(){
    Route::post('/clientSearch', [ClientController::class, 'search'])->name('clientSearch');
    Route::get('/boncommandeclient', [BoncommandeclientController::class, 'index']);
    Route::get('/boncommandeclient/{id}/edit', [BoncommandeclientController::class, 'edit']);
    Route::get('/boncommandeclient/create', [BoncommandeclientController::class, 'create'])->name('createbonclient');
    Route::get('/boncommandeclient/{id}', [BoncommandeclientController::class, 'show']);
    Route::patch('/boncommandeclient/{id}', [BoncommandeclientController::class, 'update']);
    Route::delete('/boncommandeclient/{id}', [BoncommandeclientController::class, 'destroy']);
    Route::post('/boncommandeclient/add', [BoncommandeclientController::class, 'store']);
    Route::get('/lignecommandeclient/{id}', [LigneCommandeClientController::class, 'show']);
    Route::post('/lignecommandeclient', [LigneCommandeClientController::class, 'store']);

});

// Generate Routes

Route::middleware('auth')->group(function(){
    Route::get('generate/{id}', [GenerateController::class, 'display']);
    Route::get('generateclient/{id}', [GenerateController::class, 'displayclient']);
    Route::get('generateWithEnvoi/{id}',[GenerateController::class,'sendToFournisseur']);
    Route::get('generateWithEnvoiClient/{id}',[GenerateController::class,'sendToClient']);
});
