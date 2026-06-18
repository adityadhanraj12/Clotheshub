<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load([
            'collection.category',
            'brand',
            'prices.size',
            'additionalInformation'
        ]);

        return view('detail', compact('product'));
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $products = Product::where('name', 'LIKE', "%{$search}%")
            ->paginate(12);

        $categories = [];
        $brands = [];

        return view('category', compact(
            'products',
            'search',
            'categories',
            'brands'
        ));
    }


}