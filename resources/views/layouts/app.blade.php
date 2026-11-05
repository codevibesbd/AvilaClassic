<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary SEO Metadata -->
    <title>@yield('title', setting('default_meta_title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor | New York'))</title>
    <meta name="description" content="@yield('meta_description', setting('default_meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. Factory-direct luggage, backpacks, and private-label travel gear from U.S. stock. 1,100+ employees, 200,000 units/mo capacity, C-TPAT & BSCI certified.'))">
    <meta name="keywords" content="@yield('meta_keywords', 'Avila Classic Trading Inc, wholesale luggage, factory direct backpacks, private label travel gear, luggage manufacturer Bangladesh, C-TPAT certified bag factory, Victor Bags Factory Ltd, Jackson Heights NY showroom, bulk luggage distributor USA')">
    <meta name="author" content="Avila Classic Trading Inc.">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">
    
    @if(setting('google_site_verification'))
        <meta name="google-site-verification" content="{{ setting('google_site_verification') }}">
    @endif

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', setting('default_meta_title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor'))">
    <meta property="og:description" content="@yield('meta_description', setting('default_meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd., supplying factory-direct luggage, backpacks, and travel gear from U.S. stock.'))">
    <meta property="og:image" content="@yield('og_image', url('/images/og-share.jpg'))">
    <meta property="og:site_name" content="{{ setting('site_name', 'Avila Classic') }}">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', setting('default_meta_title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor'))">
    <meta name="twitter:description" content="@yield('meta_description', setting('default_meta_description', 'Avila Classic Trading Inc. is the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd., supplying factory-direct luggage, backpacks, and travel gear from U.S. stock.'))">
    <meta name="twitter:image" content="@yield('og_image', url('/images/og-share.jpg'))">
    
    <!-- Theme & Icons -->
    <meta name="theme-color" content="#FAF8F5">
    @if(setting('site_favicon'))
        <link rel="icon" href="{{ setting('site_favicon') }}">
    @else
        <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='4' fill='%23141517'/><path d='M10 8h12v16H10z' fill='none' stroke='%23FAF8F5' stroke-width='1.5'/><line x1='10' y1='14' x2='22' y2='14' stroke='%23FA8231' stroke-width='1.5'/></svg>">
    @endif

    <!-- Authentic Typography: Cormorant Garamond & Plus Jakarta Sans -->
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
                    'name' => setting('site_name', 'Avila Classic'),
                    'legalName' => setting('corporate_legal_name', 'Avila Classic Trading Inc.'),
                    'taxID' => setting('corporate_tax_id', '38-4379519'),
                    'url' => url('/'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => setting('site_logo') ?: 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=600&q=80',
                        'caption' => setting('site_name', 'Avila Classic Trading Inc.'),
                    ],
                    'contactPoint' => [
                        [
                            '@type' => 'ContactPoint',
                            'telephone' => setting('contact_phone', '+1-646-206-9437'),
                            'contactType' => 'sales',
                            'areaServed' => ['US', 'CA', 'MX'],
                            'availableLanguage' => ['English', 'Spanish', 'Bengali'],
                        ]
                    ],
                    'address' => [
                        [
                            '@type' => 'PostalAddress',
                            'streetAddress' => setting('showroom_address', '73-05 37th Road'),
                            'addressLocality' => 'Jackson Heights',
                            'addressRegion' => 'NY',
                            'postalCode' => '11372',
                            'addressCountry' => 'US',
                        ]
                    ],
                    'description' => setting('footer_description', 'Avila Classic Trading Inc. is a New York corporation and U.S. wholesale distribution affiliate of Victor Bags Factory Ltd., supplying factory-direct luggage, backpacks, and private-label travel gear from U.S. stock.'),
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/') . '#website',
                    'url' => url('/'),
                    'name' => setting('site_name', 'Avila Classic'),
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

    <!-- Custom Head CSS & Tracking Scripts from Admin Settings -->
    @if(setting('custom_css'))
        <style>
            {!! setting('custom_css') !!}
        </style>
    @endif
    @if(setting('custom_head_scripts'))
        {!! setting('custom_head_scripts') !!}
    @endif
</head>
<body class="bg-[#FAF8F5] text-[#141517] font-sans min-h-full flex flex-col selection:bg-[#FA8231] selection:text-white antialiased">

    <!-- Skip to Main Content Link for Keyboard & Screen Reader Users -->
    <a href="#main-content" 
       class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:px-4 focus:py-2.5 focus:bg-[#FA8231] focus:text-white focus:shadow-lg focus:font-semibold focus:text-xs uppercase tracking-wider focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#141517]">
        Skip to content
    </a>

    <!-- Top Trade Banner: Authentic Human Notice -->
    @if(setting('announcement_enabled', '1') == '1')
    <div class="bg-[#141517] text-[#FAF8F5] text-[11px] font-medium tracking-wide py-2 px-4 border-b border-[#282A30]">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-[#FA8231]" aria-hidden="true"></span>
                <span class="text-stone-300">
                    <strong class="text-white font-semibold">{{ setting('corporate_legal_name', 'AVILA CLASSIC TRADING INC.') }}</strong> • {{ setting('announcement_text', 'New York Showroom & Bangladesh Manufacturing') }}
                </span>
            </div>
            <div class="flex items-center gap-4 text-stone-400">
                <span class="text-stone-300 border-l border-stone-700 pl-3">Catalog & Specification Archives (B2B Only)</span>
                <span class="hidden md:inline text-stone-600">/</span>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+16462069437')) }}" class="hidden md:inline hover:text-white transition-colors focus-visible:underline">
                    {{ setting('contact_phone', '+1 (646) 206-9437') }}
                </a>
                <span class="text-stone-600">/</span>
                <a href="mailto:{{ setting('contact_email', 'info@avilaclassic.com') }}" class="hover:text-amber-200 text-stone-300 transition-colors focus-visible:underline">
                    {{ setting('contact_email', 'info@avilaclassic.com') }}
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Editorial Lookbook Header -->
    <header class="sticky top-0 z-50 bg-[#FAF8F5]/95 backdrop-blur-md border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Authentic Brand Monogram & Title -->
                <a href="{{ route('home') }}" class="group flex items-center gap-3.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-2 rounded-xs flex-shrink-0">
                    @if(setting('site_logo'))
                        <img src="{{ setting('site_logo') }}" alt="{{ setting('site_name', 'Avila Classic') }}" class="h-9 object-contain">
                    @else
                        <div class="w-9 h-9 border border-[#141517] bg-[#141517] text-[#FAF8F5] flex items-center justify-center font-serif text-lg font-bold tracking-tighter group-hover:bg-[#FA8231] group-hover:border-[#FA8231] transition-colors flex-shrink-0" aria-hidden="true">
                            AC
                        </div>
                    @endif
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold tracking-tight text-[#141517] group-hover:text-[#FA8231] transition-colors leading-none whitespace-nowrap">
                            {{ setting('site_name', 'AVILA CLASSIC') }}
                        </span>
                        <span class="text-[9px] uppercase tracking-[0.25em] font-semibold text-[#8A8C93] mt-1 whitespace-nowrap">
                            {{ setting('site_tagline', 'U.S. Wholesale Sourcing Desk') }}
                        </span>
                    </div>
                </a>

                <!-- Desktop Editorial Navigation -->
                @php
                    $headerMenu = \App\Models\MenuItem::header()->get();
                    if ($headerMenu->isEmpty()) {
                        $headerMenu = collect([
                            (object)['label' => 'Overview', 'url' => route('home'), 'target' => '_self'],
                            (object)['label' => 'Catalog', 'url' => route('products.index'), 'target' => '_self'],
                            (object)['label' => 'Manufacturing', 'url' => route('manufacturing'), 'target' => '_self'],
                            (object)['label' => 'Sustainability', 'url' => route('sustainability'), 'target' => '_self'],
                            (object)['label' => 'About', 'url' => route('about'), 'target' => '_self'],
                            (object)['label' => 'Contact', 'url' => route('contact'), 'target' => '_self'],
                        ]);
                    }
                @endphp

                <nav aria-label="Main Navigation" class="hidden lg:flex items-center gap-5 xl:gap-8 text-xs xl:text-[13px] font-medium tracking-wide flex-shrink-0">
                    @foreach($headerMenu as $mItem)
                        @php
                            $isActive = request()->url() === url($mItem->url) || (request()->routeIs('products.*') && str_contains($mItem->url, 'products'));
                        @endphp
                        <a href="{{ $mItem->url }}" 
                           target="{{ $mItem->target ?? '_self' }}"
                           class="py-1 border-b-2 transition-colors duration-200 whitespace-nowrap {{ $isActive ? 'border-[#FA8231] text-[#141517] font-semibold' : 'border-transparent text-[#5C5E64] hover:text-[#141517]' }}">
                            {{ $mItem->label }}
                        </a>
                    @endforeach
                </nav>

                <!-- Right Action: Direct Inquiry Button -->
                <div class="hidden lg:flex items-center flex-shrink-0">
                    <a href="{{ setting('header_cta_url', route('contact')) }}" 
                       class="px-5 py-2.5 bg-[#141517] text-[#FAF8F5] text-xs uppercase tracking-wider font-semibold hover:bg-[#FA8231] transition-colors border border-[#141517] whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-2">
                        {{ setting('header_cta_label', 'Direct Inquiries') }}
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
                @foreach($headerMenu as $mItem)
                    <a href="{{ $mItem->url }}" class="block py-2.5 border-b border-[#E5E1D8] text-[#141517]">{{ $mItem->label }}</a>
                @endforeach
            </div>

            <div class="pt-4 border-t border-[#E5E1D8] text-xs text-[#5C5E64] space-y-2">
                <div><strong>New York Office:</strong> {{ setting('showroom_address', '73-05 37th Road, Jackson Heights, NY 11372') }}</div>
                <div><strong>Direct Tel:</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+16462069437')) }}" class="underline text-[#141517]">{{ setting('contact_phone', '+1 (646) 206-9437') }}</a></div>
                <div class="pt-2">
                    <a href="{{ setting('header_cta_url', route('contact')) }}" class="block w-full text-center min-h-[44px] py-3 bg-[#141517] text-white text-xs uppercase tracking-wider font-semibold inline-flex items-center justify-center">
                        {{ setting('header_cta_label', 'Sourcing Desk Inquiry') }}
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
                
                <!-- Col 1: Identity & Statement (4 cols) -->
                <div class="lg:col-span-4 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-[#FAF8F5] text-[#141517] flex items-center justify-center font-serif text-base font-bold">
                            AC
                        </div>
                        <span class="font-serif text-2xl font-bold tracking-tight text-white">
                            {{ setting('site_name', 'AVILA CLASSIC') }}
                        </span>
                    </div>

                    <p class="text-stone-400 leading-relaxed text-xs">
                        {{ setting('footer_description', 'Avila Classic Trading Inc. is a New York corporation serving as the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. Supplying factory-direct luggage, technical backpacks, and private-label travel gear from U.S. stock.') }}
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
                @php
                    $footerEnt = \App\Models\MenuItem::footerEnterprise()->get();
                    if ($footerEnt->isEmpty()) {
                        $footerEnt = collect([
                            (object)['label' => 'Overview', 'url' => route('home')],
                            (object)['label' => 'Specification Catalog', 'url' => route('products.index')],
                            (object)['label' => 'Company Heritage', 'url' => route('about')],
                            (object)['label' => 'Factory & Assembly Lines', 'url' => route('manufacturing')],
                            (object)['label' => 'Sustainable Materials', 'url' => route('sustainability')],
                            (object)['label' => 'Direct Sourcing Desks', 'url' => route('contact')],
                        ]);
                    }
                @endphp
                <div class="lg:col-span-2 space-y-3">
                    <h4 class="text-[11px] font-mono uppercase tracking-widest text-[#FA8231]">
                        Enterprise
                    </h4>
                    <ul class="space-y-2 text-stone-400 text-xs">
                        @foreach($footerEnt as $item)
                            <li><a href="{{ $item->url }}" class="hover:text-white transition-colors">{{ $item->label }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Col 3: Product Categories (3 cols) -->
                @php
                    $footerDisc = \App\Models\MenuItem::footerDisciplines()->get();
                    if ($footerDisc->isEmpty()) {
                        $footerDisc = collect([
                            (object)['label' => 'Executive & Ballistic Backpacks', 'url' => route('products.index', ['category' => 'backpacks'])],
                            (object)['label' => 'Polycarbonate & Hybrid Luggage', 'url' => route('products.index', ['category' => 'luggage'])],
                            (object)['label' => 'Weatherproof Weekenders & Duffels', 'url' => route('products.index', ['category' => 'duffle'])],
                            (object)['label' => 'Full-Grain Leather Briefcases', 'url' => route('products.index', ['category' => 'briefcases'])],
                            (object)['label' => 'Canvas & Heavyweight Totes', 'url' => route('products.index', ['category' => 'totes'])],
                            (object)['label' => 'Technical Pouches & Dopp Kits', 'url' => route('products.index', ['category' => 'accessories'])],
                        ]);
                    }
                @endphp
                <div class="lg:col-span-3 space-y-3">
                    <h4 class="text-[11px] font-mono uppercase tracking-widest text-[#FA8231]">
                        Catalog Disciplines
                    </h4>
                    <ul class="space-y-2 text-stone-400 text-xs">
                        @foreach($footerDisc as $item)
                            <li><a href="{{ $item->url }}" class="hover:text-white transition-colors">{{ $item->label }}</a></li>
                        @endforeach
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
                            <span class="text-[11px]">{{ setting('showroom_address', '73-05 37th Road, Jackson Heights, NY 11372') }}</span>
                        </div>
                        <div>
                            <span class="block text-white font-medium text-xs">Bangladesh Manufacturing Complex</span>
                            <span class="text-[11px]">{{ setting('facility_address', 'Victor Bags Factory Ltd., Plot 14-16, Sector 2, Export Processing Zone, Dhaka, Bangladesh') }}</span>
                        </div>
                        <div class="pt-1 text-[11px] space-y-0.5">
                            <div><strong>Direct Telephone:</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+16462069437')) }}" class="text-stone-300 hover:text-white">{{ setting('contact_phone', '+1 (646) 206-9437') }}</a></div>
                            <div><strong>Sourcing Email:</strong> <a href="mailto:{{ setting('contact_email', 'info@avilaclassic.com') }}" class="text-stone-300 hover:text-white underline">{{ setting('contact_email', 'info@avilaclassic.com') }}</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Legal Strip -->
            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-stone-500 text-[11px]">
                <div>
                    {{ setting('footer_copyright', '© ' . date('Y') . ' Avila Classic Trading Inc. All rights reserved.') }}
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
    
    @if(setting('custom_footer_scripts'))
        {!! setting('custom_footer_scripts') !!}
    @endif
    @stack('scripts')
</body>
</html>
