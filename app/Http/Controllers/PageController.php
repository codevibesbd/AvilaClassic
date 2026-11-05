<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\HomepageSection;
use App\Models\Inquiry;
use App\Models\Product;
use App\Models\SitePage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::featured()->orderBy('sort_order')->take(6)->get();
        $totalProducts = Product::count();
        $heroSlides = HeroSlide::active()->orderBy('sort_order')->get();
        $sections = HomepageSection::enabled()->get()->keyBy('section_key');

        $categories = [
            ['slug' => 'backpacks', 'name' => 'Backpacks & Daypacks', 'count' => Product::where('category', 'backpacks')->count(), 'icon' => 'backpack'],
            ['slug' => 'luggage', 'name' => 'Luggage & Trolleys', 'count' => Product::where('category', 'luggage')->count(), 'icon' => 'luggage'],
            ['slug' => 'duffle', 'name' => 'Duffle & Travel Bags', 'count' => Product::where('category', 'duffle')->count(), 'icon' => 'duffle'],
            ['slug' => 'briefcases', 'name' => 'Briefcases & Organizers', 'count' => Product::where('category', 'briefcases')->count(), 'icon' => 'briefcase'],
            ['slug' => 'totes', 'name' => 'Totes & Eco-Shoppers', 'count' => Product::where('category', 'totes')->count(), 'icon' => 'tote'],
            ['slug' => 'accessories', 'name' => 'Lifestyle & Accessories', 'count' => Product::where('category', 'accessories')->count(), 'icon' => 'pouch'],
        ];

        return view('pages.home', compact('featuredProducts', 'totalProducts', 'categories', 'heroSlides', 'sections'));
    }

    public function about()
    {
        $page = SitePage::getBySlug('about');
        return view('pages.about', compact('page'));
    }

    public function manufacturing()
    {
        $page = SitePage::getBySlug('manufacturing');
        return view('pages.manufacturing', compact('page'));
    }

    public function sustainability()
    {
        $page = SitePage::getBySlug('sustainability');
        return view('pages.sustainability', compact('page'));
    }

    public function contact()
    {
        $page = SitePage::getBySlug('contact');
        return view('pages.contact', compact('page'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'nullable|string|max:100',
            'volume' => 'nullable|string|max:100',
            'body' => 'required|string|max:4000',
        ]);

        Inquiry::create([
            'name' => $validated['name'],
            'company' => $validated['company'] ?? null,
            'email' => $validated['email'],
            'category' => $validated['category'] ?? 'General Portfolio Inquiry',
            'volume' => $validated['volume'] ?? null,
            'body' => $validated['body'],
            'status' => 'new',
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Your inquiry has been logged in our corporate ledger. An industrial project director will respond within 24 operational hours.');
    }
}
