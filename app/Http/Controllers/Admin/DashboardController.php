<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use App\Models\Inquiry;
use App\Models\Media;
use App\Models\Product;
use App\Models\SitePage;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'featured_products' => Product::where('is_featured', true)->count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'total_inquiries' => Inquiry::count(),
            'total_slides' => HeroSlide::count(),
            'total_pages' => SitePage::count(),
            'total_media' => Media::count(),
            'total_users' => User::count(),
        ];

        $recentInquiries = Inquiry::latest()->take(5)->get();
        $recentProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentProducts'));
    }
}

