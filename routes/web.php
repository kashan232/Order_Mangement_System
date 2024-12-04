<?php

use App\Http\Controllers\CallerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalerController;
use App\Http\Controllers\SalesController;
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
// Github Connected
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::get('/adminpage', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('adminpage');

Route::get('/', function () {
    return view('welcome');
});


// // Customer Management
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::delete('/delete-customers/{id}', [CustomerController::class, 'delete_customers'])->middleware(['auth','admin'])->name('customers.destroy');


// // Sales Management
Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');
Route::post('sales/store', [SalesController::class, 'store'])->name('sales.store');
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::delete('/delete-sales/{id}', [CustomerController::class, 'delete_sales'])->middleware(['auth','admin'])->name('sales.destroy');



// Saler Management
Route::get('/salers/create', [SalerController::class, 'create'])->name('salers.create');
Route::post('saler/store', [SalerController::class, 'store'])->name('saler.store');
Route::get('/salers', [SalerController::class, 'index'])->name('salers.index');
Route::delete('/delete-salers/{id}', [SalerController::class, 'delete_salers'])->middleware(['auth','admin'])->name('saler.destroy');

// Caller Management
Route::get('/callers/create', [CallerController::class, 'create'])->name('callers.create');
Route::post('callers/store', [CallerController::class, 'store'])->name('callers.store');
Route::get('/callers', [CallerController::class, 'index'])->name('callers.index');
Route::delete('/delete-callers/{id}', [CallerController::class, 'delete_callers'])->middleware(['auth','admin'])->name('callers.destroy');

// // Product Management
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// // Order Management
// Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
// Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// // Customer Assign to Saler
// Route::get('/assign-customers', [CustomerAssignmentController::class, 'create'])->name('customers.assign');
// Route::get('/assigned-customers', [CustomerAssignmentController::class, 'index'])->name('customers.assigned');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
