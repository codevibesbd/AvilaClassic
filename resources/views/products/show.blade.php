@extends('layouts.app')

@section('title', $product->title . ' | Technical Specifications | Avila Classic')
@section('meta_description', $product->summary)
@section('meta_keywords', $product->title . ', ' . $product->category_name . ', ' . $product->primary_material . ', Avila Classic catalog')
@section('og_image', $product->primary_image)

@section('schema')
@php
    $images = array_merge([$product->primary_image], $product->gallery_images ?? []);
    $images = array_values(array_unique(array_filter($images)));

    $productSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $product->title,
        'image' => $images,
        'description' => $product->summary,
        'sku' => $product->sku,
        'category' => $product->category_name,
        'material' => $product->primary_material,
        'brand' => [
            '@type' => 'Brand',
            'name' => 'Avila Classic',
        ],
        'manufacturer' => [
            '@type' => 'Organization',
            'name' => 'Avila Classic Trading Inc.',
            'url' => url('/'),
        ],
        'offers' => [
            '@type' => 'AggregateOffer',
            'priceCurrency' => 'USD',
            'price' => '0',
            'priceValidUntil' => '2028-12-31',
            'availability' => 'https://schema.org/InStoreOnly',
            'itemCondition' => 'https://schema.org/NewCondition',
            'description' => 'Enterprise OEM/ODM catalog demonstration piece. Specification review only.',
        ],
    ];

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => route('home'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Products',
                'item' => route('products.index'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $product->category_name,
                'item' => route('products.index', ['category' => $product->category]),
            ],
            [
                '@type' => 'ListItem',
                'position' => 4,
                'name' => $product->title,
                'item' => route('products.show', $product->slug),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')

    <!-- TOP BREADCRUMBS & TRADE NOTICE -->
    <div class="bg-[#FAF8F5] border-b border-[#E5E1D8] py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center flex-wrap gap-2 text-xs font-mono text-[#8A8C93]">
                <a href="{{ route('home') }}" class="hover:text-[#141517] transition-colors">Overview</a>
                <span>/</span>
                <a href="{{ route('products.index') }}" class="hover:text-[#141517] transition-colors">Specification Catalog</a>
                <span>/</span>
                <a href="{{ route('products.index', ['category' => $product->category]) }}" class="hover:text-[#141517] transition-colors">
                    {{ $product->category_name }}
                </a>
                <span>/</span>
                <span class="text-[#FA8231] font-semibold truncate">{{ $product->title }}</span>
            </nav>
        </div>
    </div>

    <!-- SPECIFICATION SHEET BODY -->
    <section class="py-12 lg:py-20 bg-[#FAF8F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Global Archival Notice Banner -->
            <div class="mb-10 p-4 bg-white border border-[#E5E1D8] flex items-center justify-between gap-4 flex-wrap sm:flex-nowrap">
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full bg-[#FA8231]"></span>
                    <span class="text-xs text-[#5C5E64]">
                        <strong class="text-[#141517]">Engineering Specification Record:</strong> Purely for material evaluation, CAD tolerance review, and contract manufacturing quotation. Non-commercial piece.
                    </span>
                </div>
                <a href="{{ route('products.index') }}" class="text-xs font-mono uppercase tracking-wider text-[#141517] hover:text-[#FA8231] whitespace-nowrap">
                    &larr; Return to Index
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
                
                <!-- Left Column: Gallery & Production Assurance (7 cols) -->
                <div class="lg:col-span-7 space-y-5">
                    
                    <!-- Main Image Frame (Crisp Paper Stage) -->
                    <div class="relative aspect-[4/3] bg-white p-3 border border-[#E5E1D8] shadow-sm">
                        <div class="w-full h-full overflow-hidden bg-[#F2EFE9] relative">
                            <img id="main-product-image" 
                                 src="{{ $product->primary_image }}" 
                                 alt="{{ $product->title }} - Full Engineering Specification" 
                                 width="1200"
                                 height="900"
                                 fetchpriority="high"
                                 class="w-full h-full object-cover object-center transition-opacity duration-200">
                        </div>

                        <!-- Top Badges on Gallery -->
                        <div class="absolute top-6 left-6 flex flex-wrap gap-2">
                            <span class="px-2.5 py-1 text-[10px] font-mono uppercase bg-white/95 text-[#141517] border border-[#E5E1D8] shadow-sm">
                                {{ $product->category_name }}
                            </span>
                            @if($product->is_sustainable)
                                <span class="px-2.5 py-1 text-[10px] font-mono uppercase bg-[#141517] text-white shadow-sm">
                                    Eco rPET
                                </span>
                            @endif
                        </div>

                        <div class="absolute bottom-6 left-6">
                            <span class="px-2 py-0.5 text-[10px] font-mono bg-white/95 text-[#5C5E64] border border-[#E5E1D8]">
                                SPECIMEN NO: {{ $product->sku }}
                            </span>
                        </div>
                    </div>

                    <!-- Gallery Thumbnails (if available) -->
                    @if(!empty($product->gallery_images) && count($product->gallery_images) > 1)
                        <div class="flex items-center gap-3 overflow-x-auto pb-2" role="region" aria-label="Product image thumbnails">
                            @foreach($product->gallery_images as $index => $img)
                                <button type="button" 
                                        onclick="switchGalleryImage('{{ $img }}', this)" 
                                        aria-label="{{ $product->title }} view {{ $index + 1 }}"
                                        aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                        class="gallery-thumb relative flex-shrink-0 w-20 h-20 p-1 bg-white border transition-colors duration-200 transition-opacity duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-2 {{ $loop->first ? 'border-[#FA8231] opacity-100' : 'border-[#E5E1D8] opacity-60 hover:opacity-100' }}">
                                    <img src="{{ $img }}" alt="" width="80" height="80" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif

                    <!-- Production & Quality Assurance Statement -->
                    <div class="p-6 bg-white border border-[#E5E1D8] space-y-2.5">
                        <div class="flex items-center gap-2 text-xs font-mono uppercase tracking-wider text-[#FA8231]">
                            <svg class="w-4 h-4 text-[#FA8231]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                            <span>Dhaka Testing Lab QA Certification</span>
                        </div>
                        <p class="text-xs text-[#5C5E64] leading-relaxed">
                            Every manufacturing batch corresponding to this design blueprint undergoes four mandatory QA stages: 75kg pneumatic strap pull stress testing, 5,000 continuous zipper traversal cycles, and 1.2m ISTA-3A corner impact drop evaluation.
                        </p>
                    </div>

                </div>

                <!-- Right Column: Engineering Specs & Details (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <div class="border-b border-[#E5E1D8] pb-5">
                        <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                            {{ $product->category_name }}
                        </span>
                        <h1 class="font-serif text-3xl sm:text-4xl font-medium text-[#141517] tracking-tight leading-tight">
                            {{ $product->title }}
                        </h1>
                        @if(!empty($product->tagline))
                            <p class="mt-2 text-sm text-[#FA8231] font-medium">
                                {{ $product->tagline }}
                            </p>
                        @endif
                    </div>

                    <!-- Narrative Description -->
                    <div class="text-xs sm:text-sm text-[#5C5E64] leading-relaxed space-y-3 font-light">
                        {!! nl2br(e($product->description)) !!}
                    </div>

                    <!-- Colorway Swatches (Styled like Fabric Sample Swatches) -->
                    @if(!empty($product->color_options))
                        <div class="pt-2">
                            <span class="block text-[11px] font-mono uppercase tracking-wider text-[#8A8C93] mb-2.5">
                                Production Colorway Standards:
                            </span>
                            <div class="flex flex-wrap gap-2.5">
                                @foreach($product->color_options as $color)
                                    <div class="flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E5E1D8] text-xs">
                                        <span class="w-3.5 h-3.5 rounded-full border border-black/10 shadow-xs" style="background-color: {{ $color['hex'] }};"></span>
                                        <span class="text-[#141517] font-medium text-[11px]">{{ $color['name'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- TECHNICAL SPECIFICATIONS TABLE (Architectural Ledger) -->
                    <div>
                        <span class="block text-[11px] font-mono uppercase tracking-wider text-[#8A8C93] mb-2.5">
                            Bill of Materials & Engineering Specifications
                        </span>
                        <table class="w-full bg-white border border-[#E5E1D8] text-xs">
                            <caption class="sr-only">Bill of Materials & Technical Specifications for {{ $product->title }}</caption>
                            <tbody class="divide-y divide-[#E5E1D8]">
                                @if(!empty($product->capacity))
                                    <tr class="p-3 flex justify-between items-center gap-4">
                                        <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Volumetric Capacity</th>
                                        <td class="text-[#141517] font-mono font-semibold tabular-nums text-right">{{ $product->capacity }}</td>
                                    </tr>
                                @endif

                                @if(!empty($product->dimensions))
                                    <tr class="p-3 flex justify-between items-center gap-4">
                                        <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Dimensions</th>
                                        <td class="text-[#141517] font-mono tabular-nums text-right">{{ $product->dimensions }}</td>
                                    </tr>
                                @endif

                                @if(!empty($product->weight))
                                    <tr class="p-3 flex justify-between items-center gap-4">
                                        <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Tare Weight</th>
                                        <td class="text-[#141517] font-mono tabular-nums text-right">{{ $product->weight }}</td>
                                    </tr>
                                @endif

                                <tr class="p-3 flex justify-between items-start gap-4">
                                    <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Primary Textile</th>
                                    <td class="text-[#141517] text-right font-medium max-w-[240px]">{{ $product->primary_material }}</td>
                                </tr>

                                @if(!empty($product->lining_material))
                                    <tr class="p-3 flex justify-between items-start gap-4">
                                        <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Internal Lining</th>
                                        <td class="text-[#141517] text-right font-medium max-w-[240px]">{{ $product->lining_material }}</td>
                                    </tr>
                                @endif

                                @if(!empty($product->hardware_specs))
                                    <tr class="p-3 flex justify-between items-start gap-4">
                                        <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Hardware & Fasteners</th>
                                        <td class="text-[#141517] text-right font-medium max-w-[240px]">{{ $product->hardware_specs }}</td>
                                    </tr>
                                @endif

                                <tr class="p-3 flex justify-between items-center gap-4">
                                    <th scope="row" class="text-[#5C5E64] font-mono text-[11px] font-normal text-left">Factory of Origin</th>
                                    <td class="text-[#141517] text-right font-medium">Sarail, Brahmanbaria, Bangladesh (Victor Bags Factory Ltd.)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ARCHITECTURAL FEATURES CHECKLIST -->
                    @if(!empty($product->features))
                        <div>
                            <span class="block text-[11px] font-mono uppercase tracking-wider text-[#8A8C93] mb-2.5">
                                Structural Design Features
                            </span>
                            <ul class="space-y-2 text-xs text-[#5C5E64]">
                                @foreach($product->features as $feature)
                                    <li class="flex items-start gap-2.5">
                                        <span class="text-[#FA8231] font-bold">&mdash;</span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- AUDITED COMPLIANCE -->
                    @if(!empty($product->certifications))
                        <div class="pt-2">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-[#8A8C93] mb-2">
                                Production Audit Badges:
                            </span>
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->certifications as $cert)
                                    <span class="px-2 py-0.5 text-[10px] font-mono bg-white border border-[#E5E1D8] text-[#141517]">
                                        {{ $cert }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- ENTERPRISE SOURCING INQUIRY BOX (Direct B2B, No Cart) -->
                    <div class="pt-4 border-t border-[#E5E1D8]">
                        <div class="p-6 bg-[#141517] text-[#FAF8F5] space-y-4">
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 bg-[#FA8231]"></span>
                                <h4 class="font-serif text-lg font-bold text-white">Inquire About This Blueprint</h4>
                            </div>
                            <p class="text-xs text-stone-400 leading-relaxed">
                                For private label batch runs, custom fabrication, U.S. stock replenishment, or requesting physical sample review at our Jackson Heights showroom, contact our sourcing desk directly.
                            </p>
                            <div class="pt-1 flex flex-col sm:flex-row gap-3 text-xs">
                                <a href="{{ route('contact') }}" class="px-5 py-3 bg-[#FAF8F5] text-[#141517] font-semibold uppercase tracking-wider text-center hover:bg-[#FA8231] hover:text-white transition-colors">
                                    Contact Sourcing Desk
                                </a>
                                <a href="mailto:info@avilaclassic.com?subject=Catalog%20Sample%20Inquiry%20-%20{{ urlencode($product->title) }}" class="px-5 py-3 border border-stone-700 text-stone-300 font-semibold text-center hover:text-white hover:border-stone-500 transition-colors">
                                    Email: info@avilaclassic.com
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- RELATED SPECIFICATIONS SECTION -->
    @if($relatedProducts->count() > 0)
        <section class="py-16 bg-white border-t border-[#E5E1D8]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-[#E5E1D8]">
                    <div>
                        <span class="text-[10px] font-mono uppercase tracking-widest text-[#FA8231]">Related References</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#141517] tracking-tight mt-1">
                            Additional Catalog Silhouettes
                        </h2>
                    </div>
                    <a href="{{ route('products.index') }}" class="text-xs font-mono uppercase tracking-wider text-[#141517] hover:text-[#FA8231] transition-colors">
                        View Entire Catalog &rarr;
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedProducts as $rel)
                        <x-product-card :product="$rel" />
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    <!-- Image Switcher Script -->
    <script>
        function switchGalleryImage(url, buttonEl) {
            const mainImg = document.getElementById('main-product-image');
            if (mainImg) {
                mainImg.style.opacity = '0.5';
                setTimeout(() => {
                    mainImg.src = url;
                    mainImg.style.opacity = '1';
                }, 150);
            }

            document.querySelectorAll('.gallery-thumb').forEach(btn => {
                btn.classList.remove('border-[#FA8231]', 'opacity-100');
                btn.classList.add('border-[#E5E1D8]', 'opacity-60');
                btn.setAttribute('aria-current', 'false');
            });

            if (buttonEl) {
                buttonEl.classList.remove('border-[#E5E1D8]', 'opacity-60');
                buttonEl.classList.add('border-[#FA8231]', 'opacity-100');
                buttonEl.setAttribute('aria-current', 'true');
            }
        }
    </script>

@endsection
