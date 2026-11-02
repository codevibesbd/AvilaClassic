@extends('layouts.app')

@section('title', 'Avila Classic | Factory-Direct Luggage & Backpack Wholesale Distributor')
@section('meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Bangladesh). Factory pricing from U.S. stock, lower MOQs, 1,100+ workforce, 200,000 units/mo capacity, C-TPAT and BSCI certified.')

@section('content')

    <!-- HERO SECTION: THE MAKER'S MANIFESTO (Full Background Image Slider) -->
    <section id="hero-bg-slider-section" class="relative border-b border-[#282A30] bg-[#141517] min-h-[640px] lg:min-h-[720px] flex items-center overflow-hidden select-none">
        
        <!-- Full-Bleed Background Slider Stage -->
        <div class="absolute inset-0 z-0">
            <!-- Slide 1: Technical Backpack -->
            <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 z-10"
                 data-category="Discipline 01 // Technical Commuter"
                 data-sku="AVC-BP-001"
                 data-title="Aeropack Pro Executive 28L"
                 data-spec="1680D Ballistic Nylon • YKK AquaGuard®">
                <img src="{{ asset('images/hero/slide-1-backpack.jpg') }}" 
                     alt="Avila Classic Aeropack Pro Executive Technical Backpack" 
                     class="w-full h-full object-cover object-center transform scale-100 transition-transform duration-[8000ms] ease-out">
            </div>

            <!-- Slide 2: Hardshell Polycarbonate Luggage -->
            <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0"
                 data-category="Discipline 02 // Polycarbonate Luggage"
                 data-sku="AVC-LG-001"
                 data-title="TransGlobal Polycarbonate Spinner 30&quot;"
                 data-spec="Virgin Bayer Makrolon® • Hinomoto 360°">
                <img src="{{ asset('images/hero/slide-2-luggage.jpg') }}" 
                     alt="Avila Classic TransGlobal Polycarbonate Hardshell Luggage" 
                     class="w-full h-full object-cover object-center transform scale-100 transition-transform duration-[8000ms] ease-out">
            </div>

            <!-- Slide 3: Heritage Waxed Canvas & Leather Travel Gear -->
            <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0"
                 data-category="Discipline 03 // Heritage Field Pack"
                 data-sku="AVC-BP-003"
                 data-title="Nomad Heritage Field Pack 30L"
                 data-spec="18oz Paraffin Canvas • Full-Grain Leather">
                <img src="{{ asset('images/hero/slide-3-duffle.jpg') }}" 
                     alt="Avila Classic Nomad Heritage Field Pack" 
                     class="w-full h-full object-cover object-center transform scale-100 transition-transform duration-[8000ms] ease-out">
            </div>

            <!-- Slide 4: All-Weather Field & Commuter Pack -->
            <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 pointer-events-none z-0"
                 data-category="Discipline 04 // Waxed Expedition Pack"
                 data-sku="AVC-BC-002"
                 data-title="Metro Heritage Commuter Pack 24L"
                 data-spec="Waxed Cotton Twill • Solid Brass Rivets">
                <img src="{{ asset('images/hero/slide-4-commuter.jpg') }}" 
                     alt="Avila Classic Metro Heritage Commuter Pack" 
                     class="w-full h-full object-cover object-center transform scale-100 transition-transform duration-[8000ms] ease-out">
            </div>
        </div>

        <!-- Editorial Contrast Scrims (Ensures 100% WCAG AAA Text Legibility across all screens) -->
        <div class="absolute inset-0 z-[1] bg-gradient-to-r from-[#141517]/95 via-[#141517]/85 to-[#141517]/60 pointer-events-none"></div>
        <div class="absolute inset-0 z-[2] bg-gradient-to-t from-[#141517] via-transparent to-[#141517]/40 pointer-events-none"></div>

        <!-- Foreground Content Layer -->
        <div class="relative z-10 w-full py-20 lg:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl space-y-7">
                    
                    <!-- Architectural Ledger Mark -->
                    <div class="flex items-center gap-3">
                        <span class="inline-block w-2.5 h-2.5 bg-[#FA8231] shadow-sm"></span>
                        <span class="text-[11px] font-mono uppercase tracking-[0.2em] text-[#E5E1D8]">
                            Direct-From-Manufacturer Wholesale • U.S. Distribution
                        </span>
                    </div>

                    <!-- Authentic Editorial Headline -->
                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-[64px] font-medium text-white leading-[1.08] tracking-tight">
                        15 production lines in Bangladesh. <span class="italic font-normal text-[#FA8231]">Factory-direct U.S. supply.</span>
                    </h1>

                    <!-- Grounded, Honest Copy -->
                    <p class="text-base sm:text-lg text-stone-200 leading-relaxed max-w-2xl font-light">
                        We are <strong class="text-white font-medium">Avila Classic Trading Inc.</strong>, the U.S. wholesale distribution affiliate of <strong class="text-white font-medium">Victor Bags Factory Ltd.</strong> We supply high-grade luggage, technical backpacks, and travel gear from U.S. stock at factory pricing, offering lower MOQs and faster replenishment for retailers, e-commerce brands, and corporate buyers.
                    </p>

                    <!-- Direct Actions -->
                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <a href="{{ route('products.index') }}" 
                           class="px-8 py-4 bg-[#FA8231] text-white text-xs uppercase tracking-wider font-semibold text-center hover:bg-[#e07126] transition-colors shadow-sm">
                            Inspect 12 Catalog Pieces &rarr;
                        </a>
                        <a href="{{ route('manufacturing') }}" 
                           class="px-8 py-4 bg-white/10 text-white border border-white/20 backdrop-blur-sm text-xs uppercase tracking-wider font-semibold text-center hover:bg-white/20 transition-colors">
                            The Factory & QA Standards
                        </a>
                    </div>

                    <!-- Operational Assurance Chips -->
                    <div class="pt-6 border-t border-white/15 flex flex-wrap items-center gap-y-2 gap-x-6 text-xs font-mono text-stone-300">
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#FA8231]"></span>
                            <span class="text-white font-medium">C-TPAT & BSCI</span> Certified Facility
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#FA8231]"></span>
                            <span class="text-white font-medium">200,000</span> Units Monthly Capacity
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#FA8231]"></span>
                            <span class="text-white font-medium">U.S. Stock & Private Label</span> OEM/ODM
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- THE OPERATIONAL LEDGER (Clean Industrial Stat Strip with Hairline Rules) -->
    <section class="border-b border-[#E5E1D8] bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-y md:divide-y-0 md:divide-x divide-[#E5E1D8]">
                
                <div class="pt-4 md:pt-0">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93] mb-1">
                        Industry Leadership
                    </div>
                    <div class="font-serif text-4xl sm:text-5xl font-bold text-[#141517]">
                        20+ <span class="text-xl font-sans font-light text-[#FA8231]">Years</span>
                    </div>
                    <p class="mt-2 text-xs text-[#5C5E64]">
                        Executive bag manufacturing, global supply, and wholesale distribution leadership.
                    </p>
                </div>

                <div class="pt-4 md:pt-0 md:pl-8">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93] mb-1">
                        Monthly Capacity
                    </div>
                    <div class="font-serif text-4xl sm:text-5xl font-bold text-[#141517]">
                        200K+ <span class="text-xl font-sans font-light text-[#FA8231]">Units</span>
                    </div>
                    <p class="mt-2 text-xs text-[#5C5E64]">
                        Monthly capacity across 15 production lines and 880 machines at Victor Bags.
                    </p>
                </div>

                <div class="pt-4 md:pt-0 md:pl-8">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93] mb-1">
                        Skilled Workforce
                    </div>
                    <div class="font-serif text-4xl sm:text-5xl font-bold text-[#141517]">
                        1,100+ <span class="text-xl font-sans font-light text-[#FA8231]">Artisans</span>
                    </div>
                    <p class="mt-2 text-xs text-[#5C5E64]">
                        Artisans, master pattern makers, QA inspectors, and engineers in Bangladesh.
                    </p>
                </div>

                <div class="pt-4 md:pt-0 md:pl-8">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93] mb-1">
                        Audited Standards
                    </div>
                    <div class="font-serif text-4xl sm:text-5xl font-bold text-[#141517]">
                        100% <span class="text-xl font-sans font-light text-[#FA8231]">Certified</span>
                    </div>
                    <p class="mt-2 text-xs text-[#5C5E64]">
                        C-TPAT, BSCI, ISO 14001, and Nirapon certified; trusted by Samsonite and Walmart.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CURATED SPECIFICATION SHOWCASE (The 6 Primary Disciplines) -->
    <section class="py-20 lg:py-28 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 pb-6 border-b border-[#E5E1D8]">
                <div>
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                        Archival Demonstration Series
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-medium text-[#141517] tracking-tight">
                        Selected Technical Specifications
                    </h2>
                    <p class="mt-2 text-sm text-[#5C5E64] max-w-xl font-light">
                        Representative pieces engineered to demonstrate our factory's stitching tolerances, composite hardshell assembly, and water-sealed zipper integration.
                    </p>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#141517] hover:text-[#FA8231] transition-colors border-b border-[#141517] pb-1">
                        <span>Browse Complete 12-Piece Catalog</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <!-- Viewing Disclaimer Footnote -->
            <div class="mt-12 text-center text-xs text-[#8A8C93] font-mono">
                [ SPECIFICATIONS DISPLAYED FOR ARCHITECTURAL & SOURCING REVIEW • SAMPLES AVAILABLE ON REQUEST ]
            </div>

        </div>
    </section>

    <!-- THE MATERIALS ARCHIVE (Real Tactile Craftsmanship) -->
    <section class="py-20 bg-white border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-3xl mb-14">
                <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                    Textile & Component Standards
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#141517] tracking-tight">
                    The Materials We Trust
                </h2>
                <p class="mt-2 text-sm text-[#5C5E64] font-light">
                    Luggage and travel gear are only as dependable as the raw textiles, hardware, and fasteners bonded into their seams. We source certified, stress-tested components from the world’s premier fabric mills.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Material 1: Ballistic Nylon -->
                <div class="p-6 border border-[#E5E1D8] bg-[#FAF8F5] space-y-3">
                    <div class="flex items-center justify-between text-xs font-mono text-[#FA8231]">
                        <span>TEXTILE NO. 01</span>
                        <span>INVISTA CORDURA®</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">1680D Ballistic Nylon</h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Originally engineered for military flak jackets, our 1680D high-density ballistic nylon features a dual-ply basket weave with a fluorocarbon-free hydrophobic finish. Unyielding abrasion resistance for daily executive transit.
                    </p>
                    <div class="pt-2 text-[10px] font-mono text-[#8A8C93] border-t border-[#E5E1D8]">
                        Tensile Load: 180 kg/m² • Tear Rating: ISO 13937-2
                    </div>
                </div>

                <!-- Material 2: Polycarbonate -->
                <div class="p-6 border border-[#E5E1D8] bg-[#FAF8F5] space-y-3">
                    <div class="flex items-center justify-between text-xs font-mono text-[#FA8231]">
                        <span>COMPOSITE NO. 02</span>
                        <span>BAYER MAKROLON®</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">Virgin Polycarbonate</h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Multi-layered 100% German Makrolon® polycarbonate offers unparalleled elasticity under extreme impact. Instead of cracking under baggage hold pressure, the shell flexes and rebounds immediately to its factory contour.
                    </p>
                    <div class="pt-2 text-[10px] font-mono text-[#8A8C93] border-t border-[#E5E1D8]">
                        Impact Tolerance: -20°C to +60°C • Drop Tested: 1.5m
                    </div>
                </div>

                <!-- Material 3: YKK AquaGuard -->
                <div class="p-6 border border-[#E5E1D8] bg-[#FAF8F5] space-y-3">
                    <div class="flex items-center justify-between text-xs font-mono text-[#FA8231]">
                        <span>HARDWARE NO. 03</span>
                        <span>YKK® FASTENERS</span>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">AquaGuard® Zippers</h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Polyurethane laminated coil zippers engineered in Japan to seal sensitive digital gear against tropical downpours and tarmac moisture. Tested across 5,000 continuous opening and closing cycles without friction fatigue.
                    </p>
                    <div class="pt-2 text-[10px] font-mono text-[#8A8C93] border-t border-[#E5E1D8]">
                        Cycle Life: 5,000+ Cycles • Water Deflection: IPX4
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- THE DHAKA PRODUCTION ATELIER (Full Industrial Dark Section) -->
    <section class="py-24 bg-[#111215] text-[#FAF8F5] border-b border-[#282A30]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                
                <!-- Left Column: Workshop Photograph & Facility Tag -->
                <div>
                    <div class="p-3 border border-[#282A30] bg-[#18191D]">
                        <div class="aspect-[4/3] overflow-hidden bg-[#282A30]">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1200&q=80" 
                                 alt="Factory floor quality assurance at Victor Bags Factory Ltd." 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="mt-3 px-1 py-1 flex items-center justify-between text-[11px] font-mono text-stone-400 border-t border-[#282A30]">
                            <span>Brahmanbaria Production Complex</span>
                            <span class="text-[#FA8231]">C-TPAT & BSCI</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Manufacturing Rigor Narrative & 4 Quality Gates -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-[#FA8231]"></span>
                        <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-stone-400">
                            Factory Floor Standards
                        </span>
                    </div>

                    <h2 class="font-serif text-3xl sm:text-5xl font-medium text-white leading-tight">
                        Built by hand. Audited by machines.
                    </h2>

                    <p class="text-sm sm:text-base text-stone-300 font-light leading-relaxed">
                        At our affiliated Victor Bags manufacturing complex in Sarail, Brahmanbaria, over 1,100 personnel operate 15 production lines with 880 machines. As an established production source for global brands including Samsonite, Walmart, and Centric Brands, every production run passes four rigorous testing gates before dispatch.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-4 border border-[#282A30] bg-[#18191D] space-y-1">
                            <span class="font-mono text-[10px] text-[#FA8231]">GATE 01</span>
                            <h4 class="font-serif text-lg font-bold text-white">Raw Material & Fabric Scan</h4>
                            <p class="text-xs text-stone-400">Duty-free bonded warehouse raw material verification, optical scanning, and AQL-based fabric flaw detection.</p>
                        </div>

                        <div class="p-4 border border-[#282A30] bg-[#18191D] space-y-1">
                            <span class="font-mono text-[10px] text-[#FA8231]">GATE 02</span>
                            <h4 class="font-serif text-lg font-bold text-white">Drop & Jerk Stress Rig</h4>
                            <p class="text-xs text-stone-400">Automated handle jerk cycling and multi-angle drop impact tests to ensure rivet and frame integrity.</p>
                        </div>

                        <div class="p-4 border border-[#282A30] bg-[#18191D] space-y-1">
                            <span class="font-mono text-[10px] text-[#FA8231]">GATE 03</span>
                            <h4 class="font-serif text-lg font-bold text-white">Continuous Zipper Bench</h4>
                            <p class="text-xs text-stone-400">Cyclical slider endurance testing under lateral tension and ASTM B117 salt-spray corrosion chamber exposure.</p>
                        </div>

                        <div class="p-4 border border-[#282A30] bg-[#18191D] space-y-1">
                            <span class="font-mono text-[10px] text-[#FA8231]">GATE 04</span>
                            <h4 class="font-serif text-lg font-bold text-white">Wheel & Seam Tensile Test</h4>
                            <p class="text-xs text-stone-400">360° spinner wheel rolling endurance trials and 75kg pneumatic seam tensile load pulling on load-bearing straps.</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('manufacturing') }}" class="text-xs font-mono uppercase tracking-wider text-[#FA8231] hover:text-white underline">
                            Read the complete Factory Technical Manual &rarr;
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- SOURCING ENGAGEMENT (How Enterprise Partners Work With Us) -->
    <section class="py-20 lg:py-28 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left: Process Timeline -->
                <div class="lg:col-span-7 space-y-8">
                    <div>
                        <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                            Direct Sourcing & Wholesale Protocol
                        </span>
                        <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#141517]">
                            From Technical Sketch to U.S. Stock Delivery
                        </h2>
                    </div>

                    <div class="space-y-6">
                        <!-- Step 1 -->
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-none border border-[#141517] bg-[#141517] text-[#FAF8F5] flex-shrink-0 flex items-center justify-center font-mono text-xs font-bold">
                                01
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-serif text-xl font-bold text-[#141517]">Demand Planning & Tech-Pack Analysis</h3>
                                <p class="text-xs text-[#5C5E64] leading-relaxed">
                                    Our New York engineering team reviews CAD diagrams, textile deniers, and branded trim specifications. We provide line-item Bill of Materials (BOM) quotations and scheduling within 72 hours.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-none border border-[#141517] bg-[#141517] text-[#FAF8F5] flex-shrink-0 flex items-center justify-center font-mono text-xs font-bold">
                                02
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-serif text-xl font-bold text-[#141517]">Physical Sampling (Bangladesh & Quanzhou Rooms)</h3>
                                <p class="text-xs text-[#5C5E64] leading-relaxed">
                                    Our sample development departments in Bangladesh (24 machines, 28 staff) and Quanzhou, China construct physical prototypes using production textiles and hardware, couriered express directly to your office.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-none border border-[#141517] bg-[#141517] text-[#FAF8F5] flex-shrink-0 flex items-center justify-center font-mono text-xs font-bold">
                                03
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-serif text-xl font-bold text-[#141517]">Bulk Production & U.S. Stock Replenishment</h3>
                                <p class="text-xs text-[#5C5E64] leading-relaxed">
                                    Choose direct ocean containers (FOB Chattogram) or expedited replenishment from our U.S. 3PL stock in the NY/NJ area. Avila provides flexible order quantities and 45-day payment terms for qualified accounts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Direct Sourcing Inquiry Card -->
                <div class="lg:col-span-5">
                    <div class="p-8 bg-white border border-[#E5E1D8] shadow-sm space-y-5">
                        <div class="space-y-1">
                            <span class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                                Corporate Consultation
                            </span>
                            <h3 class="font-serif text-2xl font-bold text-[#141517]">
                                Speak with Our Sourcing Directors
                            </h3>
                            <p class="text-xs text-[#5C5E64] leading-relaxed">
                                Whether you are an established retail chain seeking supply chain diversification or an e-commerce brand developing private-label collections, our New York showroom and factory desks are at your service.
                            </p>
                        </div>

                        <div class="pt-2 border-t border-[#F2EFE9] space-y-3 text-xs text-[#141517]">
                            <div class="flex items-center gap-3">
                                <span class="font-mono text-[#8A8C93] w-14">Direct:</span>
                                <a href="tel:+16462069437" class="font-semibold hover:text-[#FA8231]">+1 (646) 206-9437</a>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-mono text-[#8A8C93] w-14">Email:</span>
                                <a href="mailto:info@avilaclassic.com" class="font-semibold underline hover:text-[#FA8231]">info@avilaclassic.com</a>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-mono text-[#8A8C93] w-14">Hours:</span>
                                <span class="text-[#5C5E64]">Mon – Fri, 9:00 AM – 6:00 PM EST</span>
                            </div>
                        </div>

                        <div class="pt-3">
                            <a href="{{ route('contact') }}" 
                                class="block w-full py-3.5 bg-[#141517] text-[#FAF8F5] text-xs uppercase tracking-wider font-semibold text-center hover:bg-[#FA8231] transition-colors">
                                Open Sourcing Desk &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('hero-bg-slider-section');
        if (!slider) return;

        const slides = slider.querySelectorAll('.hero-bg-slide');
        if (!slides.length) return;

        let currentIndex = 0;
        let slideTimer = null;
        const autoPlayInterval = 5000;

        function updateSlider(index) {
            currentIndex = (index + slides.length) % slides.length;

            slides.forEach((slide, i) => {
                const img = slide.querySelector('img');
                if (i === currentIndex) {
                    slide.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                    slide.classList.add('opacity-100', 'z-10');
                    if (img) {
                        img.classList.remove('scale-100');
                        img.classList.add('scale-105');
                    }
                } else {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                    if (img) {
                        img.classList.remove('scale-105');
                        img.classList.add('scale-100');
                    }
                }
            });
        }

        function nextSlide() {
            updateSlider(currentIndex + 1);
        }

        function prevSlide() {
            updateSlider(currentIndex - 1);
        }

        function startAutoPlay() {
            stopAutoPlay();
            slideTimer = setInterval(nextSlide, autoPlayInterval);
        }

        function stopAutoPlay() {
            if (slideTimer) {
                clearInterval(slideTimer);
                slideTimer = null;
            }
        }

        // Hover pause / resume
        slider.addEventListener('mouseenter', stopAutoPlay);
        slider.addEventListener('mouseleave', startAutoPlay);

        // Touch swipe support for mobile devices
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        slider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            const swipeDistance = touchEndX - touchStartX;
            if (Math.abs(swipeDistance) > 40) {
                if (swipeDistance < 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                startAutoPlay();
            }
        }, { passive: true });

        // Initialize slider
        updateSlider(0);
        startAutoPlay();
    });
</script>
@endpush
