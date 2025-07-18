<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// 🔐 Admin Login Route (Token-based)
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// ✅ Model Profile Routes
Route::prefix('models')->group(function () {
    Route::post('/', [ModelProfileController::class, 'store']);
    Route::get('/', [ModelProfileController::class, 'index']);
    Route::get('/{slug}', [ModelProfileController::class, 'showBySlug']);
    Route::get('/{id}', [ModelProfileController::class, 'show']);
});

// ✅ Booking Routes
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index']); // TODO: make this admin-only protected later
Route::patch('/bookings/{id}', [BookingController::class, 'updateStatus']); // Admin use only

// ✅ Dashboard Route
Route::get('/dashboard', [AdminController::class, 'dashboard']); // Admin use only

// 🛡️ Secure routes with Sanctum in future (optional)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/bookings', [BookingController::class, 'index']);
//     Route::patch('/bookings/{id}', [BookingController::class, 'updateStatus']);
//     Route::get('/dashboard', [AdminController::class, 'dashboard']);
// });
