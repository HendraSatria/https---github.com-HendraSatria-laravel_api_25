<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductVariantController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Semua route di sini otomatis memiliki prefix '/api'.
| Jadi, endpoint kamu akan diakses melalui http://localhost:8000/api/...
*/

// ✅ Endpoint user bawaan Laravel (pakai Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'message' => 'Halo, ini adalah endpoint untuk mengambil data pengguna.',
        'data' => $request->user(),
    ]);
});

// ✅ Produk (contoh biasa)
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

// ✅ Vendor (pakai resource controller)
Route::resource('vendor', VendorController::class);

// ✅ Product Variants (tanpa middleware → bisa diakses publik)
Route::get('/product-variants', [ProductVariantController::class, 'index']);       // Menampilkan semua produk
Route::get('/product-variants/{id}', [ProductVariantController::class, 'show']);   // Menampilkan detail produk

// ✅ Product Variants (hanya admin bisa POST, PUT, DELETE)
Route::middleware(['checkRole:admin'])->group(function () {
    Route::post('/product-variants', [ProductVariantController::class, 'store']);     // Tambah produk
    Route::put('/product-variants/{id}', [ProductVariantController::class, 'update']); // Update produk
    Route::delete('/product-variants/{id}', [ProductVariantController::class, 'destroy']); // Hapus produk
});
