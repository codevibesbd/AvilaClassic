<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary SEO Metadata -->
    <title>@yield('title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor | New York')</title>
    <meta name="description" content="@yield('meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. Factory-direct luggage, backpacks, and private-label travel gear from U.S. stock. 1,100+ employees, 200,000 units/mo capacity, C-TPAT & BSCI certified.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Avila Classic Trading Inc, wholesale luggage, factory direct backpacks, private label travel gear, luggage manufacturer Bangladesh, C-TPAT certified bag factory, Victor Bags Factory Ltd, Jackson Heights NY showroom, bulk luggage distributor USA')">
    <meta name="author" content="Avila Classic Trading Inc.">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor')">
    <meta property="og:description" content="@yield('meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd., supplying factory-direct luggage, backpacks, and travel gear from U.S. stock.')">
    <meta property="og:image" content="@yield('og_image', url('/images/og-share.jpg'))">
    <meta property="og:site_name" content="Avila Classic">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor')">
    <meta name="twitter:description" content="@yield('meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd., supplying factory-direct luggage, backpacks, and travel gear from U.S. stock.')">
    <meta name="twitter:image" content="@yield('og_image', url('/images/og-share.jpg'))">
    
    <!-- Theme & Icons -->
    <meta name="theme-color" content="#FAF8F5">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='4' fill='%23141517'/><path d='M10 8h12v16H10z' fill='none' stroke='%23FAF8F5' stroke-width='1.5'/><line x1='10' y1='14' x2='22' y2='14' stroke='%23FA8231' stroke-width='1.5'/></svg>">

    <!-- Authentic Typography: Cormorant Garamond (Editorial Serif) & Plus Jakarta Sans (Precision Grotesque) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Global Schema.org JSON-LD -->
    @php
        $globalSchema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => url('/') . '#organization',
                    'name' => 'Avila Classic',
                    'legalName' => 'Avila Classic Trading Inc.',
                    'taxID' => '38-4379519',
                    'url' => url('/'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=600&q=80',
                        'caption' => 'Avila Classic Trading Inc.',
                    ],
                    'contactPoint' => [
                        [
                            '@type' => 'ContactPoint',
                            'telephone' => '+1-646-206-9437',
                            'contactType' => 'corporate sourcing desk',
                            'email' => 'info@avilaclassic.com',
                            'areaServed' => ['US', 'Global'],
                            'availableLanguage' => ['English'],
                        ]
                    ],
                    'address' => [
                        [
                            '@type' => 'PostalAddress',
                            'streetAddress' => '37-15 73rd Street, Store L4',
                            'addressLocality' => 'Jackson Heights',
                            'addressRegion' => 'NY',
                            'postalCode' => '11372',
                            'addressCountry' => 'USA',
                        ],
                        [
                            '@type' => 'PostalAddress',
                            'streetAddress' => 'Vill: East Kottapara, PO: Sarail, Upazila: Sarail',
                            'addressLocality' => 'Brahmanbaria',
                            'postalCode' => '3430',
                            'addressCountry' => 'Bangladesh',
                        ]
                    ],
                    'description' => 'Avila Classic Trading Inc. is a New York corporation and U.S. wholesale distribution affiliate of Victor Bags Factory Ltd., supplying factory-direct luggage, backpacks, and private-label travel gear from U.S. stock.',
                    'knowsAbout' => ['Wholesale Luggage Distribution', 'Contract Backpack Manufacturing', 'Private Label Travel Gear', 'C-TPAT Supply Chain Security', 'BSCI Audited Manufacturing', 'Duty-Advantaged Sourcing'],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/') . '#website',
                    'url' => url('/'),
                    'name' => 'Avila Classic',
                    'publisher' => [
                        '@id' => url('/') . '#organization',
                    ],
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => url('/products') . '?search={search_term_string}',
                        'query-input' => 'required name=search_term_string',
                    ],
                ]
            ]
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($globalSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    @yield('schema')

    <!-- Compiled CSS & Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F5] text-[#141517] font-sans min-h-full flex flex-col selection:bg-[#FA8231] selection:text-white antialiased">

    <!-- Skip to Main Content Link for Keyboard & Screen Reader Users -->
    <a href="#main-content" 
       class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:px-4 focus:py-2.5 focus:bg-[#FA8231] focus:text-white focus:shadow-lg focus:font-semibold focus:text-xs uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#141517]">
        Skip to content
    </a>

    <!-- Top Trade Banner: Authentic Human Notice -->
    <div class="bg-[#141517] text-[#FAF8F5] text-[11px] font-medium tracking-wide py-2 px-4 border-b border-[#282A30]">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-[#FA8231]" aria-hidden="true"></span>
                <span class="text-stone-300">
                    <strong class="text-white font-semibold">AVILA&nbsp;CLASSIC TRADING&nbsp;INC.</strong> • New York Showroom & Bangladesh Manufacturing
                </span>
            </div>
            <div class="flex items-center gap-4 text-stone-400">
                <span class="text-stone-300 border-l border-stone-700 pl-3">Catalog & Specification Archives (B2B Only)</span>
                <span class="hidden md:inline text-stone-600">/</span>
                <a href="tel:+16462069437" class="hidden md:inline hover:text-white transition-colors focus-visible:underline">+1&nbsp;(646)&nbsp;206-9437</a>
                <span class="text-stone-600">/</span>
                <a href="mailto:info@avilaclassic.com" class="hover:text-amber-200 text-stone-300 transition-colors focus-visible:underline">info@avilaclassic.com</a>
            </div>
        </div>
    </div>

    <!-- Editorial Lookbook Header -->
    <header class="sticky top-0 z-50 bg-[#FAF8F5]/95 backdrop-blur-md border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Authentic Brand Monogram & Title -->
                <a href="{{ route('home') }}" class="group flex items-center gap-3.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-2 rounded-xs flex-shrink-0">
                    <div class="w-9 h-9 border border-[#141517] bg-[#141517] text-[#FAF8F5] flex items-center justify-center font-serif text-lg font-bold tracking-tighter group-hover:bg-[#FA8231] group-hover:border-[#FA8231] transition-colors flex-shrink-0" aria-hidden="true">
                        AC
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold tracking-tight text-[#141517] group-hover:text-[#FA8231] transition-colors leading-none whitespace-nowrap">
                            AVILA&nbsp;CLASSIC
                        </span>
                        <span class="text-[9px] uppercase tracking-[0.25em] font-semibold text-[#8A8C93] mt-1 whitespace-nowrap">
                            U.S. Wholesale Sourcing Desk
                        </span>
                    </div>
                </a>

                <!-- Desktop Editorial Navigation -->
                <nav aria-label="Main Navigation" class="hidden lg:flex items-center gap-5 xl:gap-8 text-xs xl:text-[13px] font-medium tracking-wide flex-shrink-0">
                    <a href="{{ route('home') }}" 
                       class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ request()->routeIs('home') ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                        Overview
                    </a>
                    
                    <a href="{{ route('products.index') }}" 
                       class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ request()->routeIs('products.*') ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                        Catalog
                    </a>

                    <a href="{{ route('manufacturing') }}" 
                       class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ request()->routeIs('manufacturing') ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                        Manufacturing
                    </a>

                    <a href="{{ route('sustainability') }}" 
                       class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ request()->routeIs('sustainability') ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                        Sustainability
                    </a>

                    <a href="{{ route('about') }}" 
                       class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ request()->routeIs('about') ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                        About
                    </a>

                    <a href="{{ route('contact') }}" 
                       class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ request()->routeIs('contact') ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                        Contact
                    </a>
                </nav>

                <!-- Right Action: Direct Inquiry Button -->
                <div class="hidden lg:flex items-center flex-shrink-0">
                    <a href="{{ route('contact') }}" 
                       class="px-5 py-2.5 bg-[#141517] text-[#FAF8F5] text-xs uppercase tracking-wider font-semibold hover:bg-[#FA8231] transition-colors border border-[#141517] whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-2">
                        Direct Inquiries
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex lg:hidden items-center gap-3">
                    <a href="{{ route('products.index') }}" 
                       class="min-h-[44px] px-3.5 py-2 border border-[#E5E1D8] bg-white text-xs font-semibold text-[#141517] inline-flex items-center justify-center hover:bg-[#F2EFE9] transition-colors focus-visible:ring-2 focus-visible:ring-[#FA8231]">
                        Catalog
                    </a>
                    <button type="button" id="mobile-menu-btn" 
                            aria-label="Toggle navigation" 
                            aria-expanded="false" 
                            aria-controls="mobile-menu"
                            class="min-w-[44px] min-h-[44px] p-2.5 border border-[#E5E1D8] text-[#141517] bg-white hover:bg-[#F2EFE9] transition-colors flex items-center justify-center focus-visible:ring-2 focus-visible:ring-[#FA8231]">
                        <svg id="menu-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg id="menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden lg:hidden border-b border-[#E5E1D8] bg-[#FAF8F5] px-6 py-6 space-y-4 overscroll-contain">
            <div class="space-y-2 text-sm font-medium">
                <a href="{{ route('home') }}" class="block py-2.5 border-b border-[#E5E1D8] text-[#141517] font-semibold">Overview</a>
                <a href="{{ route('products.index') }}" class="block py-2.5 border-b border-[#E5E1D8] text-[#141517]">Specification Catalog (12 Items)</a>
                <a href="{{ route('manufacturing') }}" class="block py-2.5 border-b border-[#E5E1D8] text-[#141517]">The Factory & Quality Labs</a>
                <a href="{{ route('sustainability') }}" class="block py-2.5 border-b border-[#E5E1D8] text-[#141517]">Sustainable Materials & ESG</a>
                <a href="{{ route('about') }}" class="block py-2.5 border-b border-[#E5E1D8] text-[#141517]">About Our Enterprise</a>
                <a href="{{ route('contact') }}" class="block py-2.5 text-[#141517]">Contact Global Desks</a>
            </div>

            <div class="pt-4 border-t border-[#E5E1D8] text-xs text-[#5C5E64] space-y-2">
                <div><strong>New York Office:</strong> 37-15 73rd Street, Store L4, Jackson Heights, NY 11372</div>
                <div><strong>Factory Affiliate:</strong> Victor Bags Factory Ltd. (Brahmanbaria & Dhaka)</div>
                <div><strong>Direct Tel:</strong> <a href="tel:+16462069437" class="underline text-[#141517]">+1&nbsp;(646)&nbsp;206-9437</a></div>
                <div class="pt-2">
                    <a href="{{ route('contact') }}" class="block w-full text-center min-h-[44px] py-3 bg-[#141517] text-white text-xs uppercase tracking-wider font-semibold inline-flex items-center justify-center">
                        Sourcing Desk Inquiry
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content" tabindex="-1" class="flex-grow focus:outline-none">
        @yield('content')
    </main>

    <!-- Authentic Industrial Atelier Footer -->
    <footer class="bg-[#111215] text-[#FAF8F5] border-t border-[#282A30] pt-20 pb-14 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 pb-16 border-b border-[#282A30]">
                
                <!-- Col 1: Identity & Human Heritage Statement (4 cols) -->
                <div class="lg:col-span-4 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-[#FAF8F5] text-[#141517] flex items-center justify-center font-serif text-base font-bold">
                            AC
                        </div>
                        <span class="font-serif text-2xl font-bold tracking-tight text-white">
                            AVILA CLASSIC
                        </span>
                    </div>

                    <p class="text-stone-400 leading-relaxed text-xs">
                        Avila Classic Trading Inc. is a New York corporation serving as the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. (Brahmanbaria, Bangladesh). Supplying factory-direct luggage, technical backpacks, and private-label travel gear from U.S. stock. Backed by 1,100+ artisans, 15 production lines, and 200,000 units monthly capacity.
                    </p>

                    <div class="pt-2 flex flex-wrap gap-2 text-[10px] uppercase font-mono tracking-wider text-stone-400">
                        <span class="px-2.5 py-1 border border-[#282A30] bg-[#18191D]">C-TPAT Certified</span>
                        <span class="px-2.5 py-1 border border-[#282A30] bg-[#18191D]">BSCI Audited</span>
                        <span class="px-2.5 py-1 border border-[#282A30] bg-[#18191D]">ISO 14001</span>
                        <span class="px-2.5 py-1 border border-[#282A30] bg-[#18191D]">Nirapon Safety</span>
                        <span class="px-2.5 py-1 border border-[#282A30] bg-[#18191D]">GRS Certified</span>
                    </div>
                </div>

                <!-- Col 2: Navigation Links (2 cols) -->
                <div class="lg:col-span-2 space-y-3">
                    <h4 class="text-[11px] font-mono uppercase tracking-widest text-[#FA8231]">
                        Enterprise
                    </h4>
                    <ul class="space-y-2 text-stone-400 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Overview</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-white transition-colors">Specification Catalog</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Company Heritage</a></li>
                        <li><a href="{{ route('manufacturing') }}" class="hover:text-white transition-colors">Factory & Assembly Lines</a></li>
                        <li><a href="{{ route('sustainability') }}" class="hover:text-white transition-colors">Sustainable Materials</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Direct Sourcing Desks</a></li>
                    </ul>
                </div>

                <!-- Col 3: Product Categories (3 cols) -->
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="text-[11px] font-mono uppercase tracking-widest text-[#FA8231]">
                        Catalog Disciplines
                    </h4>
                    <ul class="space-y-2 text-stone-400 text-xs">
                        <li><a href="{{ route('products.index', ['category' => 'backpacks']) }}" class="hover:text-white transition-colors">Executive & Ballistic Backpacks</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'luggage']) }}" class="hover:text-white transition-colors">Polycarbonate & Hybrid Luggage</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'duffle']) }}" class="hover:text-white transition-colors">Weatherproof Weekenders & Duffels</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'briefcases']) }}" class="hover:text-white transition-colors">Full-Grain Leather Briefcases</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'totes']) }}" class="hover:text-white transition-colors">Canvas & Heavyweight Totes</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'accessories']) }}" class="hover:text-white transition-colors">Technical Pouches & Dopp Kits</a></li>
                    </ul>
                </div>

                <!-- Col 4: Corporate Presence & Factory Address (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h4 class="text-[11px] font-mono uppercase tracking-widest text-[#FA8231]">
                        Operating Desks
                    </h4>
                    <div class="space-y-3 text-stone-400">
                        <div>
                            <span class="block text-white font-medium text-xs">New York Office & Showroom</span>
                            <span class="text-[11px]">37-15 73rd Street, Store L4<br>Jackson Heights, NY 11372, USA</span>
                        </div>
                        <div>
                            <span class="block text-white font-medium text-xs">Bangladesh Manufacturing Complex</span>
                            <span class="text-[11px]">Victor Bags Factory Ltd.<br>Sarail, Brahmanbaria & Uttara, Dhaka</span>
                        </div>
                        <div class="pt-1 text-[11px] space-y-0.5">
                            <div><strong>Direct Telephone:</strong> <a href="tel:+16462069437" class="text-stone-300 hover:text-white">+1 (646) 206-9437</a></div>
                            <div><strong>Sourcing Email:</strong> <a href="mailto:info@avilaclassic.com" class="text-stone-300 hover:text-white underline">info@avilaclassic.com</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Machine-Readable Context & Legal Strip -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-stone-500 text-[11px]">
                <div>
                    &copy; {{ date('Y') }} Avila Classic Trading Inc. All rights reserved. 
                    <span class="text-stone-600">Purely for architectural demonstration & technical specification review. Non-commercial catalog.</span>
                </div>
                <div class="flex items-center gap-4 text-stone-400 font-mono text-[10px]">
                    <a href="{{ route('seo.sitemap') }}" class="hover:text-white underline">sitemap.xml</a>
                    <span>/</span>
                    <a href="{{ route('seo.robots') }}" class="hover:text-white underline">robots.txt</a>
                    <span>/</span>
                    <a href="{{ route('seo.llms') }}" class="hover:text-white underline">llms.txt</a>
                    <span>/</span>
                    <a href="{{ route('seo.llms-full') }}" class="hover:text-white underline">llms-full.txt</a>
                </div>
            </div>

        </div>
    </footer>

    <!-- Mobile Drawer Interaction Script with APG Keyboard Support -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('menu-icon-open');
            const iconClose = document.getElementById('menu-icon-close');

            function toggleMenu(expand) {
                const shouldExpand = expand !== undefined ? expand : menu.classList.contains('hidden');
                if (shouldExpand) {
                    menu.classList.remove('hidden');
                    iconOpen.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                    btn.setAttribute('aria-expanded', 'true');
                } else {
                    menu.classList.add('hidden');
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                    btn.setAttribute('aria-expanded', 'false');
                }
            }

            if (btn && menu) {
                btn.addEventListener('click', () => {
                    const isHidden = menu.classList.contains('hidden');
                    toggleMenu(isHidden);
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && !menu.classList.contains('hidden')) {
                        toggleMenu(false);
                        btn.focus();
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
