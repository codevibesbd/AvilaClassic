<?php

namespace Database\Seeders;

use App\Models\SitePage;
use Illuminate\Database\Seeder;

class SitePageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about',
                'title' => 'Corporate Profile & Enterprise Heritage',
                'meta_title' => 'Corporate Profile & Enterprise Heritage | Avila Classic',
                'meta_description' => 'Learn about Avila Classic Trading Inc., the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Bangladesh). Discover our corporate background, executive leadership, and manufacturing scale.',
                'banner_image' => '/images/banner/about-banner.jpg',
                'banner_title' => 'Two decades of manufacturing expertise. Direct to U.S. retail.',
                'banner_subtitle' => 'Enterprise Heritage • Victor Bags Group',
                'content' => [
                    'intro' => 'Avila Classic Trading Inc. connects U.S. retailers, regional chains, e-commerce brands, and corporate buyers directly with Victor Bags Factory Ltd., one of Bangladesh’s premier luggage and bag manufacturers.',
                    'metrics' => [
                        ['label' => 'Years Executive Leadership', 'value' => '20+'],
                        ['label' => 'Monthly Unit Capacity', 'value' => '200K'],
                        ['label' => 'C-TPAT & BSCI Certified', 'value' => '100%'],
                    ],
                ],
                'is_published' => true,
            ],
            [
                'slug' => 'manufacturing',
                'title' => 'Manufacturing Infrastructure & Testing Laboratories',
                'meta_title' => 'Manufacturing Infrastructure & Testing Laboratories | Avila Classic',
                'meta_description' => 'Technical overview of Victor Bags Factory Ltd. production infrastructure in Sarail, Brahmanbaria and QA laboratories in Dhaka. 15 lines, 880 machines, C-TPAT and BSCI certified.',
                'banner_image' => '/images/hero/slide-1-backpack.jpg',
                'banner_title' => '15 Assembly Lines. 880 Machines. 4 Testing Gates.',
                'banner_subtitle' => 'Victor Bags Industrial Complex • Brahmanbaria, Bangladesh',
                'content' => [
                    'intro' => 'Detailed technical overview of Victor Bags manufacturing complex, in-line testing apparatus, tensile stress jigs, and international compliance audits.',
                ],
                'is_published' => true,
            ],
            [
                'slug' => 'sustainability',
                'title' => 'Sustainable Materials, ESG & Circular Sourcing',
                'meta_title' => 'Sustainable Materials, ESG & Circular Sourcing | Avila Classic',
                'meta_description' => 'Explore Avila Classic and Victor Bags Factory Ltd.’s environmental stewardship: recycled rPET fabrics, GRS certification, energy efficiency, and zero-discharge standards.',
                'banner_image' => '/images/hero/slide-3-duffle.jpg',
                'banner_title' => 'Engineered for longevity. Certified for responsibility.',
                'banner_subtitle' => 'Environmental, Social & Corporate Governance (ESG) Protocol',
                'content' => [
                    'intro' => 'Responsible manufacturing through GRS-certified recycled polymers, closed-loop waste water treatment, and ethical workforce development.',
                ],
                'is_published' => true,
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact Global Sourcing Desks',
                'meta_title' => 'Contact Global Sourcing Desks | Avila Classic',
                'meta_description' => 'Get in touch with Avila Classic Trading Inc. US office and showroom in Jackson Heights, NY and manufacturing complex in Bangladesh. Inquire about wholesale and OEM/ODM supply.',
                'banner_image' => '/images/banner/contact-banner.jpg',
                'banner_title' => 'Connect with our directors.',
                'banner_subtitle' => 'Global Sourcing & Trade Desks',
                'content' => [
                    'intro' => 'Whether coordinating line reviews at our Jackson Heights showroom, reviewing technical prototypes, or placing wholesale replenishment orders, our team is at your disposal.',
                ],
                'is_published' => true,
            ],
        ];

        foreach ($pages as $p) {
            SitePage::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}

