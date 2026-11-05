@extends('admin.layouts.app')

@section('title', 'Navigation Menus')
@section('page_title', 'Navigation')

@section('content')
<div class="space-y-8" x-data="{ addModalOpen: false, activeLocation: 'header' }">

    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Navigation Architecture</h1>
            <p class="text-xs text-ink-muted mt-0.5">Control links, order, and destination targets for the storefront top header and footer columns.</p>
        </div>

        <button type="button" @click="addModalOpen = true" 
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-saddle hover:bg-saddle-hover text-white rounded-md text-xs font-mono font-semibold uppercase tracking-wider transition-colors shadow-xs shrink-0 cursor-pointer focus-visible:ring-2 focus-visible:ring-saddle">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Menu Item</span>
        </button>
    </div>

    <!-- Navigation Location Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Column 1: Header Navigation -->
        <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden flex flex-col">
            <div class="px-5 py-4 border-b border-paper-border bg-paper-muted/30 flex items-center justify-between">
                <div>
                    <h2 class="font-serif text-base font-semibold text-ink">Header Navigation</h2>
                    <p class="text-[11px] text-ink-subtle">Primary desktop & mobile topbar links</p>
                </div>
                <span class="text-xs font-mono bg-paper-muted px-2 py-0.5 rounded text-ink-muted">{{ $headerItems->count() }}</span>
            </div>

            <div class="divide-y divide-paper-border flex-1">
                @forelse($headerItems as $item)
                    <div class="p-4 flex items-center justify-between gap-3 hover:bg-paper-muted/40 transition-colors">
                        <div class="min-w-0">
                            <div class="text-xs font-semibold text-ink flex items-center gap-2">
                                <span>{{ $item->label }}</span>
                                @if(!$item->is_active)
                                    <span class="text-[9px] font-mono bg-gray-100 text-gray-500 px-1 py-0.2 rounded">Disabled</span>
                                @endif
                            </div>
                            <div class="text-[10px] font-mono text-ink-subtle truncate max-w-[200px]">{{ $item->url }}</div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            <form action="{{ route('admin.navigation.destroy', $item) }}" method="POST" 
                                  onsubmit="return confirm('Remove navigation link?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-ink-muted hover:text-red-600 cursor-pointer" title="Delete">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-xs text-ink-subtle">No header links configured.</div>
                @endforelse
            </div>
        </div>

        <!-- Column 2: Footer Enterprise -->
        <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden flex flex-col">
            <div class="px-5 py-4 border-b border-paper-border bg-paper-muted/30 flex items-center justify-between">
                <div>
                    <h2 class="font-serif text-base font-semibold text-ink">Footer Enterprise</h2>
                    <p class="text-[11px] text-ink-subtle">Corporate & institutional links</p>
                </div>
                <span class="text-xs font-mono bg-paper-muted px-2 py-0.5 rounded text-ink-muted">{{ $footerEnterprise->count() }}</span>
            </div>

            <div class="divide-y divide-paper-border flex-1">
                @forelse($footerEnterprise as $item)
                    <div class="p-4 flex items-center justify-between gap-3 hover:bg-paper-muted/40 transition-colors">
                        <div class="min-w-0">
                            <div class="text-xs font-semibold text-ink flex items-center gap-2">
                                <span>{{ $item->label }}</span>
                                @if(!$item->is_active)
                                    <span class="text-[9px] font-mono bg-gray-100 text-gray-500 px-1 py-0.2 rounded">Disabled</span>
                                @endif
                            </div>
                            <div class="text-[10px] font-mono text-ink-subtle truncate max-w-[200px]">{{ $item->url }}</div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            <form action="{{ route('admin.navigation.destroy', $item) }}" method="POST" 
                                  onsubmit="return confirm('Remove navigation link?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-ink-muted hover:text-red-600 cursor-pointer" title="Delete">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-xs text-ink-subtle">No enterprise links configured.</div>
                @endforelse
            </div>
        </div>

        <!-- Column 3: Footer Disciplines -->
        <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden flex flex-col">
            <div class="px-5 py-4 border-b border-paper-border bg-paper-muted/30 flex items-center justify-between">
                <div>
                    <h2 class="font-serif text-base font-semibold text-ink">Footer Disciplines</h2>
                    <p class="text-[11px] text-ink-subtle">Product categories & lookbooks</p>
                </div>
                <span class="text-xs font-mono bg-paper-muted px-2 py-0.5 rounded text-ink-muted">{{ $footerDisciplines->count() }}</span>
            </div>

            <div class="divide-y divide-paper-border flex-1">
                @forelse($footerDisciplines as $item)
                    <div class="p-4 flex items-center justify-between gap-3 hover:bg-paper-muted/40 transition-colors">
                        <div class="min-w-0">
                            <div class="text-xs font-semibold text-ink flex items-center gap-2">
                                <span>{{ $item->label }}</span>
                                @if(!$item->is_active)
                                    <span class="text-[9px] font-mono bg-gray-100 text-gray-500 px-1 py-0.2 rounded">Disabled</span>
                                @endif
                            </div>
                            <div class="text-[10px] font-mono text-ink-subtle truncate max-w-[200px]">{{ $item->url }}</div>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            <form action="{{ route('admin.navigation.destroy', $item) }}" method="POST" 
                                  onsubmit="return confirm('Remove navigation link?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-ink-muted hover:text-red-600 cursor-pointer" title="Delete">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-xs text-ink-subtle">No disciplines links configured.</div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- ADD MENU ITEM MODAL -->
    <div x-show="addModalOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs" 
         x-cloak>
        <div class="bg-white rounded-xl border border-paper-border max-w-md w-full p-6 shadow-2xl space-y-4" @click.away="addModalOpen = false">
            <div class="flex items-center justify-between border-b border-paper-border pb-3">
                <h3 class="font-serif text-lg font-medium text-ink">Add Navigation Item</h3>
                <button type="button" @click="addModalOpen = false" class="text-ink-subtle hover:text-ink cursor-pointer">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.navigation.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Target Location *</label>
                    <select name="location" required class="w-full px-3 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                        <option value="header">Top Header Navigation</option>
                        <option value="footer_enterprise">Footer Enterprise Column</option>
                        <option value="footer_disciplines">Footer Disciplines Column</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Link Label *</label>
                    <input type="text" name="label" required placeholder="e.g. Lookbook"
                           class="w-full px-3 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                </div>

                <div>
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">URL Path *</label>
                    <input type="text" name="url" required placeholder="/products or https://..."
                           class="w-full px-3 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                </div>

                <div class="grid grid-cols-2 gap-3 items-center">
                    <div>
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-1">Sort Order</label>
                        <input type="number" name="sort_order" value="10"
                               class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                    </div>
                    <label class="flex items-center gap-2 cursor-pointer pt-4">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded text-saddle focus:ring-saddle">
                        <span class="text-xs font-medium text-ink">Visible</span>
                    </label>
                </div>

                <div class="flex items-center justify-end gap-2 pt-3 border-t border-paper-border">
                    <button type="button" @click="addModalOpen = false" class="px-3 py-1.5 text-xs text-ink-muted hover:text-ink cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase rounded transition-colors cursor-pointer">
                        Add Item
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

