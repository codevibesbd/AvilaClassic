@extends('layouts.app')

@section('title', 'Contact Global Sourcing Desks | Avila Classic')
@section('meta_description', 'Get in touch with Avila Classic Trading Inc. US office and showroom in Jackson Heights, NY and manufacturing complex in Bangladesh. Inquire about wholesale and OEM/ODM supply.')
@section('og_image', asset('images/banner/contact-banner.jpg'))

@section('schema')
@php
    $contactSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ContactPage',
        'name' => 'Avila Classic Contact & Showroom',
        'url' => route('contact'),
        'description' => 'Contact information for Avila Classic corporate showroom in New York and manufacturing facilities in Bangladesh.',
        'primaryImageOfPage' => [
            '@type' => 'ImageObject',
            'url' => asset('images/banner/contact-banner.jpg'),
            'width' => 1600,
            'height' => 800,
            'caption' => 'Avila Classic Trading Inc. Corporate Showroom and Global Sourcing Desk Banner',
        ],
        'mainEntity' => [
            '@type' => 'Organization',
            'name' => 'Avila Classic Trading Inc.',
            'url' => url('/'),
            'logo' => asset('images/banner/contact-banner.jpg'),
            'telephone' => '+1-646-206-9437',
            'email' => 'info@avilaclassic.com',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '37-15 73rd Street, Store L4',
                'addressLocality' => 'Jackson Heights',
                'addressRegion' => 'NY',
                'postalCode' => '11372',
                'addressCountry' => 'USA',
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($contactSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')

    <!-- HERO HEADER: THE CORPORATE DIRECTORY -->
    <section class="py-16 lg:py-24 bg-[#FAF8F5] border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-[#FA8231]"></span>
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231]">
                        Global Sourcing & Trade Desks
                    </span>
                </div>
                <h1 class="font-serif text-4xl sm:text-6xl font-medium text-[#141517] tracking-tight leading-[1.1]">
                    Connect with our directors.
                </h1>
                <p class="text-base sm:text-lg text-[#5C5E64] font-light leading-relaxed">
                    Whether coordinating line reviews at our Jackson Heights showroom, reviewing technical prototypes, or placing wholesale replenishment orders, our team is at your disposal.
                </p>
            </div>

            <!-- Corporate Showroom & Trade Banner -->
            <div class="mt-10 lg:mt-12">
                <div class="p-2 sm:p-3 bg-white border border-[#E5E1D8] shadow-xs">
                    <img src="{{ asset('images/banner/contact-banner.jpg') }}" 
                         alt="Avila Classic Trading Inc. headquarters and showroom banner at 37-15 73rd Street, Store L4, Jackson Heights, NY 11372"
                         title="Avila Classic Trading Inc. Corporate Showroom & Global Sourcing Desk"
                         width="1600" 
                         height="800"
                         loading="eager"
                         fetchpriority="high"
                         decoding="async"
                         class="w-full h-auto aspect-[16/9] sm:aspect-[2/1] object-cover bg-[#FAF8F5]">
                    <div class="mt-2 px-2 py-1 flex flex-col sm:flex-row sm:items-center justify-between text-[11px] font-mono text-[#8A8C93] border-t border-[#E5E1D8] gap-1">
                        <span>Avila Classic Trading Inc. &bull; Corporate Showroom & Sourcing Desks</span>
                        <span class="text-[#FA8231] font-semibold">37-15 73rd Street, Store L4, Jackson Heights, NY 11372</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT CARDS & INQUIRY FORM -->
    <section class="py-20 lg:py-28 bg-white border-b border-[#E5E1D8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Left: Locations & Direct Contacts (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <!-- Card 1: US Corporate Office & Showroom -->
                    <div class="p-8 bg-[#FAF8F5] border border-[#E5E1D8] space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-xs font-bold">
                                US
                            </div>
                            <div>
                                <h3 class="font-serif text-xl font-bold text-[#141517]">United States Office & Showroom</h3>
                                <span class="text-[11px] font-mono text-[#8A8C93]">Avila Classic Trading Inc.</span>
                            </div>
                        </div>

                        <div class="space-y-3 text-xs text-[#5C5E64] border-t border-[#E5E1D8] pt-4">
                            <div>
                                <strong class="text-[#141517] block mb-0.5">Physical Address:</strong>
                                <span>{{ setting('showroom_address', '73-05 37th Road, Jackson Heights, NY 11372, USA') }}</span>
                            </div>

                            <div>
                                <strong class="text-[#141517] block mb-0.5">Telephone:</strong>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+16462069437')) }}" class="hover:text-[#FA8231] font-semibold text-[#141517]">
                                    {{ setting('contact_phone', '+1 (646) 206-9437') }}
                                </a>
                            </div>

                            <div>
                                <strong class="text-[#141517] block mb-0.5">Email Inquiries:</strong>
                                <a href="mailto:{{ setting('contact_email', 'info@avilaclassic.com') }}" class="text-[#FA8231] font-semibold underline">
                                    {{ setting('contact_email', 'info@avilaclassic.com') }}
                                </a>
                            </div>

                            <div>
                                <strong class="text-[#141517] block mb-0.5">Desk & Showroom Hours:</strong>
                                <span>{{ setting('operating_hours', 'Monday – Friday, 9:00 AM – 6:00 PM EST (Appointments available for B2B buyer reviews)') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Bangladesh Manufacturing Complex -->
                    <div class="p-8 bg-[#FAF8F5] border border-[#E5E1D8] space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 border border-[#141517] bg-[#141517] text-white flex items-center justify-center font-mono text-xs font-bold">
                                BD
                            </div>
                            <div>
                                <h3 class="font-serif text-xl font-bold text-[#141517]">Manufacturing Complex</h3>
                                <span class="text-[11px] font-mono text-[#8A8C93]">Victor Bags Factory Ltd.</span>
                            </div>
                        </div>

                        <div class="space-y-3 text-xs text-[#5C5E64] border-t border-[#E5E1D8] pt-4">
                            <div>
                                <strong class="text-[#141517] block mb-0.5">Factory Location:</strong>
                                <span>Vill: East Kottapara, PO: Sarail, Upazila: Sarail<br>District: Brahmanbaria – 3430, Bangladesh</span>
                            </div>

                            <div>
                                <strong class="text-[#141517] block mb-0.5">Corporate Office:</strong>
                                <span>Flat 1/D, House 7, Road 14/C, Sector 4, Uttara, Dhaka-1230</span>
                            </div>

                            <div>
                                <strong class="text-[#141517] block mb-0.5">Port of Lading:</strong>
                                <span>Port of Chattogram (Direct Vessel Export)</span>
                            </div>

                            <div>
                                <strong class="text-[#141517] block mb-0.5">Compliance Accreditations:</strong>
                                <span class="font-mono text-[11px]">C-TPAT • BSCI • ISO 14001 • Nirapon</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: Inquiry Form (7 cols) -->
                <div class="lg:col-span-7">
                    <div class="p-8 sm:p-10 bg-white border border-[#E5E1D8] shadow-sm space-y-6">
                        
                        <div class="border-b border-[#F2EFE9] pb-4">
                            <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-[#FA8231] block mb-1">
                                Sourcing Desk Dispatch
                            </span>
                            <h2 class="font-serif text-2xl sm:text-3xl font-medium text-[#141517]">
                                Request Tech-Pack Review, Sample or Wholesale Quote
                            </h2>
                            <p class="mt-1 text-xs text-[#5C5E64]">
                                Fill out your production parameters below. Our New York engineering desk responds with Bill of Materials (BOM) estimates and pricing within 72 hours.
                            </p>
                        </div>

                        <!-- Direct Form -->
                        @if(session('success'))
                            <div class="p-4 bg-emerald-50 border border-emerald-300 text-emerald-900 rounded text-xs font-mono mb-4 flex items-center gap-2" role="alert" aria-live="polite">
                                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form id="sourcing-inquiry-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-4 text-xs">
                            @csrf
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label for="contact-name" class="block font-mono text-[11px] text-[#141517] uppercase tracking-wider">Your Name *</label>
                                    <input type="text" id="contact-name" name="name" required autocomplete="name" placeholder="e.g. Eleanor Vance…" 
                                           class="w-full p-3 bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] text-base sm:text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-1 transition-colors">
                                </div>
                                <div class="space-y-1.5">
                                    <label for="contact-company" class="block font-mono text-[11px] text-[#141517] uppercase tracking-wider">Company / Brand *</label>
                                    <input type="text" id="contact-company" name="company" required autocomplete="organization" placeholder="e.g. Apex Travel Outfitters…" 
                                           class="w-full p-3 bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] text-base sm:text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-1 transition-colors">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label for="contact-email" class="block font-mono text-[11px] text-[#141517] uppercase tracking-wider">Corporate Email *</label>
                                    <input type="email" id="contact-email" name="email" required autocomplete="email" inputmode="email" spellcheck="false" placeholder="e.g. e.vance@apexoutfitters.com…" 
                                           class="w-full p-3 bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] text-base sm:text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-1 transition-colors">
                                </div>
                                <div class="space-y-1.5">
                                    <label for="contact-category" class="block font-mono text-[11px] text-[#141517] uppercase tracking-wider">Target Category</label>
                                    <select id="contact-category" name="category" class="w-full p-3 bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] text-base sm:text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-1 transition-colors">
                                        <option value="Professional Travel Gear">Professional Travel Gear (Luggage & Spinners)</option>
                                        <option value="Smart Luggage">Smart Luggage (USB / Tracking Compatible)</option>
                                        <option value="Backpacks">Backpacks & Laptop Bags</option>
                                        <option value="Duffels">Duffles & Travel Bags</option>
                                        <option value="Private Label">Private Label & Custom OEM/ODM</option>
                                        <option value="Accessories">Lifestyle Accessories & Pouches</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label for="contact-volume" class="block font-mono text-[11px] text-[#141517] uppercase tracking-wider">Estimated Batch Volume / Fulfillment Need</label>
                                <select id="contact-volume" name="volume" class="w-full p-3 bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] text-base sm:text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-1 transition-colors">
                                    <option value="US-Stock-Wholesale">U.S. Stock Wholesale Delivery (Lower MOQs)</option>
                                    <option value="1000-5000">Direct Factory Run: 1,000 – 5,000 units</option>
                                    <option value="5000-20000">Volume Batch: 5,000 – 20,000 units</option>
                                    <option value="Full-Container">Full Ocean Container (FOB Chattogram)</option>
                                </select>
                            </div>

                            <div class="space-y-1.5">
                                <div class="flex items-center justify-between">
                                    <label for="contact-body" class="block font-mono text-[11px] text-[#141517] uppercase tracking-wider">Project Specifications & Notes *</label>
                                    <span class="text-[10px] font-mono text-[#8A8C93]">Press ⌘+Enter to submit</span>
                                </div>
                                <textarea id="contact-body" name="body" rows="4" required placeholder="Describe your target textiles (e.g. 1680D nylon, polycarbonate, rPET), custom branding specifications, or U.S. stock wholesale requirements…" 
                                          class="w-full p-3 bg-[#FAF8F5] border border-[#E5E1D8] text-[#141517] text-base sm:text-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-1 transition-colors"></textarea>
                            </div>

                            <button type="submit" 
                                    id="contact-submit-btn"
                                    class="w-full min-h-[48px] py-4 bg-[#141517] text-[#FAF8F5] text-xs uppercase tracking-wider font-semibold hover:bg-[#FA8231] transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#FA8231] focus-visible:ring-offset-2 flex items-center justify-center gap-2">
                                <svg id="contact-submit-spinner" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span id="contact-submit-label">Transmit Sourcing Inquiry &rarr;</span>
                            </button>

                            <p class="text-[11px] text-[#8A8C93] text-center font-mono">
                                Submissions are routed directly to our New York and factory sourcing directors.
                            </p>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SOURCING FREQUENTLY ASKED QUESTIONS -->
    <section class="py-20 bg-[#FAF8F5]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="text-center space-y-2">
                <span class="text-[10px] font-mono uppercase tracking-widest text-[#FA8231]">Clarity for Buyers</span>
                <h2 class="font-serif text-3xl font-medium text-[#141517]">Frequently Asked Sourcing Questions</h2>
            </div>

            <div class="space-y-4 text-xs text-[#5C5E64]">
                <div class="p-6 bg-white border border-[#E5E1D8] space-y-1.5">
                    <h3 class="font-serif text-lg font-bold text-[#141517]">What is your business model and delivery structure?</h3>
                    <p class="leading-relaxed">
                        Avila Classic operates as the U.S. wholesale distribution affiliate of Victor Bags Factory Ltd. We offer both factory-direct container shipments (FOB Chattogram) and local delivery from U.S. stock (via NY/NJ 3PL warehousing) with lower minimum order quantities, 45-day payment terms for qualified accounts, and faster replenishment.
                    </p>
                </div>

                <div class="p-6 bg-white border border-[#E5E1D8] space-y-1.5">
                    <h3 class="font-serif text-lg font-bold text-[#141517]">What is your prototype and sampling lead time?</h3>
                    <p class="leading-relaxed">
                        With in-house sample development facilities in Bangladesh (24 machines, 28 specialized staff) and Quanzhou, China, physical counter-samples using stock fabrics are constructed in 7 to 10 days. Prototypes can be inspected in person at our Jackson Heights showroom or shipped via express courier directly to your office.
                    </p>
                </div>

                <div class="p-6 bg-white border border-[#E5E1D8] space-y-1.5">
                    <h3 class="font-serif text-lg font-bold text-[#141517]">What compliance and tariff advantages apply to your goods?</h3>
                    <p class="leading-relaxed">
                        Victor Bags holds C-TPAT, BSCI, ISO 14001, and Nirapon certifications, and complies with CPSIA testing for children's goods. Furthermore, goods manufactured in Bangladesh enter the U.S. free from Section 301 punitive tariffs (which add 7.5%–25% to Chinese imports), giving our buyers a significant cost advantage.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('sourcing-inquiry-form');
        const textarea = document.getElementById('contact-body');
        const submitBtn = document.getElementById('contact-submit-btn');
        const spinner = document.getElementById('contact-submit-spinner');

        if (textarea && form) {
            textarea.addEventListener('keydown', (e) => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'Enter') {
                    e.preventDefault();
                    if (form.reportValidity()) {
                        form.requestSubmit();
                    }
                }
            });
        }

        if (form && submitBtn) {
            form.addEventListener('submit', () => {
                submitBtn.disabled = true;
                if (spinner) spinner.classList.remove('hidden');
            });
        }
    });
</script>
@endpush
