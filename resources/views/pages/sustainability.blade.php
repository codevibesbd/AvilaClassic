@extends('layouts.app')

@section('title', isset($page) && $page->meta_title ? $page->meta_title : 'Sustainability & Certified Materials | Avila Classic')
@section('meta_description', isset($page) && $page->meta_description ? $page->meta_description : 'Discover Avila Classic’s sustainable manufacturing initiatives: GRS-certified recycled ocean-bound rPET fabrics, zero-fluorocarbon DWR, and BSCI audited ethical labor.')

@section('content')

    <!-- HERO HEADER: THE SUSTAINABILITY LEDGER -->
    <section class="py-16 lg:py-24 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-[#FA8231]"></span>
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231]">
                        {{ isset($page) && $page->banner_subtitle ? $page->banner_subtitle : 'Circular Materials & ESG Standards' }}
                    </span>
                </div>
                <h1 class="font-serif text-4xl sm:text-6xl font-medium text-[#141517] tracking-tight leading-[1.1]">
                    {{ isset($page) && $page->banner_title ? $page->banner_title : 'Crafted from recycled ocean plastics and organic fibers.' }}
                </h1>
                <p class="text-base sm:text-lg text-[#5C5E64] font-light leading-relaxed">
                    {{ isset($page) && isset($page->content['intro_body']) ? $page->content['intro_body'] : 'How Victor Bags Factory Ltd. in Bangladesh diverts post-consumer plastic bottles into high-tenacity travel gear textiles, certified under ISO 14001 and the Global Recycled Standard (GRS).' }}
                </p>
            </div>
        </div>
    </section>

    <!-- SUSTAINABILITY PILLARS -->
    <section class="py-20 lg:py-28 bg-white border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                
                <!-- Pillar 1: Recycled rPET Fabrics -->
                <div class="p-8 bg-[#FAF8F5] border border-[#E5E1D8] space-y-4">
                    <div class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                        PILLAR 01 • CIRCULAR YARNS
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">Certified Ocean-Bound rPET</h3>
                    <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed font-light">
                        Discarded plastic bottles collected from coastal riverways are sterilized, flaked, and extruded into ultra-strong polyester microfilaments. When woven into 600D and 900D ripstop canvas, our recycled yarns achieve identical tensile and abrasion benchmarks to virgin petroleum-derived nylon.
                    </p>
                    <div class="pt-3 border-t border-[#E5E1D8] text-[11px] font-mono text-[#8A8C93]">
                        Certified under Global Recycled Standard (GRS) • Full Chain of Custody
                    </div>
                </div>

                <!-- Pillar 2: Clean Solar Energy & Chemical Safety -->
                <div class="p-8 bg-[#FAF8F5] border border-[#E5E1D8] space-y-4">
                    <div class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                        PILLAR 02 • ZERO FLUOROCARBONS
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">PFC-Free Hydrophobic Coatings</h3>
                    <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed font-light">
                        Traditional water-resistant bags rely on toxic C8/C6 fluorocarbon chemicals that persist indefinitely in soil. We utilize 100% plant-based and water-soluble wax finishes (C0 DWR) that achieve high water repellency while complying with strict EU REACH and ZDHC environmental criteria.
                    </p>
                    <div class="pt-3 border-t border-[#E5E1D8] text-[11px] font-mono text-[#8A8C93]">
                        ZDHC Gateway Level 3 Compliant • Oeko-Tex Standard 100 Class II
                    </div>
                </div>

                <!-- Pillar 3: Rooftop Solar Power -->
                <div class="p-8 bg-[#FAF8F5] border border-[#E5E1D8] space-y-4">
                    <div class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                        PILLAR 03 • RENEWABLE ENERGY
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">Rooftop Photovoltaic Grid</h3>
                    <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed font-light">
                        Our primary manufacturing complex in Sarail, Brahmanbaria features high-efficiency rooftop photovoltaic solar arrays and natural ventilation systems. This setup generates a significant portion of the plant's daytime electricity, lowering the embodied carbon footprint of every shipped container.
                    </p>
                    <div class="pt-3 border-t border-[#E5E1D8] text-[11px] font-mono text-[#8A8C93]">
                        ISO 14001 Environmental Management Certified
                    </div>
                </div>

                <!-- Pillar 4: Ethical Labor & Fair Living Wages -->
                <div class="p-8 bg-[#FAF8F5] border border-[#E5E1D8] space-y-4">
                    <div class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                        PILLAR 04 • WORKER WELFARE
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">Dignified Labor & Safe Work Environments</h3>
                    <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed font-light">
                        Sustainability is impossible without human dignity. Over 1,100 personnel at Victor Bags benefit from fair wages, comprehensive workplace safety protocols, on-site medical attention, clean air circulation, and full freedom of association.
                    </p>
                    <div class="pt-3 border-t border-[#E5E1D8] text-[11px] font-mono text-[#8A8C93]">
                        Independently Audited: BSCI Code of Conduct • Nirapon Safety
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- SUSTAINABILITY COMPLIANCE BADGES -->
    <section class="py-16 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <span class="text-[10px] font-mono uppercase tracking-widest text-[#FA8231] block">
                Third-Party Verified Standards
            </span>
            <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-mono text-[#141517]">
                <span class="px-4 py-2 bg-white border border-[#E5E1D8]">GLOBAL RECYCLED STANDARD (GRS)</span>
                <span class="px-4 py-2 bg-white border border-[#E5E1D8]">ISO 14001:2015 ENVIRONMENTAL</span>
                <span class="px-4 py-2 bg-white border border-[#E5E1D8]">BSCI CODE OF CONDUCT</span>
                <span class="px-4 py-2 bg-white border border-[#E5E1D8]">NIRAPON SAFETY PROTOCOL</span>
                <span class="px-4 py-2 bg-white border border-[#E5E1D8]">C-TPAT SUPPLY CHAIN SECURITY</span>
            </div>
        </div>
    </section>

@endsection
