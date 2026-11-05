<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'ledger_stats',
                'title' => 'The Operational Ledger',
                'subtitle' => 'Clean Industrial Stat Strip with Hairline Rules',
                'description' => 'Key operational metrics demonstrating our manufacturing and distribution capacity.',
                'content' => [
                    [
                        'label' => 'Industry Leadership',
                        'value' => '20+',
                        'unit' => 'Years',
                        'description' => 'Executive bag manufacturing, global supply, and wholesale distribution leadership.',
                    ],
                    [
                        'label' => 'Monthly Capacity',
                        'value' => '200K+',
                        'unit' => 'Units',
                        'description' => 'Monthly capacity across 15 production lines and 880 machines at Victor Bags.',
                    ],
                    [
                        'label' => 'Skilled Workforce',
                        'value' => '1,100+',
                        'unit' => 'Artisans',
                        'description' => 'Artisans, master pattern makers, QA inspectors, and engineers in Bangladesh.',
                    ],
                    [
                        'label' => 'Audited Standards',
                        'value' => '100%',
                        'unit' => 'Certified',
                        'description' => 'C-TPAT, BSCI, ISO 14001, and Nirapon certified; trusted by Samsonite and Walmart.',
                    ],
                ],
                'is_enabled' => true,
                'sort_order' => 1,
            ],
            [
                'section_key' => 'materials_archive',
                'title' => 'The Materials We Trust',
                'subtitle' => 'Textile & Component Standards',
                'description' => 'Luggage and travel gear are only as dependable as the raw textiles, hardware, and fasteners bonded into their seams. We source certified, stress-tested components from the world’s premier fabric mills.',
                'content' => [
                    [
                        'tag' => 'TEXTILE NO. 01',
                        'source' => 'INVISTA CORDURA®',
                        'name' => '1680D Ballistic Nylon',
                        'description' => 'Originally engineered for military flak jackets, our 1680D high-density ballistic nylon features a dual-ply basket weave with a fluorocarbon-free hydrophobic finish. Unyielding abrasion resistance for daily executive transit.',
                        'metric' => 'Tensile Load: 180 kg/m² • Tear Rating: ISO 13937-2',
                    ],
                    [
                        'tag' => 'COMPOSITE NO. 02',
                        'source' => 'BAYER MAKROLON®',
                        'name' => 'Virgin Polycarbonate',
                        'description' => 'Multi-layered 100% German Makrolon® polycarbonate offers unparalleled elasticity under extreme impact. Instead of cracking under baggage hold pressure, the shell flexes and rebounds immediately to its factory contour.',
                        'metric' => 'Impact Tolerance: -20°C to +60°C • Drop Tested: 1.5m',
                    ],
                    [
                        'tag' => 'HARDWARE NO. 03',
                        'source' => 'YKK® FASTENERS',
                        'name' => 'AquaGuard® Zippers',
                        'description' => 'Polyurethane laminated coil zippers engineered in Japan to seal sensitive digital gear against tropical downpours and tarmac moisture. Tested across 5,000 continuous opening and closing cycles without friction fatigue.',
                        'metric' => 'Cycle Life: 5,000+ Cycles • Water Deflection: IPX4',
                    ],
                ],
                'is_enabled' => true,
                'sort_order' => 2,
            ],
            [
                'section_key' => 'quality_gates',
                'title' => 'Built by hand. Audited by machines.',
                'subtitle' => 'Factory Floor Standards',
                'description' => 'At our affiliated Victor Bags manufacturing complex in Sarail, Brahmanbaria, over 1,100 personnel operate 15 production lines with 880 machines. As an established production source for global brands including Samsonite, Walmart, and Centric Brands, every production run passes four rigorous testing gates before dispatch.',
                'content' => [
                    [
                        'code' => 'GATE 01',
                        'title' => 'Raw Material & Fabric Scan',
                        'description' => 'Duty-free bonded warehouse raw material verification, optical scanning, and AQL-based fabric flaw detection.',
                    ],
                    [
                        'code' => 'GATE 02',
                        'title' => 'Drop & Jerk Stress Rig',
                        'description' => 'Automated handle jerk cycling and multi-angle drop impact tests to ensure rivet and frame integrity.',
                    ],
                    [
                        'code' => 'GATE 03',
                        'title' => 'Continuous Zipper Bench',
                        'description' => 'Cyclical slider endurance testing under lateral tension and ASTM B117 salt-spray corrosion chamber exposure.',
                    ],
                    [
                        'code' => 'GATE 04',
                        'title' => 'Wheel & Seam Tensile Test',
                        'description' => '360° spinner wheel rolling endurance trials and 75kg pneumatic seam tensile load pulling on load-bearing straps.',
                    ],
                ],
                'is_enabled' => true,
                'sort_order' => 3,
            ],
            [
                'section_key' => 'sourcing_steps',
                'title' => 'From Technical Sketch to U.S. Stock Delivery',
                'subtitle' => 'Direct Sourcing & Wholesale Protocol',
                'description' => 'Our streamlined three-stage protocol for retail buyers, corporate sourcing, and private-label design development.',
                'content' => [
                    [
                        'step' => '01',
                        'title' => 'Demand Planning & Tech-Pack Analysis',
                        'description' => 'Our New York engineering team reviews CAD diagrams, textile deniers, and branded trim specifications. We provide line-item Bill of Materials (BOM) quotations and scheduling within 72 hours.',
                    ],
                    [
                        'step' => '02',
                        'title' => 'Physical Sampling (Bangladesh & Quanzhou Rooms)',
                        'description' => 'Our sample development departments in Bangladesh (24 machines, 28 staff) and Quanzhou, China construct physical prototypes using production textiles and hardware, couriered express directly to your office.',
                    ],
                    [
                        'step' => '03',
                        'title' => 'Bulk Production & U.S. Stock Replenishment',
                        'description' => 'Choose direct ocean containers (FOB Chattogram) or expedited replenishment from our U.S. 3PL stock in the NY/NJ area. Avila provides flexible order quantities and 45-day payment terms for qualified accounts.',
                    ],
                ],
                'is_enabled' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($sections as $sec) {
            HomepageSection::updateOrCreate(['section_key' => $sec['section_key']], $sec);
        }
    }
}

