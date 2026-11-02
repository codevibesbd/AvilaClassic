<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        $staticRoutes = [
            ['url' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => url('/products'), 'priority' => '0.9', 'changefreq' => 'daily'],
            [
                'url' => url('/about'),
                'priority' => '0.8',
                'changefreq' => 'monthly',
                'image' => [
                    'loc' => asset('images/banner/about-banner.jpg'),
                    'title' => 'Avila Classic Trading Inc. Enterprise Heritage & Travel Gear Collection',
                    'caption' => 'Official wholesale bags, luggage, and travel gear collection banner.',
                ],
            ],
            ['url' => url('/manufacturing'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => url('/sustainability'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            [
                'url' => url('/contact'),
                'priority' => '0.7',
                'changefreq' => 'monthly',
                'image' => [
                    'loc' => asset('images/banner/contact-banner.jpg'),
                    'title' => 'Avila Classic Trading Inc. Corporate Showroom & Global Sourcing Desk',
                    'caption' => 'Official showroom and corporate headquarters banner in Jackson Heights, NY.',
                ],
            ],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'."\n";

        foreach ($staticRoutes as $route) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.htmlspecialchars($route['url'])."</loc>\n";
            $xml .= '    <lastmod>'.date('Y-m-d')."</lastmod>\n";
            $xml .= '    <changefreq>'.$route['changefreq']."</changefreq>\n";
            $xml .= '    <priority>'.$route['priority']."</priority>\n";
            if (! empty($route['image'])) {
                $xml .= "    <image:image>\n";
                $xml .= '      <image:loc>'.htmlspecialchars($route['image']['loc'])."</image:loc>\n";
                $xml .= '      <image:title>'.htmlspecialchars($route['image']['title'])."</image:title>\n";
                $xml .= '      <image:caption>'.htmlspecialchars($route['image']['caption'])."</image:caption>\n";
                $xml .= "    </image:image>\n";
            }
            $xml .= "  </url>\n";
        }

        foreach ($products as $product) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.htmlspecialchars(route('products.show', $product->slug))."</loc>\n";
            $xml .= '    <lastmod>'.$product->updated_at->format('Y-m-d')."</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.85</priority>\n";
            if (! empty($product->primary_image)) {
                $xml .= "    <image:image>\n";
                $xml .= '      <image:loc>'.htmlspecialchars($product->primary_image)."</image:loc>\n";
                $xml .= '      <image:title>'.htmlspecialchars($product->title)."</image:title>\n";
                $xml .= '      <image:caption>'.htmlspecialchars($product->summary)."</image:caption>\n";
                $xml .= "    </image:image>\n";
            }
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
        ]);
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";

        $content .= "# AI Crawlers & Large Language Models\n";
        $content .= "User-agent: GPTBot\n";
        $content .= "Allow: /\n\n";
        $content .= "User-agent: ClaudeBot\n";
        $content .= "Allow: /\n\n";
        $content .= "User-agent: PerplexityBot\n";
        $content .= "Allow: /\n\n";
        $content .= "User-agent: Google-Extended\n";
        $content .= "Allow: /\n\n";
        $content .= "User-agent: Applebot-Extended\n";
        $content .= "Allow: /\n\n";

        $content .= 'Sitemap: '.url('/sitemap.xml')."\n";
        $content .= "# AI Context Manifests\n";
        $content .= '# llms.txt: '.url('/llms.txt')."\n";
        $content .= '# llms-full.txt: '.url('/llms-full.txt')."\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=utf-8',
        ]);
    }

    public function llms(): Response
    {
        $products = Product::orderBy('sort_order')->get();

        $md = "# Avila Classic Trading Inc.\n\n";
        $md .= "> Avila Classic Trading Inc. is a New York corporation serving as the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Brahmanbaria, Bangladesh). Supplying factory-direct luggage, technical backpacks, smart travel gear, and private-label collections from U.S. stock to retailers, regional chains, e-commerce brands, and corporate buyers.\n\n";

        $md .= "## Enterprise & Corporate Overview\n";
        $md .= "- **Company Name:** Avila Classic Trading Inc. (Avila Classic)\n";
        $md .= "- **Corporate Legal Entity:** New York Domestic Business Corporation (BCL §402, DOS ID: 7784195, EIN: 38-4379519)\n";
        $md .= "- **U.S. Corporate Office & B2B Showroom:** 37-15 73rd Street, Store L4, Jackson Heights, NY 11372, USA\n";
        $md .= "- **Executive Leadership:** Nazmul Islam, Chief Executive Officer (CEO) & Majority Shareholder (20+ years bag manufacturing and international trade experience; Chairman of Victor Bags Factory Ltd.)\n";
        $md .= "- **Foreign Affiliate & Manufacturer:** Victor Bags Factory Ltd. (Reg. No. CH-13365, TIN: 456760920506)\n";
        $md .= "- **Manufacturing Complex:** Vill: East Kottapara, PO: Sarail, Upazila: Sarail, District: Brahmanbaria – 3430, Bangladesh (1.42 acres owned)\n";
        $md .= "- **Corporate Desk (Bangladesh):** Flat 1/D, House 7, Road 14/C, Sector 4, Uttara, Dhaka-1230, Bangladesh\n";
        $md .= "- **Product Development Desks:** In-house sample development in Bangladesh (24 machines, 28 staff) & Quanzhou, Fujian, China\n";
        $md .= "- **Corporate Telephone:** +1 (646) 206-9437\n";
        $md .= "- **Sourcing Email:** info@avilaclassic.com\n";
        $md .= '- **Website:** '.url('/')."\n\n";

        $md .= "## Core Operational & Manufacturing Metrics\n";
        $md .= "- **Monthly Production Capacity:** Approximately 200,000 units per month\n";
        $md .= "- **Production Infrastructure:** 15 dedicated conveyor production lines with 880 machines\n";
        $md .= "- **Workforce:** Over 1,100 full-time artisans, tailors, technicians, and managers\n";
        $md .= "- **Annual Revenue (Foreign Affiliate):** BDT 670.6 million (FY 2024-25, 73.9% annual growth)\n";
        $md .= "- **International Client Roster:** Samsonite (Multi-million USD supply contracts), Walmart, Centric Brands (USA), ALDI & LIDL (Germany), Intersport (Switzerland), El Corte Inglés (Spain), Scroll (Japan), Travelers Club Luggage (La Palma, California)\n";
        $md .= "- **Compliance & Security Certifications:** C-TPAT (U.S. Customs-Trade Partnership Against Terrorism), BSCI (Business Social Compliance Initiative), ISO 14001 (Environmental Management), Nirapon, CPSIA (Children's Product Safety Certificates), California Proposition 65\n";
        $md .= "- **U.S. Tariff & Trade Advantage:** Goods from Bangladesh enter under general HTS Chapter 42 tariffs and are 100% exempt from U.S. Section 301 punitive tariffs (which add 7.5%–25% to Chinese imports). Bangladesh bonded warehouse license enables duty-free raw material imports for export assembly.\n";
        $md .= "- **U.S. Supply & Wholesale Model:** Direct-from-manufacturer pricing from U.S. stock, lower MOQs, 45-day payment terms, rapid replenishment, and full private-label OEM/ODM development for retailers and digital-first brands.\n\n";

        $md .= "## Product Disciplines & Catalog Categories\n";
        $md .= "1. **Professional Travel Gear:** Hard-side & soft-side luggage, carry-ons, business travel bags, wheeled duffles.\n";
        $md .= "2. **Smart Luggage:** Luggage with tracking integration, USB charging ports, lightweight German polycarbonate shells.\n";
        $md .= "3. **Backpacks & Technical Accessories:** Ballistic nylon commuter packs, laptop bags, hiking bags, tote bags, lunch/cooler bags, promotional bags.\n";
        $md .= "4. **Private Label & Customization:** Full-package OEM/ODM engineering, sampling, and manufacturing for Amazon FBA, Shopify, and enterprise retail brands.\n\n";
        $md .= "Note: Products displayed on the Avila Classic website are for catalog viewing, material evaluation, and technical specification review. Direct consumer purchasing is not hosted on this trade portal.\n\n";

        foreach ($products as $p) {
            $md .= '- **['.$p->title.']('.route('products.show', $p->slug).')** ('.$p->category_name.') - '.$p->summary.' | Capacity: '.($p->capacity ?? 'N/A').' | Material: '.$p->primary_material."\n";
        }

        $md .= "\n## Key Navigational Pages\n";
        $md .= '- [Overview / Home]('.url('/')."): Enterprise summary, factory capabilities, and featured product specifications.\n";
        $md .= '- [Product Catalog]('.url('/products')."): Complete technical specification archives across 6 disciplines.\n";
        $md .= '- [Company Heritage]('.url('/about')."): Background on Avila Classic Trading Inc., Victor Bags Factory Ltd., and leadership profile.\n";
        $md .= '- [Manufacturing Capabilities]('.url('/manufacturing')."): 15 production lines, 880 machines, QA testing laboratory, and 5-stage workflow.\n";
        $md .= '- [Sustainability & ESG]('.url('/sustainability')."): ISO 14001, GRS recycled rPET, C-TPAT security, and ethical labor standards.\n";
        $md .= '- [Contact & Showroom]('.url('/contact')."): Jackson Heights, NY corporate showroom and Bangladesh manufacturing contacts.\n";

        return response($md, 200, [
            'Content-Type' => 'text/markdown; charset=utf-8',
        ]);
    }

    public function llmsFull(): Response
    {
        $products = Product::orderBy('sort_order')->get();

        $md = "# Avila Classic Trading Inc. - Comprehensive Knowledge Base\n\n";
        $md .= "## 1. Corporate Identity, Legal Standing & L-1A Executive Leadership\n";
        $md .= "Avila Classic Trading Inc. is a New York domestic business corporation incorporated on December 16, 2025 under Section 402 of the Business Corporation Law (DOS ID: 7784195; Filing No. 251216003845; EIN: 38-4379519). The corporation is authorized to issue 1,500 shares of common stock at $50.00 par value ($75,000 total capital stock).\n\n";
        $md .= "Avila Classic Trading Inc. serves as the exclusive U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Brahmanbaria, Bangladesh). Both entities are affiliated under 8 CFR 214.2(l)(1)(ii)(L)(1) through common majority ownership and control by Mr. Nazmul Islam (70% owner of Victor Bags Factory Ltd. and 60% owner of Avila Classic Trading Inc.).\n\n";
        $md .= "Mr. Nazmul Islam serves as Chief Executive Officer (CEO) of Avila Classic Trading Inc. and has served as full-time Chairman of Victor Bags Factory Ltd. since September 2019. He possesses approximately 20 years of executive experience in the manufacture, supply, and international distribution of bags and luggage. In addition to Victor Bags, Mr. Islam chairs related manufacturing enterprises in Bangladesh—including Rider Leather Bags & Luggage Factory Ltd. (operating since 2013) and Stark Bag Industries Ltd. (est. 2018)—and owns Avila Classic Trading L.L.C. in Dubai, UAE (est. March 2022), an established bag and luggage importer and wholesaler serving retail, hypermarket, and B2B clients across the Gulf region.\n\n";

        $md .= "## 2. Foreign Affiliate: Victor Bags Factory Ltd.\n";
        $md .= "- **Incorporation:** Incorporated August 28, 2019 under the Bangladesh Companies Act 1994 (RJSC Reg. No. CH-13365; TIN: 456760920506).\n";
        $md .= "- **Registered Office & Factory Complex:** Vill: East Kottapara, PO: Sarail, Upazila: Sarail, District: Brahmanbaria – 3430, Bangladesh. The facility occupies 1.42 acres of company-owned industrial land (Registered Deed No. 8138).\n";
        $md .= "- **Corporate Office:** Flat 1/D, House 7, Road 14/C, Sector 4, Uttara, Dhaka-1230, Bangladesh.\n";
        $md .= "- **Sample & Product Development:** Dedicated sample development department in Bangladesh (24 machines, 28 specialized staff) and a product development office in Quanzhou, Fujian, China.\n";
        $md .= "- **Manufacturing Capacity:** Approximately 200,000 units per month across 15 production lines equipped with 880 advanced industrial sewing and molding machines.\n";
        $md .= "- **Workforce:** Over 1,100 full-time employees.\n";
        $md .= "- **Financial Growth:** Fiscal Year 2024-25 revenue reached BDT 670,648,138 (+73.9% year-over-year growth) with gross profit exceeding BDT 100 million.\n";
        $md .= "- **International Brand Track Record:** Manufacturer for global labels including Samsonite (Sales Contract VBF25003 for $3.34M), Walmart, Centric Brands (USA), ALDI & LIDL (Germany), Intersport (Switzerland), El Corte Inglés (Spain), and Travelers Club Luggage (California, USA).\n\n";

        $md .= "## 3. U.S. Distribution Model & Strategic Advantages\n";
        $md .= "Avila Classic Trading Inc. solves a fundamental barrier in the North American retail market: while large multinational retailers can order full container loads on FOB terms, thousands of mid-size retailers, regional chains, e-commerce brands (Amazon FBA, Shopify), and corporate buyers cannot commit to container minimums, navigate ocean customs, or wait 45+ days for maritime transit.\n\n";
        $md .= "- **Direct-From-Manufacturer Channel:** Replaces intermediary import agents and brokers, offering U.S. buyers direct factory-level pricing combined with lower minimum order quantities (MOQs).\n";
        $md .= "- **U.S. Stock & Fast Replenishment:** Inventory is warehoused with a licensed third-party logistics (3PL) provider in the New York/New Jersey area (and expanding to the West Coast), enabling rapid 1–3 day ground fulfillment.\n";
        $md .= "- **Commercial Terms:** 45-day payment terms offered to qualified wholesale accounts, backed by Victor Bags' 120-day supplier credit terms to Avila.\n";
        $md .= "- **Trade & Tariff Arbitrage:** Goods produced in Bangladesh enter the U.S. under standard HTS Chapter 42 tariff rates and are 100% exempt from the Section 301 punitive tariffs (7.5%–25%) levied on Chinese-manufactured luggage and bags. Combined with Bangladesh's bonded warehouse duty-free raw material imports, this provides an enduring pricing and supply chain advantage.\n\n";

        $md .= "## 4. Quality Control, Physical Testing & Compliance Standards\n";
        $md .= "All goods manufactured by Victor Bags Factory Ltd. undergo strict in-line and final AQL-based inspections and physical stress testing before container loading at Chittagong (Chattogram) seaport:\n";
        $md .= "- **In-House Testing Equipment:** Drop test machines, handle jerk testers, continuous wheel abrasion rigs, tensile pull benches (75kg load rating), and fabric inspection scanners.\n";
        $md .= "- **Accreditations:** C-TPAT (U.S. Customs-Trade Partnership Against Terrorism), BSCI (Business Social Compliance Initiative), ISO 14001 (Environmental Management), and Nirapon.\n";
        $md .= "- **U.S. Consumer Safety:** Fully compliant with the Consumer Product Safety Improvement Act (CPSIA third-party testing and Children's Product Certificates for school backpacks) and California Proposition 65 chemical compliance.\n\n";

        $md .= "## 5. Technical Product Catalog & Specifications\n\n";

        foreach ($products as $p) {
            $md .= '### '.$p->title.' (SKU: '.$p->sku.")\n";
            $md .= '- **Category:** '.$p->category_name."\n";
            $md .= '- **Tagline:** '.$p->tagline."\n";
            $md .= '- **Capacity:** '.($p->capacity ?? 'N/A')."\n";
            $md .= '- **Dimensions:** '.($p->dimensions ?? 'N/A')."\n";
            $md .= '- **Weight:** '.($p->weight ?? 'N/A')."\n";
            $md .= '- **Primary Shell:** '.$p->primary_material."\n";
            $md .= '- **Interior Liner:** '.($p->lining_material ?? 'N/A')."\n";
            $md .= '- **Hardware & Fasteners:** '.($p->hardware_specs ?? 'N/A')."\n";
            $md .= '- **URL:** '.route('products.show', $p->slug)."\n\n";
            $md .= "**Overview:**\n".$p->description."\n\n";

            if (! empty($p->features)) {
                $md .= "**Key Features:**\n";
                foreach ($p->features as $f) {
                    $md .= '- '.$f."\n";
                }
                $md .= "\n";
            }

            if (! empty($p->certifications)) {
                $md .= '**Certifications:** '.implode(', ', $p->certifications)."\n\n";
            }

            $md .= "---\n\n";
        }

        $md .= "## 6. Official Contact Information & Locations\n";
        $md .= "- **U.S. Corporate Office & Showroom:** Avila Classic Trading Inc., 37-15 73rd Street, Store L4, Jackson Heights, NY 11372, USA\n";
        $md .= "- **Corporate Telephone:** +1 (646) 206-9437\n";
        $md .= "- **Official Email:** info@avilaclassic.com\n";
        $md .= "- **Bangladesh Factory:** Victor Bags Factory Ltd., Vill: East Kottapara, PO: Sarail, Upazila: Sarail, Brahmanbaria – 3430, Bangladesh\n";
        $md .= "- **Bangladesh Corporate Desk:** Flat 1/D, House 7, Road 14/C, Sector 4, Uttara, Dhaka-1230, Bangladesh\n";
        $md .= "- **China Product Development:** Quanzhou, Fujian, China\n";

        return response($md, 200, [
            'Content-Type' => 'text/markdown; charset=utf-8',
        ]);
    }
}
