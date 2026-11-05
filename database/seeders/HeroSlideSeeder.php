<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Aeropack Pro Executive 28L',
                'category_tag' => 'Discipline 01 // Technical Commuter',
                'sku' => 'AVC-BP-001',
                'spec_text' => '1680D Ballistic Nylon • YKK AquaGuard®',
                'image' => '/images/hero/slide-1-backpack.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'TransGlobal Polycarbonate Spinner 30"',
                'category_tag' => 'Discipline 02 // Polycarbonate Luggage',
                'sku' => 'AVC-LG-001',
                'spec_text' => 'Virgin Bayer Makrolon® • Hinomoto 360°',
                'image' => '/images/hero/slide-2-luggage.jpg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Nomad Heritage Field Pack 30L',
                'category_tag' => 'Discipline 03 // Heritage Field Pack',
                'sku' => 'AVC-BP-003',
                'spec_text' => '18oz Paraffin Canvas • Full-Grain Leather',
                'image' => '/images/hero/slide-3-duffle.jpg',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Metro Heritage Commuter Pack 24L',
                'category_tag' => 'Discipline 04 // Waxed Expedition Pack',
                'sku' => 'AVC-BC-002',
                'spec_text' => 'Waxed Cotton Twill • Solid Brass Rivets',
                'image' => '/images/hero/slide-4-commuter.jpg',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(['sku' => $slide['sku']], $slide);
        }
    }
}

