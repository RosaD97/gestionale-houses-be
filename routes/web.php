<?php

use App\Http\Controllers\Admin\AffittuariController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\HouseController;
use App\Http\Controllers\Admin\PagamentiCrontoller;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
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

Route::get('/about-us', function () {
    return view('pages.aboutUs');
});

Route::get('/contact-us', function () {
    return view('pages.contactUs');
});

Route::get('/', [HouseController::class, 'home']);


// Middleware ad un gruppo di rotte
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

    // prendi lo slug(invece che al id che è di defoult)
    Route::resource('/houses', HouseController::class)->parameters(['houses' => 'house:slug']);
    Route::resource('/affittuari', AffittuariController::class);

    Route::post('/affittuari/{id}/add-pagamenti', [AffittuariController::class, 'addPagamenti'])->name('affittuari.addPagamenti');
    
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// include file dove ci sono altre rotte
require __DIR__ . '/auth.php';
