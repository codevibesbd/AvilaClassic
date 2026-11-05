<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General & Identity
            ['key' => 'site_name', 'value' => 'Avila Classic', 'group' => 'general', 'type' => 'string'],
            ['key' => 'site_legal_name', 'value' => 'Avila Classic Trading Inc.', 'group' => 'general', 'type' => 'string'],
            ['key' => 'site_tagline', 'value' => 'U.S. Wholesale Sourcing Desk', 'group' => 'general', 'type' => 'string'],
            ['key' => 'tax_id', 'value' => '38-4379519', 'group' => 'general', 'type' => 'string'],
            ['key' => 'dos_id', 'value' => '7784195', 'group' => 'general', 'type' => 'string'],
            ['key' => 'logo_monogram', 'value' => 'AC', 'group' => 'general', 'type' => 'string'],

            // Contact & Operating Desks
            ['key' => 'contact_email', 'value' => 'info@avilaclassic.com', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'contact_phone', 'value' => '+1 (646) 206-9437', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'office_address_line1', 'value' => '37-15 73rd Street, Store L4', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'office_address_line2', 'value' => 'Jackson Heights, NY 11372, USA', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'factory_affiliate_name', 'value' => 'Victor Bags Factory Ltd.', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'factory_address_line1', 'value' => 'Vill: East Kottapara, PO: Sarail, Upazila: Sarail', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'factory_address_line2', 'value' => 'District: Brahmanbaria – 3430, Bangladesh', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'factory_office_dhaka', 'value' => 'Flat 1/D, House 7, Road 14/C, Sector 4, Uttara, Dhaka-1230', 'group' => 'contact', 'type' => 'string'],
            ['key' => 'office_hours', 'value' => 'Monday – Friday, 9:00 AM – 6:00 PM EST', 'group' => 'contact', 'type' => 'string'],

            // Header & Announcement
            ['key' => 'announcement_enabled', 'value' => '1', 'group' => 'header', 'type' => 'boolean'],
            ['key' => 'announcement_text', 'value' => 'AVILA CLASSIC TRADING INC. • New York Showroom & Bangladesh Manufacturing', 'group' => 'header', 'type' => 'string'],
            ['key' => 'announcement_badge', 'value' => 'Catalog & Specification Archives (B2B Only)', 'group' => 'header', 'type' => 'string'],
            ['key' => 'header_cta_label', 'value' => 'Direct Inquiries', 'group' => 'header', 'type' => 'string'],
            ['key' => 'header_cta_url', 'value' => '/contact', 'group' => 'header', 'type' => 'string'],

            // Homepage Hero
            ['key' => 'hero_badge', 'value' => 'Direct-From-Manufacturer Wholesale • U.S. Distribution', 'group' => 'homepage', 'type' => 'string'],
            ['key' => 'hero_headline', 'value' => '15 production lines in Bangladesh.', 'group' => 'homepage', 'type' => 'string'],
            ['key' => 'hero_headline_highlight', 'value' => 'Factory-direct U.S. supply.', 'group' => 'homepage', 'type' => 'string'],
            ['key' => 'hero_copy', 'value' => 'We are Avila Classic Trading Inc., the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. We supply high-grade luggage, technical backpacks, and travel gear from U.S. stock at factory pricing, offering lower MOQs and faster replenishment for retailers, e-commerce brands, and corporate buyers.', 'group' => 'homepage', 'type' => 'text'],
            ['key' => 'hero_cta_primary_label', 'value' => 'Inspect 12 Catalog Pieces →', 'group' => 'homepage', 'type' => 'string'],
            ['key' => 'hero_cta_primary_url', 'value' => '/products', 'group' => 'homepage', 'type' => 'string'],
            ['key' => 'hero_cta_secondary_label', 'value' => 'The Factory & QA Standards', 'group' => 'homepage', 'type' => 'string'],
            ['key' => 'hero_cta_secondary_url', 'value' => '/manufacturing', 'group' => 'homepage', 'type' => 'string'],

            // SEO & Social Defaults
            ['key' => 'meta_title', 'value' => 'Avila Classic | Factory-Direct Luggage & Backpack Wholesale Distributor', 'group' => 'seo', 'type' => 'string'],
            ['key' => 'meta_description', 'value' => 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Bangladesh). Factory pricing from U.S. stock, lower MOQs, 1,100+ workforce, 200,000 units/mo capacity, C-TPAT and BSCI certified.', 'group' => 'seo', 'type' => 'text'],
            ['key' => 'og_image', 'value' => '/images/og-share.jpg', 'group' => 'seo', 'type' => 'string'],

            // Footer
            ['key' => 'footer_statement', 'value' => 'Avila Classic Trading Inc. is a New York corporation serving as the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Brahmanbaria, Bangladesh). Supplying factory-direct luggage, technical backpacks, and private-label travel gear from U.S. stock. Backed by 1,100+ artisans, 15 production lines, and 200,000 units monthly capacity.', 'group' => 'footer', 'type' => 'text'],
            ['key' => 'footer_copyright', 'value' => 'Avila Classic Trading Inc. All rights reserved. Purely for architectural demonstration & technical specification review. Non-commercial catalog.', 'group' => 'footer', 'type' => 'string'],

            // Custom Head & Body Scripts
            ['key' => 'custom_head_scripts', 'value' => '', 'group' => 'code', 'type' => 'text'],
            ['key' => 'custom_body_scripts', 'value' => '', 'group' => 'code', 'type' => 'text'],
        ];

        foreach ($settings as $item) {
            Setting::updateOrCreate(['key' => $item['key']], $item);
        }
    }
}

