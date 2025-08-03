<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//  Routes admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::get('/medicine', [MedicineController::class, 'index'])->middleware(['auth', 'role:admin'])->name('medicine');

Route::get('/batch-inventory', function (){
    return view('batch-inventory');
})->middleware(['auth', 'verified'])->name('batch-inventory');
Route::get('/supplier', function (){
    return view('supplier');
})->middleware(['auth', 'verified'])->name('supplier');
Route::get('/expiry-monitoring', function (){
    return view('Expiry-Monitoring');
})->middleware(['auth', 'verified'])->name('expiry-monitoring');
Route::get('/low-stock-alert', function (){
    return view('low-stock-alert');
})->middleware(['auth', 'verified'])->name('low-stock-alert');
Route::get('/report', function (){
    return view('report');
})->middleware(['auth', 'verified'])->name('report');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
    

});


Route::get('/medicines/search', [MedicineController::class, 'search'])->name('medicines.search');


// Routes user
Route::get('/user/dashboard', function () {
    return view('user');
})->middleware(['auth', 'role:user'])->name('user.dashboard');

require __DIR__.'/auth.php';
