<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::get('/', function () {
    return view('guest.welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth", "verified"])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::resource("projects", ProjectController::class);
    });

require __DIR__ . '/auth.php';
