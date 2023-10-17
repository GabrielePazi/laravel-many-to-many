<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
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

        //CREATE
        Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");
        Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");

        //READ
        Route::get("/projects/{project}/restore", [ProjectController::class, "restore"])->name("projects.restore");
        Route::get("/projects/deleted", [ProjectController::class, "indexDeleted"])->name("projects.partials.deleted");
        Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");
        Route::get("/projects/{project}", [ProjectController::class, "show"])->name("projects.show");

        //UPDATE
        Route::get("/projects/{project}/edit", [ProjectController::class, "edit"])->name("projects.edit");
        Route::patch("/projects/{project}", [ProjectController::class, "update"])->name("projects.update");

        //DELETE
        Route::delete("/projects/{project}", [ProjectController::class, "destroy"])->name("projects.destroy");

        //ROUTES FOR THE TECHNOLOGIES

        //CREATE
        Route::get("/technologies/create", [TechnologyController::class, "create"])->name("technologies.create");
        Route::post("/technologies", [TechnologyController::class, "store"])->name("technologies.store");

        //READ
        Route::get("/technologies", [TechnologyController::class, "index"])->name("technologies.index");
        Route::get("/technologies/{technology}", [TechnologyController::class, "show"])->name("technologies.show");

        //UPDATE
        Route::get("/technologies/{technology}/edit", [TechnologyController::class, "edit"])->name("technologies.edit");
        Route::patch("/technologies/{technology}", [TechnologyController::class, "update"])->name("technologies.update");

        //DELETE
        Route::delete("/technologies/{technology}", [TechnologyController::class, "destroy"])->name("technologies.destroy");


        //ROUTES FOR THE TYPES

        //CREATE
        Route::get("/types/create", [TypeController::class, "create"])->name("types.create");
        Route::post("/types", [TypeController::class, "store"])->name("types.store");

        //READ
        Route::get("/types", [TypeController::class, "index"])->name("types.index");
        Route::get("/types/{type}", [TypeController::class, "show"])->name("types.show");

        //UPDATE
        Route::get("/types/{type}/edit", [TypeController::class, "edit"])->name("types.edit");
        Route::patch("/types/{type}", [TypeController::class, "update"])->name("types.update");

        //DELETE
        Route::delete("/types/{type}", [TypeController::class, "destroy"])->name("types.destroy");
    });

require __DIR__ . '/auth.php';
