<?php

use App\Http\Controllers\EntrepreneurController;
use App\Http\Controllers\PrincipaleDepenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\SecteurController;
use App\Models\PrincipaleDepense;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(callback: function () {
    Route::get('/all', [SecteurController::class, 'index'])->name('secteur.index');
    Route::get('/secteur', [SecteurController::class, 'create'])->name('secteur.create');
    Route::get('/secteur/{id}', [SecteurController::class, 'show'])->name('secteur.show');
    Route::get('/secteur/edit', [SecteurController::class, 'edit'])->name('secteur.edit');
    Route::post('/secteur/store', [SecteurController::class, 'store'])->name('secteur.store');
    Route::post('/secteur/update', [SecteurController::class, 'update'])->name('secteur.update');
    Route::delete('/secteur/delete', [SecteurController::class, 'destroy'])->name('secteur.destroy');

});
Route::middleware('auth')->group(callback: function () {
    Route::get('/entrepreneurs', [EntrepreneurController::class, 'index'])->name('entrepreneur.index');
    Route::get('/entrepreneur', [EntrepreneurController::class, 'create'])->name('entrepreneur.create');
    Route::get('/entrepreneur/{id}', [EntrepreneurController::class, 'show'])->name('entrepreneur.show');
    Route::get('/entrepreneur/edit', [EntrepreneurController::class, 'edit'])->name('entrepreneur.edit');
    Route::post('/entrepreneur/store', [EntrepreneurController::class, 'store'])->name('entrepreneur.store');
    Route::post('/entrepreneur/update', [EntrepreneurController::class, 'update'])->name('entrepreneur.update');
    Route::delete('/entrepreneur/delete', [EntrepreneurController::class, 'destroy'])->name('entrepreneur.destroy');

});
Route::middleware('auth')->group(callback: function () {
    Route::get('/projets', [ProjetController::class, 'index'])->name('projet.index');
    Route::get('/projet', [ProjetController::class, 'create'])->name('projet.create');
    Route::get('/projet/{id}', [ProjetController::class, 'show'])->name('projet.show');
    Route::get('/projet/edit', [ProjetController::class, 'edit'])->name('projet.edit');
    Route::post('/projet/store', [ProjetController::class, 'store'])->name('projet.store');
    Route::post('/principale-depense/store', [PrincipaleDepenseController::class, 'store'])->name('principale-depense.store');
    Route::post('/projet/update', [ProjetController::class, 'update'])->name('projet.update');
    Route::delete('/projet/delete', [ProjetController::class, 'destroy'])->name('projet.destroy');

});


require __DIR__.'/auth.php';
