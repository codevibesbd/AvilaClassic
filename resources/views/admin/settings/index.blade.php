@extends('admin.layouts.app')

@section('title', 'Global Atelier Settings')
@section('page_title', 'Site Settings')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Global Atelier Settings</h1>
            <p class="text-xs text-ink-muted mt-0.5">Configure corporate identity, contact points, announcements, SEO metadata, and custom scripts.</p>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="flex items-center gap-1.5 border-b border-paper-border pb-1 overflow-x-auto text-xs font-mono">
        <a href="{{ route('admin.settings.index', ['tab' => 'general']) }}" 
           class="px-4 py-2 border-b-2 rounded-t transition-colors whitespace-nowrap {{ $activeTab === 'general' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink' }}">
            General & Branding
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'contact']) }}" 
           class="px-4 py-2 border-b-2 rounded-t transition-colors whitespace-nowrap {{ $activeTab === 'contact' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink' }}">
            Contact & Showroom
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'header']) }}" 
           class="px-4 py-2 border-b-2 rounded-t transition-colors whitespace-nowrap {{ $activeTab === 'header' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink' }}">
            Header & Announcements
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'footer']) }}" 
           class="px-4 py-2 border-b-2 rounded-t transition-colors whitespace-nowrap {{ $activeTab === 'footer' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink' }}">
            Footer & Legal
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'seo']) }}" 
           class="px-4 py-2 border-b-2 rounded-t transition-colors whitespace-nowrap {{ $activeTab === 'seo' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink' }}">
            SEO & Discovery
        </a>
        <a href="{{ route('admin.settings.index', ['tab' => 'code']) }}" 
           class="px-4 py-2 border-b-2 rounded-t transition-colors whitespace-nowrap {{ $activeTab === 'code' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink' }}">
            Custom Scripts & CSS
        </a>
    </div>

    <!-- SETTINGS FORM -->
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <input type="hidden" name="group" value="{{ $activeTab }}">

        <!-- TAB: GENERAL -->
        @if($activeTab === 'general')
            <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
                <div class="border-b border-paper-border pb-3">
                    <h2 class="font-serif text-lg font-medium text-ink">General Branding & Identity</h2>
                    <p class="text-xs text-ink-muted">Manage global brand name, corporate tagline, and visual emblems.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Brand Name *</label>
                        <input type="text" name="settings[site_name]" value="{{ setting('site_name', 'Avila Classic') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Legal Name *</label>
                        <input type="text" name="settings[corporate_legal_name]" value="{{ setting('corporate_legal_name', 'Avila Classic Trading Inc.') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Brand Tagline</label>
                        <input type="text" name="settings[site_tagline]" value="{{ setting('site_tagline', 'U.S. Wholesale Luggage & Backpack Distributor') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                    </div>

                    <div class="sm:col-span-2 space-y-2 pt-2 border-t border-paper-border">
                        <label class="block text-xs font-mono uppercase text-ink-muted">Brand Logo</label>
                        <div class="flex items-center gap-4">
                            @if(setting('site_logo'))
                                <img src="{{ setting('site_logo') }}" alt="Site Logo" class="h-10 object-contain p-1 border rounded bg-paper-muted">
                            @endif
                            <input type="file" name="site_logo_file" accept="image/*" class="text-xs text-ink file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:bg-paper-muted file:text-ink">
                        </div>
                        <input type="text" name="settings[site_logo]" value="{{ setting('site_logo') }}" placeholder="Or direct URL /images/logo.svg"
                               class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink mt-1">
                    </div>

                    <div class="sm:col-span-2 space-y-2 pt-2 border-t border-paper-border">
                        <label class="block text-xs font-mono uppercase text-ink-muted">Favicon File</label>
                        <div class="flex items-center gap-4">
                            @if(setting('site_favicon'))
                                <img src="{{ setting('site_favicon') }}" alt="Favicon" class="w-6 h-6 object-contain">
                            @endif
                            <input type="file" name="site_favicon_file" accept="image/*" class="text-xs text-ink file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:bg-paper-muted file:text-ink">
                        </div>
                        <input type="text" name="settings[site_favicon]" value="{{ setting('site_favicon') }}" placeholder="Or direct URL /favicon.ico"
                               class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink mt-1">
                    </div>
                </div>
            </div>
        @endif

        <!-- TAB: CONTACT -->
        @if($activeTab === 'contact')
            <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
                <div class="border-b border-paper-border pb-3">
                    <h2 class="font-serif text-lg font-medium text-ink">Contact Points & Showroom Locations</h2>
                    <p class="text-xs text-ink-muted">Direct telephone lines, corporate emails, Jackson Heights showroom address, and facility identifiers.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Phone</label>
                        <input type="text" name="settings[contact_phone]" value="{{ setting('contact_phone', '(718) 779-1140') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Secondary / Toll-Free Phone</label>
                        <input type="text" name="settings[contact_phone_toll_free]" value="{{ setting('contact_phone_toll_free', '(800) 555-AVILA') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Email *</label>
                        <input type="email" name="settings[contact_email]" value="{{ setting('contact_email', 'info@avilaclassic.com') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Wholesale & Quotes Email *</label>
                        <input type="email" name="settings[inquiry_email]" value="{{ setting('inquiry_email', 'wholesale@avilaclassic.com') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">New York Showroom Address</label>
                        <input type="text" name="settings[showroom_address]" value="{{ setting('showroom_address', '73-05 37th Road, Jackson Heights, NY 11372') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Bangladesh Production Facility</label>
                        <input type="text" name="settings[facility_address]" value="{{ setting('facility_address', 'Victor Bags Factory Ltd., Plot 14-16, Sector 2, Export Processing Zone, Dhaka, Bangladesh') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Corporate Tax ID / EIN</label>
                        <input type="text" name="settings[corporate_tax_id]" value="{{ setting('corporate_tax_id', '38-4379519') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Operational Hours</label>
                        <input type="text" name="settings[operating_hours]" value="{{ setting('operating_hours', 'Monday–Friday: 9:00 AM – 6:00 PM EST') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>
                </div>
            </div>
        @endif

        <!-- TAB: HEADER -->
        @if($activeTab === 'header')
            <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
                <div class="border-b border-paper-border pb-3">
                    <h2 class="font-serif text-lg font-medium text-ink">Header Navigation & Announcement Bar</h2>
                    <p class="text-xs text-ink-muted">Top announcement bar text, visibility toggle, and header CTA button.</p>
                </div>

                <div class="space-y-4">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="settings[announcement_enabled]" value="1" {{ setting('announcement_enabled', '1') == '1' ? 'checked' : '' }}
                               class="w-4 h-4 rounded text-saddle focus:ring-saddle">
                        <div>
                            <span class="text-xs font-semibold text-ink block">Enable Top Announcement Bar</span>
                            <span class="text-[11px] text-ink-subtle">Displays a slim banner above the primary header</span>
                        </div>
                    </label>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Announcement Bar Message</label>
                        <input type="text" name="settings[announcement_text]" value="{{ setting('announcement_text', 'FACTORY-DIRECT WHOLESALE DISPATCH • U.S. WAREHOUSE INVENTORY AVAILABLE') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Announcement Target Link (Optional)</label>
                        <input type="text" name="settings[announcement_link]" value="{{ setting('announcement_link', '/contact') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-3 border-t border-paper-border">
                        <div>
                            <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Header Primary Action Label</label>
                            <input type="text" name="settings[header_cta_label]" value="{{ setting('header_cta_label', 'Direct Wholesale Quote') }}"
                                   class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                        </div>
                        <div>
                            <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Header Primary Action URL</label>
                            <input type="text" name="settings[header_cta_url]" value="{{ setting('header_cta_url', '/contact') }}"
                                   class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- TAB: FOOTER -->
        @if($activeTab === 'footer')
            <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
                <div class="border-b border-paper-border pb-3">
                    <h2 class="font-serif text-lg font-medium text-ink">Footer & Legal Governance</h2>
                    <p class="text-xs text-ink-muted">Copyright notice, footer description, and social media channels.</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Footer Corporate Mission / Description</label>
                        <textarea name="settings[footer_description]" rows="3"
                                  class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">{{ setting('footer_description', 'Official U.S. wholesale distributor for Victor Bags Factory Ltd. Operating high-volume manufacturing facilities in Bangladesh with local showroom and bonded stock in New York.') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Copyright Line</label>
                        <input type="text" name="settings[footer_copyright]" value="{{ setting('footer_copyright', '© 2026 Avila Classic Trading Inc. All rights reserved. Victor Bags Factory Ltd. U.S. Affiliate.') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-3 border-t border-paper-border">
                        <div>
                            <label class="block text-xs font-mono uppercase text-ink-muted mb-1">LinkedIn Profile URL</label>
                            <input type="text" name="settings[social_linkedin]" value="{{ setting('social_linkedin', 'https://linkedin.com/company/avila-classic') }}"
                                   class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                        </div>

                        <div>
                            <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Instagram URL</label>
                            <input type="text" name="settings[social_instagram]" value="{{ setting('social_instagram', 'https://instagram.com/avilaclassic') }}"
                                   class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- TAB: SEO -->
        @if($activeTab === 'seo')
            <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
                <div class="border-b border-paper-border pb-3">
                    <h2 class="font-serif text-lg font-medium text-ink">Search Engine Optimization & Indexing</h2>
                    <p class="text-xs text-ink-muted">Global default titles, descriptions, OpenGraph share assets, and analytics IDs.</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Default Site Title Template (&lt;title&gt;)</label>
                        <input type="text" name="settings[default_meta_title]" value="{{ setting('default_meta_title', 'Avila Classic | U.S. Wholesale Luggage & Backpack Distributor') }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Default Meta Description</label>
                        <textarea name="settings[default_meta_description]" rows="3"
                                  class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">{{ setting('default_meta_description', 'Avila Classic Trading Inc. is the official U.S. wholesale distributor of Victor Bags Factory Ltd. Factory-direct luggage, backpacks, and private-label travel gear.') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Google Analytics Measurement ID (GA4)</label>
                            <input type="text" name="settings[google_analytics_id]" value="{{ setting('google_analytics_id') }}" placeholder="G-XXXXXXXXXX"
                                   class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                        </div>

                        <div>
                            <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Google Site Verification Token</label>
                            <input type="text" name="settings[google_site_verification]" value="{{ setting('google_site_verification') }}" placeholder="google-site-verification=..."
                                   class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- TAB: CODE & SCRIPTS -->
        @if($activeTab === 'code')
            <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-5">
                <div class="border-b border-paper-border pb-3">
                    <h2 class="font-serif text-lg font-medium text-ink">Custom Code Injection & Stylesheets</h2>
                    <p class="text-xs text-ink-muted">Embed tracking tags, live chat widgets, or custom CSS rules into public templates.</p>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Header Scripts (&lt;head&gt;)</label>
                        <textarea name="settings[custom_head_scripts]" rows="4" placeholder="<!-- Place tracking tags, GTM, or meta verifications here -->"
                                  class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">{{ setting('custom_head_scripts') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Footer Scripts (Before &lt;/body&gt;)</label>
                        <textarea name="settings[custom_footer_scripts]" rows="4" placeholder="<!-- Place chat widgets, analytics beacons, or scripts here -->"
                                  class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">{{ setting('custom_footer_scripts') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Custom CSS Overrides (&lt;style&gt;)</label>
                        <textarea name="settings[custom_css]" rows="4" placeholder="/* Custom CSS rules applied to public pages */"
                                  class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">{{ setting('custom_css') }}</textarea>
                    </div>
                </div>
            </div>
        @endif

        <!-- Submit Button -->
        <div class="flex items-center justify-end pt-4 border-t border-paper-border">
            <button type="submit" 
                    class="px-6 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                Commit & Cache Settings
            </button>
        </div>
    </form>

</div>
@endsection

