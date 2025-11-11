<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request -> validate([
            'name' => 'required|string|max:255',
            
            'description' => 'nullable|string|max:255',
        ]);
        $productCategory = ProductCategory::create($validateData);
        return response()->json($productCategory, 201);
    } 
    //
}
