<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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
    // il middleware serve per controllare che l'utente sia loggato
    // e che sia verificato quindi e nel mezzo tra la chiamata e la risposta
// })->middleware(['auth', 'verified'])->name('dashboard');

// Questo blocco di rotte è protetto dal middleware auth solo gli utenti autenticati
//  possono accedere a queste rotte. La configurazione utilizza anche il prefisso admin e assegna un nome di gruppo admin.
//  a queste rotte, facilitando il loro riferimento.
Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //resources genera tutte le rotte CRUD per il controller specificato
    // parameters personalizza URL per utilizzare lo slug al posto del id
    Route::resource('movies', MovieController::class)->parameters(['movies' => 'movie:slug']);
    Route::resource('books', BookController::class)->parameters(['books' => 'book:slug']);

});


// Questa route è protetta da auth, perché solo gli utenti autenticati possono accedere
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// include il file auth.php  che contiene le rotte di autenticazione generate automaticamente da Laravel.
// __DIR__ restituisce il percorso della directory corrente
require __DIR__.'/auth.php';

// La route di fallback reindirizza tutte le richieste non trovate alla dashboard dell'admin.
Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});