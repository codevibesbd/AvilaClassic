@extends('layouts.app')

@section('title', 'Specification Catalog & Technical Index | Avila Classic')
@section('meta_description', 'Explore Avila Classic’s archival product catalog of backpacks, luggage, duffels, and travel accessories. Purely for technical inspection, denier density, and manufacturing review.')

@section('schema')
@php
    $itemList = [];
    foreach ($products as $index => $p) {
        $itemList[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'url' => route('products.show', $p->slug),
            'name' => $p->title,
        ];
    }
    $collectionSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => 'Avila Classic Product Specifications Catalog',
        'description' => 'Technical catalog of premium OEM/ODM backpacks, luggage, duffles, and travel accessories manufactured by Avila Classic Trading Inc.',
        'url' => route('products.index'),
        'mainEntity' => [
            '@type' => 'ItemList',
            'numberOfItems' => $products->count(),
            'itemListElement' => $itemList,
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($collectionSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')

    <!-- HERO HEADER: THE ARCHITECTURAL INDEX -->
    <section class="py-12 lg:py-16 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-mono text-[#8A8C93] mb-6">
                <a href="{{ route('home') }}" class="hover:text-[#141517] transition-colors">Overview</a>
                <span>/</span>
                <span class="text-[#141517]">Specification Catalog</span>
            </nav>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 bg-[#FA8231]"></span>
                        <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231]">
                            Archival Specification Series
                        </span>
                    </div>

                    <h1 class="font-serif text-3xl sm:text-5xl font-medium text-[#141517] tracking-tight">
                        The Technical Catalog Index
                    </h1>

                    <p class="text-sm text-[#5C5E64] max-w-2xl leading-relaxed font-light">
                        Representative wholesale and private-label silhouettes manufactured across our 15 affiliated production lines in Bangladesh. Review material deniers, load capacities, seam shear ratings, and hardware fittings.
                    </p>
                </div>

                <!-- Grounded B2B Notice Box -->
                <div class="p-4 bg-white border border-[#E5E1D8] text-xs text-[#5C5E64] max-w-md space-y-1">
                    <span class="text-[10px] font-mono uppercase text-[#FA8231] font-semibold block">
                        Trade Notice:
                    </span>
                    <p class="leading-relaxed">
                        This digital index exists solely for private label buyer review and technical auditing. No automated consumer purchasing or checkout is available.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- SEARCH & CATEGORY FILTER STRIP -->
    <section class="py-5 bg-white border-b border-[#E5E1D8] sticky top-20 z-30 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col lg:flex-row items-center justify-between gap-4">
                
                <!-- Category Tabs (Horizontal Scroll on Mobile) -->
                <div class="w-full lg:w-auto flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 scrollbar-none text-xs">
                    @foreach($categories as $slug => $cat)
                        <a href="{{ route('products.index', array_merge(request()->except('category', 'page'), ['category' => $slug])) }}" 
                           class="min-h-[40px] px-3.5 py-2 font-medium whitespace-nowrap transition-colors duration-200 border flex items-center gap-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] {{ $currentCategory === $slug ? 'bg-[#141517] text-[#FAF8F5] border-[#141517] font-semibold' : 'bg-[#FAF8F5] text-[#5C5E64] hover:text-[#141517] border-[#E5E1D8] hover:bg-white' }}">
                            <span>{{ $cat['name'] }}</span>
                            <span class="text-[10px] font-mono px-1 py-0.2 tabular-nums {{ $currentCategory === $slug ? 'bg-white/20 text-white' : 'text-[#8A8C93]' }}">
                                {{ $cat['count'] }}
                            </span>
                        </a>
                    @endforeach
                </div>

                <!-- Search & Filters Right Group -->
                <div class="w-full lg:w-auto flex flex-wrap sm:flex-nowrap items-center gap-3">
                    
                    @if($currentCategory && $currentCategory !== 'all')
                        <input type="hidden" name="category" value="{{ $currentCategory }}">
                    @endif

                    <!-- Search Input -->
                    <div class="relative flex-grow sm:flex-grow-0 sm:w-64">
                        <label for="catalog-search" class="sr-only">Filter catalog by textile or SKU</label>
                        <input type="text" 
                               id="catalog-search"
                               name="search" 
                               value="{{ $searchTerm }}" 
                               aria-label="Filter catalog by textile or SKU"
                               placeholder="Filter by textile, SKU…" 
                               class="w-full pl-9 pr-9 py-2.5 text-base sm:text-xs bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] placeholder-[#8A8C93] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] transition-colors">
                        <svg class="w-4 h-4 text-[#8A8C93] absolute left-3 top-3 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        @if(!empty($searchTerm))
                            <a href="{{ route('products.index', ['category' => $currentCategory]) }}" 
                               aria-label="Clear search filter"
                               class="min-w-[36px] min-h-[36px] inline-flex items-center justify-center absolute right-1 top-1/2 -translate-y-1/2 text-[#8A8C93] hover:text-[#141517] text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] rounded-xs">&times;</a>
                        @endif
                    </div>

                    <button type="submit" 
                            class="min-h-[44px] px-5 py-2.5 bg-[#FAF8F5] border border-[#E5E1D8] text-xs font-semibold uppercase tracking-wider text-[#141517] hover:bg-[#F2EFE9] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231]">
                        Filter
                    </button>

                </div>

            </form>

        </div>
    </section>

    <!-- PRODUCT CATALOG GRID -->
    <section class="py-14 lg:py-20 bg-[#FAF8F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Result Meta Information -->
            <div class="mb-8 flex items-center justify-between text-xs text-[#5C5E64] font-mono border-b border-[#E5E1D8] pb-4">
                <div>
                    Displaying <strong class="tabular-nums text-[#141517]">{{ $products->count() }}</strong> of <strong class="tabular-nums text-[#141517]">{{ $products->total() }}</strong> technical specification records
                    @if(!empty($searchTerm))
                        <span class="text-[#FA8231]">matching "{{ $searchTerm }}"</span>
                    @endif
                </div>
                <div class="hidden sm:block text-[#8A8C93]">
                    Batch Lot #2026-DHX
                </div>
            </div>

            <!-- The Grid of Authentic Product Cards -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                <!-- Clean Pagination -->
                @if($products->hasPages())
                    <div class="mt-14 pt-8 border-t border-[#E5E1D8] flex justify-center">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <!-- No Results Empty State -->
                <div class="py-20 text-center bg-white border border-[#E5E1D8] p-12 max-w-lg mx-auto space-y-4">
                    <span class="font-mono text-xs uppercase tracking-widest text-[#FA8231]">No Records Found</span>
                    <h3 class="font-serif text-2xl font-bold text-[#141517]">No Matching Specifications</h3>
                    <p class="text-xs text-[#5C5E64]">
                        We could not find any catalog items matching your filter criteria. Try clearing the search query or selecting "All Categories".
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('products.index') }}" class="px-5 py-2.5 bg-[#141517] text-white text-xs uppercase tracking-wider font-semibold">
                            Reset Filters
                        </a>
                    </div>
                </div>
            @endif

            <!-- Direct Enterprise Notice Footer -->
            <div class="mt-16 p-8 bg-white border border-[#E5E1D8] flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-1 text-center md:text-left">
                    <h4 class="font-serif text-2xl font-bold text-[#141517]">Custom Silhouettes & Private Label Prototyping</h4>
                    <p class="text-xs text-[#5C5E64] max-w-2xl leading-relaxed">
                        Do you require a custom luggage geometry, bespoke jacquard lining, or exclusive hardware mold? Our in-house sample development team builds bespoke prototypes from your design files.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('contact') }}" class="px-6 py-3 bg-[#141517] text-white text-xs uppercase tracking-wider font-semibold hover:bg-[#FA8231] transition-colors">
                        Inquire with Sourcing Desk &rarr;
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
