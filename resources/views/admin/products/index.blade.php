@extends('admin.layouts.app')

@section('title', 'Product Catalog')
@section('page_title', 'Products')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Product Catalog</h1>
            <p class="text-xs text-ink-muted mt-0.5">Manage industrial specifications, materials, photography, and lookbook listings.</p>
        </div>

        <a href="{{ route('admin.products.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-saddle hover:bg-saddle-hover text-white rounded-md text-xs font-mono font-semibold uppercase tracking-wider transition-colors shadow-xs shrink-0 focus-visible:ring-2 focus-visible:ring-saddle">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Create Product</span>
        </a>
    </div>

    <!-- Filter & Search Controls Card -->
    <div class="bg-white p-4 rounded-xl border border-paper-border shadow-xs">
        <form method="GET" action="{{ route('admin.products.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Search -->
            <div class="sm:col-span-5 relative">
                <input type="text" 
                       name="search" 
                       value="{{ $search }}" 
                       placeholder="Search by SKU, title, materials…"
                       class="w-full pl-9 pr-3 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink placeholder-ink-subtle focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle">
                <svg class="w-4 h-4 text-ink-subtle absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Category Filter -->
            <div class="sm:col-span-3">
                <select name="category" 
                        class="w-full px-3 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                    <option value="">All Categories</option>
                    @foreach($categories as $catKey => $catName)
                        <option value="{{ $catKey }}" {{ $category === $catKey ? 'selected' : '' }}>
                            {{ $catName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Featured Filter -->
            <div class="sm:col-span-2">
                <select name="featured" 
                        class="w-full px-3 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                    <option value="">All Statuses</option>
                    <option value="1" {{ $featured === '1' ? 'selected' : '' }}>Featured Only</option>
                    <option value="0" {{ $featured === '0' ? 'selected' : '' }}>Standard Only</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="sm:col-span-2 flex items-center gap-2">
                <button type="submit" 
                        class="w-full py-2 bg-ink hover:bg-black text-white text-xs font-mono uppercase tracking-wider rounded transition-colors">
                    Filter
                </button>
                @if($search || $category || $featured !== null)
                    <a href="{{ route('admin.products.index') }}" 
                       title="Clear Filters"
                       class="p-2 text-ink-muted hover:text-ink border border-paper-border rounded hover:bg-paper-muted">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-paper-muted text-[10px] font-mono uppercase tracking-wider text-ink-muted border-b border-paper-border">
                        <th class="px-5 py-3">Product Specimen</th>
                        <th class="px-5 py-3">SKU & Category</th>
                        <th class="px-5 py-3">Primary Materials</th>
                        <th class="px-5 py-3">Attributes</th>
                        <th class="px-5 py-3 text-center">Order</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-paper-border text-xs">
                    @forelse($products as $prod)
                        <tr class="hover:bg-paper-muted/40 transition-colors">
                            <!-- Image + Title -->
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $prod->primary_image ?: '/images/placeholder.jpg' }}" 
                                         alt="{{ $prod->title }}" 
                                         class="w-12 h-12 object-cover rounded border border-paper-border bg-paper-muted shrink-0">
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.products.edit', $prod) }}" class="font-medium text-ink hover:text-saddle transition-colors block truncate max-w-xs">
                                            {{ $prod->title }}
                                        </a>
                                        <p class="text-[11px] text-ink-subtle truncate max-w-xs">
                                            {{ $prod->tagline ?: 'No tagline assigned' }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- SKU + Category -->
                            <td class="px-5 py-3.5">
                                <div class="font-mono text-saddle font-semibold text-[11px]">{{ $prod->sku }}</div>
                                <div class="text-ink-muted capitalize text-[11px]">{{ $categories[$prod->category] ?? $prod->category }}</div>
                            </td>

                            <!-- Materials -->
                            <td class="px-5 py-3.5 text-ink-muted">
                                <div class="truncate max-w-[200px]" title="{{ $prod->primary_material }}">{{ $prod->primary_material }}</div>
                                @if($prod->capacity)
                                    <div class="text-[11px] font-mono text-ink-subtle">{{ $prod->capacity }}</div>
                                @endif
                            </td>

                            <!-- Badges -->
                            <td class="px-5 py-3.5">
                                <div class="flex flex-wrap gap-1">
                                    @if($prod->is_featured)
                                        <span class="text-[9px] font-mono uppercase bg-emerald-50 text-emerald-800 border border-emerald-200 px-1.5 py-0.5 rounded">Featured</span>
                                    @endif
                                    @if($prod->is_sustainable)
                                        <span class="text-[9px] font-mono uppercase bg-teal-50 text-teal-800 border border-teal-200 px-1.5 py-0.5 rounded">Eco</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Sort order -->
                            <td class="px-5 py-3.5 text-center font-mono text-ink-subtle">
                                {{ $prod->sort_order }}
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="{{ route('products.show', $prod) }}" target="_blank" 
                                       title="View on public site" 
                                       class="p-1.5 text-ink-muted hover:text-ink hover:bg-paper-muted rounded transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('admin.products.edit', $prod) }}" 
                                       title="Edit product specification" 
                                       class="p-1.5 text-ink-muted hover:text-saddle hover:bg-paper-muted rounded transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.products.destroy', $prod) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you wish to decommission product {{ $prod->sku }}?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Delete product" 
                                                class="p-1.5 text-ink-muted hover:text-red-600 hover:bg-red-50 rounded transition-colors cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center text-ink-muted">
                                <p class="text-sm font-medium">No products match your criteria.</p>
                                <p class="text-xs text-ink-subtle mt-1">Try resetting the filters or create a new product specification.</p>
                                <a href="{{ route('admin.products.create') }}" class="inline-block mt-3 px-3 py-1.5 bg-saddle text-white rounded text-xs font-mono">
                                    + Add New Product
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="px-5 py-4 border-t border-paper-border bg-paper-muted/30">
                {{ $products->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

