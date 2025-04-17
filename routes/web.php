<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// route user management
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
    
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});


// route request management
Route::middleware('auth')->group(function () {
    Route::get('/request', [ReqController::class, 'index'])->name('request.index');
    Route::get('/request/show/{id}', [ReqController::class, 'show'])->name('request.show');
    
    Route::get('/request/create', [ReqController::class, 'create'])->name('request.create');
    Route::post('/request/create', [ReqController::class, 'store'])->name('request.store');
    
    Route::get('/request/edit/{id}', [ReqController::class, 'edit'])->name('request.edit');
    Route::put('/request/edit/{id}', [ReqController::class, 'update'])->name('request.update');
    
    Route::delete('/request/delete/{mwo}', [ReqController::class, 'destroy'])->name('request.destroy');
});

// route request management
Route::middleware('auth')->group(function () {
    Route::get('/verify', [VerifyController::class, 'index'])->name('verify.index');
    Route::get('/verify/show/{id}', [VerifyController::class, 'show'])->name('verify.show');
    
    Route::get('/verify/create', [VerifyController::class, 'create'])->name('verify.create');
    Route::post('/verify/create', [VerifyController::class, 'store'])->name('verify.store');
    
    Route::get('/verify/edit/{id}', [VerifyController::class, 'edit'])->name('verify.edit');
    Route::put('/verify/edit/{id}', [VerifyController::class, 'update'])->name('verify.update');
    
    Route::delete('/verify/delete/{mwo}', [VerifyController::class, 'destroy'])->name('verify.destroy');
});

require __DIR__.'/auth.php';
