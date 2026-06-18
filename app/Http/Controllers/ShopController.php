<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with([
            'collection.category',
            'brand',
            'prices'
        ]);
        if ($request->filled('size')) {
            $query->whereHas('prices', function ($q) use ($request) {
                $q->where('size_id', $request->size);
            });
        }
        if ($request->brands) {
            $query->whereIn('brand_id', $request->brands);
        }
        if ($request->filled('min_price')) {
            $query->where('base_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('base_price', '<=', $request->max_price);
        }
        if ($request->sort == 'low') {
            $query->orderByRaw('CAST(base_price AS UNSIGNED) ASC');
        } elseif ($request->sort == 'high') {
            $query->orderByRaw('CAST(base_price AS UNSIGNED) DESC');
        } else {
            $query->latest();
        }
        if ($request->filled('category')) {
            $query->whereHas('collection', function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });
        }
        if ($request->filled('collection')) {
            $query->where('collection_id', $request->collection);
        }
        $products = $query->paginate(9)->withQueryString();
        $categories = Category::with('collections')
            ->withCount('products')
            ->get();
        $brands = Brand::withCount('products')->get();
        $sizes = Size::all();
        return view('category', compact(
            'products',
            'categories',
            'brands',
            'sizes'
        ));
    }
    public function show(Product $product)
    {
        $product->load([
            'collection.category',
            'brand',
            'prices.size'
        ]);
        return view('detail', compact('product'));
    }
}