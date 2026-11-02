@extends('layouts.app')

@section('title', 'Manufacturing Facilities & QA Testing Labs | Victor Bags & Avila Classic')
@section('meta_description', 'Explore Victor Bags Factory Ltd.’s manufacturing capabilities in Bangladesh: 15 production lines, 880 machines, 200,000 units/mo capacity, C-TPAT, BSCI, and ISO 14001 certified.')

@section('content')

    <!-- HERO HEADER: THE FACTORY MANUAL -->
    <section class="py-16 lg:py-24 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-[#FA8231]"></span>
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231]">
                        Manufacturing Architecture • Victor Bags Factory Ltd.
                    </span>
                </div>
                <h1 class="font-serif text-4xl sm:text-6xl font-medium text-[#141517] tracking-tight leading-[1.1]">
                    The engineering behind every seam.
                </h1>
                <p class="text-base sm:text-lg text-[#5C5E64] font-light leading-relaxed">
                    Operating 15 specialized production lines with 880 machines at our 1.42-acre manufacturing complex in Sarail, Brahmanbaria, Bangladesh, supported by corporate headquarters in Uttara, Dhaka and sample development in Quanzhou, China.
                </p>
            </div>
        </div>
    </section>

    <!-- KEY CAPACITY LEDGER STRIP -->
    <section class="py-10 bg-white border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-y md:divide-y-0 md:divide-x divide-[#E5E1D8]">
                <div class="pt-4 md:pt-0">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93]">Monthly Assembly</div>
                    <div class="font-serif text-3xl sm:text-4xl font-bold text-[#141517]">200,000</div>
                    <span class="text-xs text-[#5C5E64]">Finished pieces / month</span>
                </div>
                <div class="pt-4 md:pt-0 md:pl-8">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93]">Production Lines</div>
                    <div class="font-serif text-3xl sm:text-4xl font-bold text-[#141517]">15 Lines</div>
                    <span class="text-xs text-[#5C5E64]">880 specialized machines</span>
                </div>
                <div class="pt-4 md:pt-0 md:pl-8">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93]">Skilled Personnel</div>
                    <div class="font-serif text-3xl sm:text-4xl font-bold text-[#141517]">1,100+</div>
                    <span class="text-xs text-[#5C5E64]">Artisans, tailors & QC staff</span>
                </div>
                <div class="pt-4 md:pt-0 md:pl-8">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-[#8A8C93]">Inspection Level</div>
                    <div class="font-serif text-3xl sm:text-4xl font-bold text-[#141517]">AQL 1.5</div>
                    <span class="text-xs text-[#5C5E64]">C-TPAT, BSCI & ISO 14001</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 5-STAGE PRODUCTION WORKFLOW -->
    <section class="py-20 lg:py-28 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-3xl mb-14">
                <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                    Assembly Architecture
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#141517]">
                    The Five-Stage Manufacturing Sequence
                </h2>
                <p class="mt-2 text-xs sm:text-sm text-[#5C5E64] font-light">
                    Every bag, suitcase, or accessory travels through five distinct, specialized production departments.
                </p>
            </div>

            <div class="space-y-6">
                
                <!-- Stage 1 -->
                <div class="p-8 bg-white border border-[#E5E1D8] flex flex-col md:flex-row items-start gap-6">
                    <div class="w-10 h-10 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-sm font-bold flex-shrink-0">
                        01
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <h3 class="font-serif text-xl font-bold text-[#141517]">Bonded Raw Material Conditioning & Fabric Scan</h3>
                        <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed">
                            Under our bonded warehouse license, high-grade textiles and raw materials are imported duty-free. Fabrics undergo 24-hour environmental tension relaxation and computerized optical flaw inspection before spreading.
                        </p>
                    </div>
                </div>

                <!-- Stage 2 -->
                <div class="p-8 bg-white border border-[#E5E1D8] flex flex-col md:flex-row items-start gap-6">
                    <div class="w-10 h-10 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-sm font-bold flex-shrink-0">
                        02
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <h3 class="font-serif text-xl font-bold text-[#141517]">Computerized Pattern Drafting & Precision Cutting</h3>
                        <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed">
                            Pattern blueprints developed between New York and our in-house sample rooms (24 machines, 28 staff in Bangladesh + Quanzhou desk) are precision cut with automated multi-ply CNC cutters and ultrasonic edge-sealing.
                        </p>
                    </div>
                </div>

                <!-- Stage 3 -->
                <div class="p-8 bg-white border border-[#E5E1D8] flex flex-col md:flex-row items-start gap-6">
                    <div class="w-10 h-10 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-sm font-bold flex-shrink-0">
                        03
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <h3 class="font-serif text-xl font-bold text-[#141517]">Sub-Assembly & Precision Sewing on Juki® Stations</h3>
                        <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed">
                            880 modern sewing and specialized assembly machines execute heavy bar-tacks (42 stitches per anchor) at all load points, handles, and trolley harness anchors.
                        </p>
                    </div>
                </div>

                <!-- Stage 4 -->
                <div class="p-8 bg-white border border-[#E5E1D8] flex flex-col md:flex-row items-start gap-6">
                    <div class="w-10 h-10 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-sm font-bold flex-shrink-0">
                        04
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <h3 class="font-serif text-xl font-bold text-[#141517]">Hardshell Luggage Thermoforming & Assembly</h3>
                        <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed">
                            For hard-side luggage lines, 100% German Makrolon® polycarbonate shells are vacuum-thermoformed in temperature-regulated cleanrooms. 360° spinner wheels, TSA locks, and telescoping aluminum trolley systems are mechanically riveted using calibrated pneumatic drivers.
                        </p>
                    </div>
                </div>

                <!-- Stage 5 -->
                <div class="p-8 bg-white border border-[#E5E1D8] flex flex-col md:flex-row items-start gap-6">
                    <div class="w-10 h-10 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-sm font-bold flex-shrink-0">
                        05
                    </div>
                    <div class="space-y-1.5 flex-grow">
                        <h3 class="font-serif text-xl font-bold text-[#141517]">In-House Quality Stress Lab & Container Stuffing</h3>
                        <p class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed">
                            Every production batch is sampled to AQL 1.5 standards, undergoing drop, jerk, wheel durability, and tensile load tests. Approved units are tagged, moisture-sealed with silica gel, master-cartoned, and loaded into ocean containers for direct export from Chattogram seaport to U.S. and worldwide destinations.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- IN-HOUSE LABORATORY TESTING (Full Studio Dark Atelier) -->
    <section class="py-24 bg-[#111215] text-[#FAF8F5] border-b border-[#282A30]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-3xl mb-14">
                <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                    Quality Assurance Protocol
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-medium text-white">
                    The Brahmanbaria Physical Testing Laboratory
                </h2>
                <p class="mt-2 text-xs sm:text-sm text-stone-400 font-light">
                    Our in-house physics and mechanical testing department subjects materials, components, and prototypes to extreme stress tests before bulk production approval.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="p-6 bg-[#18191D] border border-[#282A30] space-y-3">
                    <div class="text-[10px] font-mono uppercase text-[#FA8231]">LAB BENCH 01</div>
                    <h3 class="font-serif text-xl font-bold text-white">Tensile & Seam Pull Rig</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        Pneumatic load cells pull shoulder straps, haul handles, and luggage trolley mounts under 75 kg (165 lbs) continuous tension to guarantee zero seam tear or stitch failure.
                    </p>
                </div>

                <div class="p-6 bg-[#18191D] border border-[#282A30] space-y-3">
                    <div class="text-[10px] font-mono uppercase text-[#FA8231]">LAB BENCH 02</div>
                    <h3 class="font-serif text-xl font-bold text-white">Drop & Jerk Impact Machine</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        Fully packed suitcases and backpacks undergo repeated drop impacts from 1.2m and automated cyclical handle jerk tests, verifying rivet strength and structural elasticity.
                    </p>
                </div>

                <div class="p-6 bg-[#18191D] border border-[#282A30] space-y-3">
                    <div class="text-[10px] font-mono uppercase text-[#FA8231]">LAB BENCH 03</div>
                    <h3 class="font-serif text-xl font-bold text-white">Continuous Wheel & Salt-Spray Chamber</h3>
                    <p class="text-xs text-stone-400 leading-relaxed">
                        Spinner wheels run on continuous motorized rolling obstacle tracks, while zippers and hardware endure 48 hours of ASTM B117 salt fog to verify corrosion resistance.
                    </p>
                </div>

            </div>

        </div>
    </section>

@endsection
