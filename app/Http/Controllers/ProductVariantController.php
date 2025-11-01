<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    // 1️⃣ Menampilkan semua produk (GET)
    public function index()
    {
        $products = ProductVariant::all();
        return response()->json($products);
    }

    // 2️⃣ Menampilkan detail produk (GET /id)
    public function show($id)
    {
        $product = ProductVariant::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
        return response()->json($product);
    }

    // 3️⃣ Menyimpan produk baru (POST)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|min:10',
        ]);

        $product = ProductVariant::create($validated);
        return response()->json($product, 201);
    }

    // 4️⃣ Memperbarui produk (PUT /id)
    public function update(Request $request, $id)
    {
        $product = ProductVariant::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'nullable|min:10',
        ]);

        $product->update($validated);
        return response()->json(['message' => 'Produk berhasil diperbarui', 'data' => $product]);
    }

    // 5️⃣ Menghapus produk (DELETE /id)
    public function destroy($id)
    {
        $product = ProductVariant::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
