<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.show');
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/mainCategories',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('mainCategories');
    Route::get('/maincategory',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('mainCategory.add');


    Route::get('/vendors',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('vendors');
    Route::get('/vendor',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('vendor.add');


    Route::get('/subCategories',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('subCategories');
    Route::get('/subcategory',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('subCategory.add');


    Route::get('/languages',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('languages');
    Route::get('/language',[\App\Http\Controllers\MainCategoryController::class,'index'])->name('language.add');
});
