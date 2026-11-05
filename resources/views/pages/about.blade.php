@extends('layouts.app')

@section('title', isset($page) && $page->meta_title ? $page->meta_title : 'Corporate Profile & Enterprise Heritage | Avila Classic')
@section('meta_description', isset($page) && $page->meta_description ? $page->meta_description : 'Learn about Avila Classic Trading Inc., the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Bangladesh). Discover our corporate background, executive leadership, and manufacturing scale.')
@section('og_image', isset($page) && $page->banner_image ? $page->banner_image : asset('images/banner/about-banner.jpg'))

@section('schema')
@php
    $aboutSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'AboutPage',
        'name' => isset($page) && $page->meta_title ? $page->meta_title : 'Corporate Profile & Enterprise Heritage | Avila Classic',
        'url' => route('about'),
        'description' => isset($page) && $page->meta_description ? $page->meta_description : 'Avila Classic Trading Inc. connects U.S. retailers, regional chains, e-commerce brands, and corporate buyers directly with Victor Bags Factory Ltd.',
        'primaryImageOfPage' => [
            '@type' => 'ImageObject',
            'url' => isset($page) && $page->banner_image ? $page->banner_image : asset('images/banner/about-banner.jpg'),
            'width' => 1600,
            'height' => 800,
            'caption' => 'Avila Classic Trading Inc. Bags, Luggage, and Travel Gear Collection Banner',
        ],
        'mainEntity' => [
            '@type' => 'Organization',
            'name' => 'Avila Classic Trading Inc.',
            'url' => url('/'),
            'logo' => isset($page) && $page->banner_image ? $page->banner_image : asset('images/banner/about-banner.jpg'),
            'telephone' => '+1-646-206-9437',
            'email' => 'info@avilaclassic.com',
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($aboutSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')

    <!-- HERO HEADER: THE HISTORICAL ARCHIVE -->
    <section class="py-16 lg:py-24 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-[#FA8231]"></span>
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231]">
                        {{ isset($page) && $page->banner_subtitle ? $page->banner_subtitle : 'Enterprise Heritage • Victor Bags Group' }}
                    </span>
                </div>
                <h1 class="font-serif text-4xl sm:text-6xl font-medium text-[#141517] tracking-tight leading-[1.1] text-balance">
                    {{ isset($page) && $page->banner_title ? $page->banner_title : 'Two decades of manufacturing expertise. Direct to U.S. retail.' }}
                </h1>
                <p class="text-base sm:text-lg text-[#5C5E64] font-light leading-relaxed">
                    {{ isset($page) && isset($page->content['intro_body']) ? $page->content['intro_body'] : 'Avila Classic Trading Inc. connects U.S. retailers, regional chains, e-commerce brands, and corporate buyers directly with Victor Bags Factory Ltd., one of Bangladesh\'s premier luggage and bag manufacturers.' }}
                </p>
            </div>

            <!-- Corporate Heritage Banner -->
            <div class="mt-10 lg:mt-12">
                <div class="p-2 sm:p-3 bg-white border border-[#E5E1D8] shadow-xs">
                    <img src="{{ isset($page) && $page->banner_image ? $page->banner_image : asset('images/banner/about-banner.jpg') }}" 
                         alt="Avila Classic Trading Inc. wholesale luggage, polycarbonate spinner cases, and travel gear collection - U.S. wholesale distributor for Victor Bags Factory Ltd."
                         title="Avila Classic Trading Inc. - Bags, Luggage, and Travel Gear"
                         width="1600" 
                         height="800"
                         loading="eager"
                         fetchpriority="high"
                         decoding="async"
                         class="w-full h-auto aspect-[16/9] sm:aspect-[2/1] object-cover bg-[#FAF8F5]">
                    <div class="mt-2 px-2 py-1 flex flex-col sm:flex-row sm:items-center justify-between text-[11px] font-mono text-[#8A8C93] border-t border-[#E5E1D8] gap-1">
                        <span>Avila Classic Trading Inc. &bull; Enterprise Travel Gear Collection</span>
                        <span class="text-[#FA8231] font-semibold">37-15 73rd Street, Store L4, Jackson Heights, NY 11372</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NARRATIVE & CRAFT ORIGINS -->
    <section class="py-20 lg:py-28 bg-white border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left text column (7 cols) -->
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-[10px] font-mono uppercase tracking-widest text-[#FA8231]">
                        The Maker's Story
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#141517] leading-tight text-balance">
                        Direct-from-manufacturer supply, without the import barriers.
                    </h2>

                    <div class="space-y-4 text-xs sm:text-sm text-[#5C5E64] font-light leading-relaxed">
                        <p>
                            Avila Classic Trading Inc. is a New York corporation (DOS ID: 7784195, EIN: 38-4379519) established to serve as the exclusive U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Brahmanbaria, Bangladesh). Both entities share common ownership and executive leadership under Mr. Nazmul Islam, who brings approximately 20 years of experience in the manufacture, supply, and international trade of bags and luggage.
                        </p>
                        <p>
                            Our foreign affiliate, Victor Bags Factory Ltd., operates a 1.42-acre production complex with 15 specialized conveyor lines, 880 machines, and over 1,100 full-time personnel, producing approximately 200,000 units monthly. Victor Bags is a proven supplier to global retail giants including Samsonite, Walmart, Centric Brands, ALDI, LIDL, Intersport, and El Corte Inglés, shipping containers directly to U.S. and worldwide seaports.
                        </p>
                        <p>
                            Avila Classic solves the primary challenge faced by mid-size U.S. retailers and e-commerce brands who cannot commit to full container orders or manage complex international customs. From our New York B2B showroom in Jackson Heights and licensed 3PL logistics hubs, we supply inventory from U.S. stock at factory-level pricing, lower minimum order quantities, 45-day credit terms, and rapid replenishment. Moreover, goods produced in Bangladesh are 100% exempt from the U.S. Section 301 tariffs (7.5%–25%) that burden Chinese goods, creating a durable pricing advantage.
                        </p>
                    </div>

                    <!-- Highlights Strip -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 border-t border-[#F2EFE9]">
                        <div class="p-4 bg-[#FAF8F5] border border-[#E5E1D8]">
                            <span class="block font-serif text-3xl font-bold text-[#141517] tabular-nums">20+</span>
                            <span class="text-[11px] font-mono text-[#8A8C93]">Years Executive Leadership</span>
                        </div>
                        <div class="p-4 bg-[#FAF8F5] border border-[#E5E1D8]">
                            <span class="block font-serif text-3xl font-bold text-[#141517] tabular-nums">200K</span>
                            <span class="text-[11px] font-mono text-[#8A8C93]">Monthly Unit Capacity</span>
                        </div>
                        <div class="p-4 bg-[#FAF8F5] border border-[#E5E1D8]">
                            <span class="block font-serif text-3xl font-bold text-[#141517] tabular-nums">100%</span>
                            <span class="text-[11px] font-mono text-[#8A8C93]">C-TPAT & BSCI Certified</span>
                        </div>
                    </div>
                </div>

                <!-- Right visual column (5 cols) -->
                <div class="lg:col-span-5">
                    <div class="bg-[#FAF8F5] p-3 border border-[#E5E1D8] shadow-sm">
                        <div class="aspect-[4/5] overflow-hidden bg-[#F2EFE9]">
                            <img src="https://images.unsplash.com/photo-1581553680321-4fffae59fccd?auto=format&fit=crop&w=1200&q=80" 
                                 alt="Pattern cutter with scissors and leather swatches" 
                                 width="1200"
                                 height="1500"
                                 loading="lazy"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="mt-3 px-1 py-1 flex items-center justify-between text-[11px] font-mono text-[#5C5E64] border-t border-[#E5E1D8]">
                            <span>Master pattern development</span>
                            <span class="text-[#FA8231]">Sample Room (Quanzhou & BD)</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- THE DUAL DESK MODEL (New York + Dhaka) -->
    <section class="py-20 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-2xl mb-14">
                <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                    Operating Architecture
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-medium text-[#141517]">
                    The Transatlantic Sourcing Synergy
                </h2>
                <p class="mt-2 text-xs sm:text-sm text-[#5C5E64] font-light">
                    How our corporate presence in New York and manufacturing facilities in Bangladesh create frictionless international partnerships.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- US Office Card -->
                <div class="p-8 bg-white border border-[#E5E1D8] space-y-4">
                    <div class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                        United States Desk • Jackson Heights, Queens, NY
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">
                        Showroom, Wholesale Distribution & Account Management
                    </h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Located at 37-15 73rd Street, Store L4, Jackson Heights, NY 11372 (steps from Roosevelt Ave transit and minutes from LGA and JFK), our commercial showroom accommodates B2B line reviews, sample inspection, and private-label negotiations. Bulk inventory is managed through regional 3PL logistics facilities for rapid ground dispatch.
                    </p>
                    <ul class="pt-2 space-y-1.5 text-xs text-[#141517] font-medium border-t border-[#F2EFE9]">
                        <li>&mdash; Factory-direct pricing with lower MOQs from U.S. warehouse stock</li>
                        <li>&mdash; 45-day commercial payment terms for qualified wholesale accounts</li>
                        <li>&mdash; Dedicated account executives and rapid physical sample dispatch</li>
                    </ul>
                </div>

                <!-- Dhaka Factory Card -->
                <div class="p-8 bg-white border border-[#E5E1D8] space-y-4">
                    <div class="text-[10px] font-mono uppercase tracking-wider text-[#FA8231] font-semibold">
                        Manufacturing Hub • Sarail, Brahmanbaria & Dhaka, Bangladesh
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">
                        15 Production Lines, 880 Machines & QA Testing Labs
                    </h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Our foreign affiliate, Victor Bags Factory Ltd., operates an integrated industrial complex in Brahmanbaria, backed by corporate headquarters in Uttara, Dhaka, and a product development office in Quanzhou, China. Equipped with advanced in-line testing apparatus for drop, jerk, wheel durability, and tensile load.
                    </p>
                    <ul class="pt-2 space-y-1.5 text-xs text-[#141517] font-medium border-t border-[#F2EFE9]">
                        <li>&mdash; 200,000 finished pieces monthly capacity across 15 production lines</li>
                        <li>&mdash; Fully certified: C-TPAT, BSCI, ISO 14001, Nirapon, and CPSIA compliance</li>
                        <li>&mdash; Direct ocean container shipments via Chittagong (Chattogram) seaport</li>
                    </ul>
                </div>

            </div>

        </div>
    </section>

    <!-- CORE MANUFACTURING VALUES -->
    <section class="py-20 bg-white border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-2xl mb-12">
                <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                    Operating Philosophy
                </span>
                <h2 class="font-serif text-3xl font-medium text-[#141517]">
                    The Principles We Stand Behind
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="space-y-2 p-6 bg-[#FAF8F5] border border-[#E5E1D8]">
                    <span class="font-mono text-xs text-[#FA8231]">01</span>
                    <h3 class="font-serif text-xl font-bold text-[#141517]">Direct-From-Manufacturer Value</h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        We eliminate intermediary brokerage markups. Our U.S. clients receive factory pricing, transparent BOM costing, and reliable capacity commitments backed by our owned production base.
                    </p>
                </div>

                <div class="space-y-2 p-6 bg-[#FAF8F5] border border-[#E5E1D8]">
                    <span class="font-mono text-xs text-[#FA8231]">02</span>
                    <h3 class="font-serif text-xl font-bold text-[#141517]">U.S.-Ready Compliance & Safety</h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Our manufacturing meets the most stringent international standards: C-TPAT customs security, BSCI fair labor audits, ISO 14001 environmental stewardship, and full CPSIA compliance for children's goods.
                    </p>
                </div>

                <div class="space-y-2 p-6 bg-[#FAF8F5] border border-[#E5E1D8]">
                    <span class="font-mono text-xs text-[#FA8231]">03</span>
                    <h3 class="font-serif text-xl font-bold text-[#141517]">Strict Zero-Defect Governance</h3>
                    <p class="text-xs text-[#5C5E64] leading-relaxed">
                        Every production batch undergoes multi-stage AQL-based inspection, pneumatic 75kg tensile pulls, continuous zipper cycling, and corner drop stress tests before export authorization.
                    </p>
                </div>

            </div>

        </div>
    </section>

@endsection
