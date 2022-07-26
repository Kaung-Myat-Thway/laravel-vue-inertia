<?php

use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('products',[ProductController::class,'index'])->name('products.index');
Route::post('products',[ProductController::class,'store'])->name('products.store');
Route::get('products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('products/{product}/',[ProductController::class,'update'])->name('products.update');
Route::delete('products/{product}/',[ProductController::class,'destroy'])->name('products.destory');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
