<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create/', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products/', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{pid}/edit/', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{pid}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{pid}', [ProductController::class, 'destroy'])->name('products.destroy');
// Route::resource('/products', ProductController::class);
Route::resource('teachers', TeacherController::class);


