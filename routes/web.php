<?php

use App\Models\Dashboard\Education;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\SkillController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\PricingController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EducationController;
use App\Http\Controllers\Dashboard\InterestsController;
use App\Http\Controllers\Dashboard\KnowledgeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Dashboard\LanguageSkillsController;

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

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dash.index');
    Route::resource('skills', SkillController::class)->except('show');
    Route::resource('services', ServiceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('prices', PricingController::class);
    Route::resource('knowledges', KnowledgeController::class);
    Route::resource('interests', InterestsController::class);

    // nicer ta korte hobe
    Route::resource('language-skills', LanguageSkillsController::class)->except('show');


    Route::get('partners/create', [ClientController::class, 'create'])->name('partners.create');
    Route::get('partners', [ClientController::class, 'index'])->name('partners.index');
    Route::Post('partners', [ClientController::class, 'store'])->name('partners.store');
    Route::get('partners/{client}/edit', [ClientController::class, 'edit'])->name('partners.edit');
    Route::put('partners/{client}', [ClientController::class, 'update'])->name('partners.update');
    Route::delete('partners/{client}', [ClientController::class, 'destroy'])->name('partners.destroy');
});



require __DIR__ . '/auth.php';
