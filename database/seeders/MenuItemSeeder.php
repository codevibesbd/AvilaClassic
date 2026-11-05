<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Header
            ['location' => 'header', 'label' => 'Overview', 'url' => '/', 'sort_order' => 1, 'is_active' => true],
            ['location' => 'header', 'label' => 'Catalog', 'url' => '/products', 'sort_order' => 2, 'is_active' => true],
            ['location' => 'header', 'label' => 'Manufacturing', 'url' => '/manufacturing', 'sort_order' => 3, 'is_active' => true],
            ['location' => 'header', 'label' => 'Sustainability', 'url' => '/sustainability', 'sort_order' => 4, 'is_active' => true],
            ['location' => 'header', 'label' => 'About', 'url' => '/about', 'sort_order' => 5, 'is_active' => true],
            ['location' => 'header', 'label' => 'Contact', 'url' => '/contact', 'sort_order' => 6, 'is_active' => true],

            // Footer Enterprise
            ['location' => 'footer_enterprise', 'label' => 'Overview', 'url' => '/', 'sort_order' => 1, 'is_active' => true],
            ['location' => 'footer_enterprise', 'label' => 'Specification Catalog', 'url' => '/products', 'sort_order' => 2, 'is_active' => true],
            ['location' => 'footer_enterprise', 'label' => 'Company Heritage', 'url' => '/about', 'sort_order' => 3, 'is_active' => true],
            ['location' => 'footer_enterprise', 'label' => 'Factory & Assembly Lines', 'url' => '/manufacturing', 'sort_order' => 4, 'is_active' => true],
            ['location' => 'footer_enterprise', 'label' => 'Sustainable Materials', 'url' => '/sustainability', 'sort_order' => 5, 'is_active' => true],
            ['location' => 'footer_enterprise', 'label' => 'Direct Sourcing Desks', 'url' => '/contact', 'sort_order' => 6, 'is_active' => true],

            // Footer Disciplines
            ['location' => 'footer_disciplines', 'label' => 'Executive & Ballistic Backpacks', 'url' => '/products?category=backpacks', 'sort_order' => 1, 'is_active' => true],
            ['location' => 'footer_disciplines', 'label' => 'Polycarbonate & Hybrid Luggage', 'url' => '/products?category=luggage', 'sort_order' => 2, 'is_active' => true],
            ['location' => 'footer_disciplines', 'label' => 'Weatherproof Weekenders & Duffels', 'url' => '/products?category=duffle', 'sort_order' => 3, 'is_active' => true],
            ['location' => 'footer_disciplines', 'label' => 'Full-Grain Leather Briefcases', 'url' => '/products?category=briefcases', 'sort_order' => 4, 'is_active' => true],
            ['location' => 'footer_disciplines', 'label' => 'Canvas & Heavyweight Totes', 'url' => '/products?category=totes', 'sort_order' => 5, 'is_active' => true],
            ['location' => 'footer_disciplines', 'label' => 'Technical Pouches & Dopp Kits', 'url' => '/products?category=accessories', 'sort_order' => 6, 'is_active' => true],
        ];

        foreach ($items as $item) {
            MenuItem::updateOrCreate(
                ['location' => $item['location'], 'label' => $item['label']],
                $item
            );
        }
    }
}

