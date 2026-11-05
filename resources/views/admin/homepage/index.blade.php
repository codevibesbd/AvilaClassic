@extends('admin.layouts.app')

@section('title', 'Homepage Content Sections')
@section('page_title', 'Homepage Sections')

@section('content')
<div class="max-w-5xl mx-auto space-y-8" 
     x-data="{ activeSection: 'hero' }">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Homepage Editorial Sections</h1>
            <p class="text-xs text-ink-muted mt-0.5">Control headings, copy, operational ledger stats, material specifications, and quality gates displayed on the public landing page.</p>
        </div>

        <a href="{{ route('home') }}" target="_blank" 
           class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-white border border-paper-border hover:border-ink text-ink text-xs font-mono rounded shadow-xs transition-colors shrink-0">
            <span>View Homepage Live</span>
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
        </a>
    </div>

    <!-- Section Navigation Tabs -->
    <div class="flex items-center gap-2 border-b border-paper-border pb-1 overflow-x-auto scrollbar-none text-xs font-mono">
        <button type="button" @click="activeSection = 'hero'" 
                :class="activeSection === 'hero' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink'"
                class="px-4 py-2 border-b-2 rounded-t transition-colors cursor-pointer whitespace-nowrap">
            1. Hero Intro & CTAs
        </button>
        <button type="button" @click="activeSection = 'ledger'" 
                :class="activeSection === 'ledger' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink'"
                class="px-4 py-2 border-b-2 rounded-t transition-colors cursor-pointer whitespace-nowrap">
            2. Operational Ledger
        </button>
        <button type="button" @click="activeSection = 'materials'" 
                :class="activeSection === 'materials' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink'"
                class="px-4 py-2 border-b-2 rounded-t transition-colors cursor-pointer whitespace-nowrap">
            3. Materials Archive
        </button>
        <button type="button" @click="activeSection = 'quality'" 
                :class="activeSection === 'quality' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink'"
                class="px-4 py-2 border-b-2 rounded-t transition-colors cursor-pointer whitespace-nowrap">
            4. Quality Testing Gates
        </button>
        <button type="button" @click="activeSection = 'steps'" 
                :class="activeSection === 'steps' ? 'border-saddle text-saddle font-bold bg-white' : 'border-transparent text-ink-muted hover:text-ink'"
                class="px-4 py-2 border-b-2 rounded-t transition-colors cursor-pointer whitespace-nowrap">
            5. Sourcing Protocol
        </button>
    </div>

    <!-- SECTION 1: HERO INTRO & CTAs -->
    <div x-show="activeSection === 'hero'" class="space-y-6" x-cloak>
        <form action="{{ route('admin.homepage.update', 'hero') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-6">
            @csrf
            @method('PUT')

            <div class="border-b border-paper-border pb-4">
                <h2 class="font-serif text-lg text-ink font-medium">Hero Narrative & Action Triggers</h2>
                <p class="text-xs text-ink-muted">Manage the prominent typography and primary call-to-action buttons anchored on the homepage hero.</p>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Pill Badge Text
                    </label>
                    <input type="text" name="hero_badge" value="{{ setting('hero_badge', 'EST. 1994 • NEW YORK SHOWROOM & BANGLADESH FACILITY') }}" required
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">
                            Primary Headline (Start)
                        </label>
                        <input type="text" name="hero_headline" value="{{ setting('hero_headline', 'Precision Luggage & Technical Bags.') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">
                            Highlighted Headline Phrase
                        </label>
                        <input type="text" name="hero_headline_highlight" value="{{ setting('hero_headline_highlight', 'Direct From Our Factory Floor.') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif text-saddle">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Hero Explanatory Paragraph
                    </label>
                    <textarea name="hero_copy" rows="3" required
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">{{ setting('hero_copy', 'Avila Classic Trading Inc. is the official U.S. distribution affiliate of Victor Bags Factory Ltd. Over 1,100 craftsmen producing private-label, C-TPAT & BSCI certified travel goods for global brands.') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-paper-border">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Primary CTA Button Label</label>
                        <input type="text" name="hero_cta_primary_label" value="{{ setting('hero_cta_primary_label', 'Explore Catalog') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                        <label class="block text-xs font-mono uppercase text-ink-muted mt-2 mb-1">Primary CTA Target URL</label>
                        <input type="text" name="hero_cta_primary_url" value="{{ setting('hero_cta_primary_url', '/products') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                    </div>

                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Secondary CTA Button Label</label>
                        <input type="text" name="hero_cta_secondary_label" value="{{ setting('hero_cta_secondary_label', 'Direct Sourcing') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                        <label class="block text-xs font-mono uppercase text-ink-muted mt-2 mb-1">Secondary CTA Target URL</label>
                        <input type="text" name="hero_cta_secondary_url" value="{{ setting('hero_cta_secondary_url', '/contact') }}" required
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-paper-border">
                <button type="submit" class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Save Hero Narrative
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION 2: OPERATIONAL LEDGER (STATS) -->
    <div x-show="activeSection === 'ledger'" class="space-y-6" x-cloak>
        <form action="{{ route('admin.homepage.update', 'ledger') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-6">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between border-b border-paper-border pb-4">
                <div>
                    <h2 class="font-serif text-lg text-ink font-medium">Operational Ledger Statistics</h2>
                    <p class="text-xs text-ink-muted">The four quantitative metrics proving production volume, defect thresholds, and artisan capacity.</p>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_enabled" value="1" {{ ($ledger->is_enabled ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <span class="text-xs font-mono uppercase text-ink">Section Enabled</span>
                </label>
            </div>

            @php 
                $ledgerItems = $ledger->content ?? [
                    ['label' => 'Monthly Production', 'value' => '200,000+', 'unit' => 'Units', 'description' => 'Factory capacity across Bangladesh production lines.'],
                    ['label' => 'Total Workforce', 'value' => '1,100+', 'unit' => 'Artisans', 'description' => 'Skilled pattern cutters, seamsters, and QC inspectors.'],
                    ['label' => 'Facility Footprint', 'value' => '120,000', 'unit' => 'Sq Ft', 'description' => 'Dedicated manufacturing and bonded warehouse space.'],
                    ['label' => 'U.S. Showroom Stock', 'value' => '100%', 'unit' => 'Direct', 'description' => 'Sample-ready inventory available at our NY location.'],
                ];
            @endphp

            <div class="space-y-4">
                @foreach($ledgerItems as $idx => $item)
                    <div class="p-4 bg-paper-muted rounded-lg border border-paper-border space-y-3">
                        <div class="text-xs font-mono font-semibold text-saddle">Metric #{{ $idx + 1 }}</div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Label</label>
                                <input type="text" name="label[]" value="{{ $item['label'] ?? '' }}" required
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs text-ink">
                            </div>
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Value (e.g. 200,000+)</label>
                                <input type="text" name="value[]" value="{{ $item['value'] ?? '' }}" required
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-serif font-bold text-ink">
                            </div>
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Unit / Qualifier</label>
                                <input type="text" name="unit[]" value="{{ $item['unit'] ?? '' }}"
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-mono text-ink">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Subtext / Description</label>
                            <input type="text" name="description[]" value="{{ $item['description'] ?? '' }}"
                                   class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs text-ink">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end pt-4 border-t border-paper-border">
                <button type="submit" class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Save Operational Ledger
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION 3: MATERIALS ARCHIVE -->
    <div x-show="activeSection === 'materials'" class="space-y-6" x-cloak>
        <form action="{{ route('admin.homepage.update', 'materials') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-6">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between border-b border-paper-border pb-4">
                <div>
                    <h2 class="font-serif text-lg text-ink font-medium">Materials & Component Specifications</h2>
                    <p class="text-xs text-ink-muted">The core industrial materials, certifications, and weaves featured in the material standards showcase.</p>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_enabled" value="1" {{ ($materials->is_enabled ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <span class="text-xs font-mono uppercase text-ink">Section Enabled</span>
                </label>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Heading</label>
                    <input type="text" name="title" value="{{ $materials->title ?? 'The Materials We Trust' }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Subtitle</label>
                    <input type="text" name="subtitle" value="{{ $materials->subtitle ?? 'Textile & Component Standards' }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                </div>
            </div>

            @php
                $materialItems = $materials->content ?? [
                    ['tag' => 'BALLISTIC SHELL', 'source' => 'INVISTA CORDURA', 'name' => '1000D Invista Cordura® Nylon', 'description' => 'Original high-tenacity nylon yarn with exceptional resistance to tears, scuffs, and abrasions. Treated with dual-pass fluorocarbon-free DWR.', 'metric' => '250+ lb tear strength'],
                    ['tag' => 'ORGANIC VEG-TAN', 'source' => 'SANTA CROCE SULL\'ARNO', 'name' => 'Italian Full-Grain Leather', 'description' => 'Slow-tanned in oak barrels with mimosa and chestnut extracts. Develops rich natural patina without synthetic plastic topcoats.', 'metric' => 'Grade A selection'],
                    ['tag' => 'WEATHERPROOF WEAVE', 'source' => 'RECYCLED PET', 'name' => '450D Recycled Ripstop Cordura®', 'description' => '100% post-consumer recycled polyester canvas backed with 0.15mm thermoplastic polyurethane waterproof membrane.', 'metric' => '10,000mm hydrostatic head'],
                    ['tag' => 'STRUCTURAL HARDWARE', 'source' => 'YKK OSAKA', 'name' => 'YKK® RC Zippers & Aircraft Alloy', 'description' => 'Custom coil zippers with reversed tape to lock out grit and moisture, coupled with 7075-T6 aluminum hardware.', 'metric' => '20,000+ cycle fatigue life'],
                ];
            @endphp

            <div class="space-y-4">
                @foreach($materialItems as $idx => $m)
                    <div class="p-4 bg-paper-muted rounded-lg border border-paper-border space-y-3">
                        <div class="text-xs font-mono font-semibold text-saddle">Material Specimen #{{ $idx + 1 }}</div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Tag / Category</label>
                                <input type="text" name="tag[]" value="{{ $m['tag'] ?? '' }}"
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-mono text-ink">
                            </div>
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Source / Mill</label>
                                <input type="text" name="source[]" value="{{ $m['source'] ?? '' }}"
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-mono text-ink">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Material Name *</label>
                                <input type="text" name="name[]" value="{{ $m['name'] ?? '' }}" required
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-semibold text-ink">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Technical Description</label>
                                <textarea name="description[]" rows="2"
                                          class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs text-ink">{{ $m['description'] ?? '' }}</textarea>
                            </div>
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Performance Metric</label>
                                <input type="text" name="metric[]" value="{{ $m['metric'] ?? '' }}"
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-mono text-ink">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end pt-4 border-t border-paper-border">
                <button type="submit" class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Save Materials Archive
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION 4: QUALITY GATES -->
    <div x-show="activeSection === 'quality'" class="space-y-6" x-cloak>
        <form action="{{ route('admin.homepage.update', 'quality') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-6">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between border-b border-paper-border pb-4">
                <div>
                    <h2 class="font-serif text-lg text-ink font-medium">Quality Testing Gates</h2>
                    <p class="text-xs text-ink-muted">Laboratory and factory floor quality assurance benchmarks.</p>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_enabled" value="1" {{ ($quality->is_enabled ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <span class="text-xs font-mono uppercase text-ink">Section Enabled</span>
                </label>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Heading</label>
                    <input type="text" name="heading" value="{{ $quality->title ?? 'Built by hand. Audited by machines.' }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Subtitle</label>
                    <input type="text" name="subtitle" value="{{ $quality->subtitle ?? 'Factory Floor Standards' }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Intro Narrative</label>
                    <textarea name="narrative" rows="2"
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">{{ $quality->description ?? 'Every production run undergoes four mandatory stress evaluations in our Dhaka facility before clearance for export to the United States.' }}</textarea>
                </div>
            </div>

            @php
                $qualityItems = $quality->content ?? [
                    ['code' => 'GATE 01', 'title' => 'Tensile Seam Stress Testing', 'description' => 'Load-bearing seam joints must withstand a minimum of 45 kg continuous pull tension without thread rupture or elongation.'],
                    ['code' => 'GATE 02', 'title' => 'Hydrostatic Pressure Resistance', 'description' => 'Fabrics and waterproof zipper welds are exposed to 10,000 mm water column pressure to ensure zero infiltration.'],
                    ['code' => 'GATE 03', 'title' => 'Martindale Abrasion Endurance', 'description' => 'Outer canvas specimens endure 20,000 friction cycles under 12 kPa load with no surface pilling or fiber thinning.'],
                    ['code' => 'GATE 04', 'title' => 'Hardware Fatigue Cycles', 'description' => 'All buckles, zipper sliders, and carabiner clips are machine-cycled 5,000 times under load to ensure zero retention loss.'],
                ];
            @endphp

            <div class="space-y-4">
                @foreach($qualityItems as $idx => $q)
                    <div class="p-4 bg-paper-muted rounded-lg border border-paper-border space-y-3">
                        <div class="text-xs font-mono font-semibold text-saddle">Gate #{{ $idx + 1 }}</div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Gate Code</label>
                                <input type="text" name="code[]" value="{{ $q['code'] ?? '' }}"
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-mono text-ink">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Gate Title *</label>
                                <input type="text" name="title[]" value="{{ $q['title'] ?? '' }}" required
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-semibold text-ink">
                            </div>
                            <div class="sm:col-span-3">
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Gate Protocol & Description</label>
                                <textarea name="description[]" rows="2"
                                          class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs text-ink">{{ $q['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end pt-4 border-t border-paper-border">
                <button type="submit" class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Save Quality Gates
                </button>
            </div>
        </form>
    </div>

    <!-- SECTION 5: SOURCING STEPS -->
    <div x-show="activeSection === 'steps'" class="space-y-6" x-cloak>
        <form action="{{ route('admin.homepage.update', 'steps') }}" method="POST" class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-6">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-between border-b border-paper-border pb-4">
                <div>
                    <h2 class="font-serif text-lg text-ink font-medium">Direct Sourcing Protocol</h2>
                    <p class="text-xs text-ink-muted">Step-by-step procurement methodology for enterprise buyers and private-label programs.</p>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_enabled" value="1" {{ ($steps->is_enabled ?? true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <span class="text-xs font-mono uppercase text-ink">Section Enabled</span>
                </label>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Heading</label>
                    <input type="text" name="heading" value="{{ $steps->title ?? 'From Technical Sketch to U.S. Stock Delivery' }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Section Subtitle</label>
                    <input type="text" name="subtitle" value="{{ $steps->subtitle ?? 'Direct Sourcing & Wholesale Protocol' }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink">
                </div>
            </div>

            @php
                $stepItems = $steps->content ?? [
                    ['step' => 'STAGE 01', 'title' => 'Technical Blueprint & Sampling', 'description' => 'Submit tech packs or choose from Avila Classic core silhouettes. Physical pre-production prototypes crafted in 7 business days.'],
                    ['step' => 'STAGE 02', 'title' => 'Certified Ethical Production', 'description' => 'Manufactured in our audited Dhaka facility under fair labor, zero child labor, and comprehensive environmental management standards.'],
                    ['step' => 'STAGE 03', 'title' => 'Bonded U.S. Stock Dispatch', 'description' => 'Stocked in New York for immediate domestic freight delivery, or shipped direct-to-port for enterprise container volume.'],
                ];
            @endphp

            <div class="space-y-4">
                @foreach($stepItems as $idx => $s)
                    <div class="p-4 bg-paper-muted rounded-lg border border-paper-border space-y-3">
                        <div class="text-xs font-mono font-semibold text-saddle">Stage #{{ $idx + 1 }}</div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Step Number</label>
                                <input type="text" name="step[]" value="{{ $s['step'] ?? '' }}"
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-mono text-ink">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Step Title *</label>
                                <input type="text" name="title[]" value="{{ $s['title'] ?? '' }}" required
                                       class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs font-semibold text-ink">
                            </div>
                            <div class="sm:col-span-3">
                                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Step Description</label>
                                <textarea name="description[]" rows="2"
                                          class="w-full px-3 py-1.5 bg-white border border-paper-border rounded text-xs text-ink">{{ $s['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-end pt-4 border-t border-paper-border">
                <button type="submit" class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Save Sourcing Protocol
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

