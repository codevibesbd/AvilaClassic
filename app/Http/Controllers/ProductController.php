<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $currentCategory = $request->query('category', 'all');
        $searchTerm = $request->query('search', $request->query('q', ''));
        $sustainableOnly = $request->boolean('sustainable');
        $sort = $request->query('sort', 'default');

        $query = Product::query();

        if ($currentCategory && $currentCategory !== 'all') {
            $query->where('category', $currentCategory);
        }

        if (! empty($searchTerm)) {
            $query->search($searchTerm);
        }

        if ($sustainableOnly) {
            $query->where('is_sustainable', true);
        }

        switch ($sort) {
            case 'name_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'capacity':
                $query->orderByRaw('CAST(capacity AS UNSIGNED) desc');
                break;
            default:
                $query->orderBy('sort_order', 'asc');
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = [
            'all' => ['name' => 'All Products', 'count' => Product::count()],
            'backpacks' => ['name' => 'Backpacks & Daypacks', 'count' => Product::where('category', 'backpacks')->count()],
            'luggage' => ['name' => 'Luggage & Trolleys', 'count' => Product::where('category', 'luggage')->count()],
            'duffle' => ['name' => 'Duffle & Travel Gear', 'count' => Product::where('category', 'duffle')->count()],
            'briefcases' => ['name' => 'Briefcases & Organizers', 'count' => Product::where('category', 'briefcases')->count()],
            'totes' => ['name' => 'Totes & Eco-Shoppers', 'count' => Product::where('category', 'totes')->count()],
            'accessories' => ['name' => 'Lifestyle & Accessories', 'count' => Product::where('category', 'accessories')->count()],
        ];

        return view('products.index', compact(
            'products',
            'categories',
            'currentCategory',
            'searchTerm',
            'sustainableOnly',
            'sort'
        ));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where(function ($q) use ($product) {
                $q->where('category', $product->category)
                    ->orWhere('is_featured', true);
            })
            ->take(3)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
