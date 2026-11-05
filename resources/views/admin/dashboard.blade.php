@extends('admin.layouts.app')

@section('title', 'Executive Overview')
@section('page_title', 'Dashboard Ledger')

@section('content')
<div class="space-y-6">

    <!-- WELCOME / OVERVIEW BANNER -->
    <div class="bg-atelier-dark text-paper rounded-xl p-6 sm:p-8 border border-atelier-border relative overflow-hidden shadow-sm">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-saddle bg-saddle/15 px-2 py-0.5 rounded border border-saddle/30">
                        Atelier Command
                    </span>
                    <span class="text-xs font-mono text-gray-400">{{ now()->format('l, F j, Y') }}</span>
                </div>
                <h1 class="font-serif text-2xl sm:text-3xl text-white font-medium">
                    Welcome to Avila Classic Operating System, {{ auth()->user()->name }}
                </h1>
                <p class="text-xs sm:text-sm text-gray-300 max-w-2xl font-light">
                    Manage real-time product catalogs, technical blueprints, hero presentations, incoming client inquiries, and core corporate settings.
                </p>
            </div>

            <!-- Quick Action Buttons -->
            <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                <a href="{{ route('admin.products.create') }}" 
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-saddle hover:bg-saddle-hover text-white rounded text-xs font-mono font-medium transition-colors shadow-xs focus-visible:ring-2 focus-visible:ring-saddle">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Add Product</span>
                </a>
                <a href="{{ route('admin.hero-slides.create') }}" 
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white rounded text-xs font-mono font-medium transition-colors focus-visible:ring-2 focus-visible:ring-saddle">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14" />
                    </svg>
                    <span>New Hero Slide</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" 
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-white/5 hover:bg-white/15 text-gray-300 hover:text-white rounded text-xs font-mono font-medium transition-colors border border-white/10 focus-visible:ring-2 focus-visible:ring-saddle">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35" />
                    </svg>
                    <span>Settings</span>
                </a>
            </div>
        </div>
        
        <!-- Subtle background watermark -->
        <div class="absolute -right-8 -bottom-10 opacity-5 pointer-events-none select-none font-serif text-9xl text-white">
            AVILA
        </div>
    </div>

    <!-- STATS LEDGER GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Metric 1: Products -->
        <a href="{{ route('admin.products.index') }}" 
           class="bg-white p-5 rounded-xl border border-paper-border hover:border-saddle/50 hover:shadow-md transition-all group focus-visible:ring-2 focus-visible:ring-saddle">
            <div class="flex items-center justify-between text-ink-muted mb-3">
                <span class="text-xs font-mono uppercase tracking-wider">Catalog Inventory</span>
                <div class="w-8 h-8 rounded-lg bg-paper-muted flex items-center justify-center text-ink group-hover:text-saddle transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-bold font-serif text-ink tracking-tight">{{ $stats['total_products'] }}</div>
                <span class="text-[11px] font-mono text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                    {{ $stats['featured_products'] }} featured
                </span>
            </div>
            <p class="text-[11px] text-ink-subtle mt-2">Active SKUs available in online lookbook</p>
        </a>

        <!-- Metric 2: Inquiries -->
        <a href="{{ route('admin.inquiries.index') }}" 
           class="bg-white p-5 rounded-xl border border-paper-border hover:border-saddle/50 hover:shadow-md transition-all group focus-visible:ring-2 focus-visible:ring-saddle">
            <div class="flex items-center justify-between text-ink-muted mb-3">
                <span class="text-xs font-mono uppercase tracking-wider">B2B Inquiries</span>
                <div class="w-8 h-8 rounded-lg bg-paper-muted flex items-center justify-center text-ink group-hover:text-saddle transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-bold font-serif text-ink tracking-tight">{{ $stats['total_inquiries'] }}</div>
                @if($stats['new_inquiries'] > 0)
                    <span class="text-[11px] font-mono text-red-700 bg-red-50 px-2 py-0.5 rounded-full border border-red-200 font-semibold animate-pulse">
                        {{ $stats['new_inquiries'] }} unread
                    </span>
                @else
                    <span class="text-[11px] font-mono text-gray-500 bg-gray-50 px-2 py-0.5 rounded">All answered</span>
                @endif
            </div>
            <p class="text-[11px] text-ink-subtle mt-2">Corporate volume and private label leads</p>
        </a>

        <!-- Metric 3: Hero Slides -->
        <a href="{{ route('admin.hero-slides.index') }}" 
           class="bg-white p-5 rounded-xl border border-paper-border hover:border-saddle/50 hover:shadow-md transition-all group focus-visible:ring-2 focus-visible:ring-saddle">
            <div class="flex items-center justify-between text-ink-muted mb-3">
                <span class="text-xs font-mono uppercase tracking-wider">Hero Showcases</span>
                <div class="w-8 h-8 rounded-lg bg-paper-muted flex items-center justify-center text-ink group-hover:text-saddle transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-bold font-serif text-ink tracking-tight">{{ $stats['total_slides'] }}</div>
                <span class="text-[11px] font-mono text-saddle bg-saddle/10 px-2 py-0.5 rounded">
                    Active Rotation
                </span>
            </div>
            <p class="text-[11px] text-ink-subtle mt-2">Full-bleed homepage showcase carousels</p>
        </a>

        <!-- Metric 4: Media Assets -->
        <a href="{{ route('admin.media.index') }}" 
           class="bg-white p-5 rounded-xl border border-paper-border hover:border-saddle/50 hover:shadow-md transition-all group focus-visible:ring-2 focus-visible:ring-saddle">
            <div class="flex items-center justify-between text-ink-muted mb-3">
                <span class="text-xs font-mono uppercase tracking-wider">Media Assets</span>
                <div class="w-8 h-8 rounded-lg bg-paper-muted flex items-center justify-center text-ink group-hover:text-saddle transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <div class="text-3xl font-bold font-serif text-ink tracking-tight">{{ $stats['total_media'] }}</div>
                <span class="text-[11px] font-mono text-gray-600 bg-gray-100 px-2 py-0.5 rounded">
                    Storage Disk
                </span>
            </div>
            <p class="text-[11px] text-ink-subtle mt-2">Uploaded imagery, photography & files</p>
        </a>

    </div>

    <!-- MAIN TWO-COLUMN SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left: Recent Inquiries (2 cols) -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-paper-border overflow-hidden shadow-xs">
            <div class="px-5 py-4 border-b border-paper-border flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <h2 class="font-serif text-lg font-medium text-ink">Recent Client Inquiries</h2>
                    @if($stats['new_inquiries'] > 0)
                        <span class="text-[10px] font-mono font-bold bg-red-100 text-red-800 px-2 py-0.5 rounded-full">
                            {{ $stats['new_inquiries'] }} pending
                        </span>
                    @endif
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-mono text-saddle hover:underline">
                    View Ledger &rarr;
                </a>
            </div>

            @if($recentInquiries->count() > 0)
                <div class="divide-y divide-paper-border overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-paper-muted text-[10px] font-mono uppercase tracking-wider text-ink-muted">
                                <th class="px-5 py-2.5">Client & Organization</th>
                                <th class="px-5 py-2.5">Category</th>
                                <th class="px-5 py-2.5">Status</th>
                                <th class="px-5 py-2.5">Timestamp</th>
                                <th class="px-5 py-2.5 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-paper-border text-xs">
                            @foreach($recentInquiries as $inquiry)
                                <tr class="hover:bg-paper-muted/50 transition-colors">
                                    <td class="px-5 py-3">
                                        <div class="font-medium text-ink">{{ $inquiry->name }}</div>
                                        <div class="text-[11px] text-ink-subtle">{{ $inquiry->company ?: $inquiry->email }}</div>
                                    </td>
                                    <td class="px-5 py-3 text-ink-muted">
                                        {{ $inquiry->category ?: 'General' }}
                                    </td>
                                    <td class="px-5 py-3">
                                        @if($inquiry->status === 'new')
                                            <span class="inline-flex items-center gap-1 text-[10px] font-mono font-semibold px-2 py-0.5 rounded-full bg-red-50 text-red-700 border border-red-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> New
                                            </span>
                                        @elseif($inquiry->status === 'contacted')
                                            <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                                Contacted
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">
                                                Archived
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-3 text-[11px] font-mono text-ink-subtle whitespace-nowrap">
                                        {{ $inquiry->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-5 py-3 text-right">
                                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                           class="inline-block px-2.5 py-1 text-xs font-mono font-medium rounded bg-paper-muted hover:bg-ink hover:text-white transition-colors">
                                            Inspect
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-8 text-center text-ink-muted">
                    <p class="text-xs">No client dispatches have been recorded yet.</p>
                </div>
            @endif
        </div>

        <!-- Right: Recent Products & System Ledger (1 col) -->
        <div class="space-y-6">
            
            <!-- Products Panel -->
            <div class="bg-white rounded-xl border border-paper-border overflow-hidden shadow-xs">
                <div class="px-5 py-4 border-b border-paper-border flex items-center justify-between">
                    <h2 class="font-serif text-lg font-medium text-ink">Catalog Blueprint</h2>
                    <a href="{{ route('admin.products.index') }}" class="text-xs font-mono text-saddle hover:underline">
                        View All ({{ $stats['total_products'] }}) &rarr;
                    </a>
                </div>

                <div class="divide-y divide-paper-border">
                    @foreach($recentProducts as $prod)
                        <div class="p-4 flex items-center gap-3.5 hover:bg-paper-muted/50 transition-colors">
                            <img src="{{ $prod->primary_image ?: '/images/placeholder.jpg' }}" 
                                 alt="{{ $prod->title }}" 
                                 class="w-12 h-12 object-cover rounded border border-paper-border bg-paper-muted shrink-0">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xs font-semibold text-ink truncate">{{ $prod->title }}</h3>
                                <div class="flex items-center gap-2 mt-0.5">
                                    <span class="text-[10px] font-mono text-saddle bg-saddle/10 px-1.5 py-0.2 rounded">{{ $prod->sku }}</span>
                                    <span class="text-[10px] text-ink-subtle capitalize">{{ $prod->category }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.products.edit', $prod) }}" 
                               class="p-1.5 text-ink-muted hover:text-ink hover:bg-paper-muted rounded transition-colors"
                               title="Edit Product">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Atelier Technical Stack Card -->
            <div class="bg-atelier-dark text-paper rounded-xl border border-atelier-border p-5 space-y-3">
                <div class="flex items-center justify-between pb-2 border-b border-white/10">
                    <span class="text-[10px] font-mono uppercase tracking-[0.2em] text-saddle">Infrastructure Health</span>
                    <span class="text-[10px] font-mono text-emerald-400">ONLINE</span>
                </div>
                <div class="space-y-2 text-xs font-mono">
                    <div class="flex justify-between text-gray-300">
                        <span class="text-gray-400">Database Engine:</span>
                        <span>SQLite (WAL Mode)</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span class="text-gray-400">PHP Environment:</span>
                        <span>PHP {{ PHP_VERSION }}</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span class="text-gray-400">Design System:</span>
                        <span>Tailwind CSS v4 Atelier</span>
                    </div>
                    <div class="flex justify-between text-gray-300">
                        <span class="text-gray-400">Settings In-Memory:</span>
                        <span class="text-saddle">{{ \App\Models\Setting::count() }} cached keys</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

