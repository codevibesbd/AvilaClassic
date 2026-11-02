<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::featured()->orderBy('sort_order')->take(6)->get();
        $totalProducts = Product::count();
        $categories = [
            ['slug' => 'backpacks', 'name' => 'Backpacks & Daypacks', 'count' => Product::where('category', 'backpacks')->count(), 'icon' => 'backpack'],
            ['slug' => 'luggage', 'name' => 'Luggage & Trolleys', 'count' => Product::where('category', 'luggage')->count(), 'icon' => 'luggage'],
            ['slug' => 'duffle', 'name' => 'Duffle & Travel Bags', 'count' => Product::where('category', 'duffle')->count(), 'icon' => 'duffle'],
            ['slug' => 'briefcases', 'name' => 'Briefcases & Organizers', 'count' => Product::where('category', 'briefcases')->count(), 'icon' => 'briefcase'],
            ['slug' => 'totes', 'name' => 'Totes & Eco-Shoppers', 'count' => Product::where('category', 'totes')->count(), 'icon' => 'tote'],
            ['slug' => 'accessories', 'name' => 'Lifestyle & Accessories', 'count' => Product::where('category', 'accessories')->count(), 'icon' => 'pouch'],
        ];

        return view('pages.home', compact('featuredProducts', 'totalProducts', 'categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function manufacturing()
    {
        return view('pages.manufacturing');
    }

    public function sustainability()
    {
        return view('pages.sustainability');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
