@extends('admin.layouts.app')

@section('title', 'Hero Showcases')
@section('page_title', 'Hero Slides')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Hero Showcase Carousels</h1>
            <p class="text-xs text-ink-muted mt-0.5">Manage full-bleed editorial slides featured prominently on the storefront homepage hero slider.</p>
        </div>

        <a href="{{ route('admin.hero-slides.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-saddle hover:bg-saddle-hover text-white rounded-md text-xs font-mono font-semibold uppercase tracking-wider transition-colors shadow-xs shrink-0 focus-visible:ring-2 focus-visible:ring-saddle">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Create Hero Slide</span>
        </a>
    </div>

    <!-- Slides Table -->
    <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-paper-muted text-[10px] font-mono uppercase tracking-wider text-ink-muted border-b border-paper-border">
                        <th class="px-5 py-3">Slide Visual</th>
                        <th class="px-5 py-3">Headline & Tag</th>
                        <th class="px-5 py-3">Technical Spec Text</th>
                        <th class="px-5 py-3">Target CTA</th>
                        <th class="px-5 py-3 text-center">Sequence</th>
                        <th class="px-5 py-3 text-center">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-paper-border text-xs">
                    @forelse($slides as $slide)
                        <tr class="hover:bg-paper-muted/40 transition-colors">
                            <!-- Visual -->
                            <td class="px-5 py-3.5">
                                <img src="{{ $slide->image }}" 
                                     alt="{{ $slide->title }}" 
                                     class="w-24 h-14 object-cover rounded border border-paper-border bg-paper-muted">
                            </td>

                            <!-- Title & Tag -->
                            <td class="px-5 py-3.5">
                                <div class="font-medium text-ink">{{ $slide->title }}</div>
                                <div class="text-[10px] font-mono text-saddle mt-0.5">{{ $slide->category_tag }}</div>
                            </td>

                            <!-- Spec Text -->
                            <td class="px-5 py-3.5 font-mono text-[11px] text-ink-muted">
                                <div>{{ $slide->sku }}</div>
                                <div class="text-ink-subtle text-[10px] truncate max-w-xs">{{ $slide->spec_text }}</div>
                            </td>

                            <!-- Link -->
                            <td class="px-5 py-3.5 text-ink-muted">
                                <div class="truncate max-w-[160px] text-xs font-medium">{{ $slide->link_label }}</div>
                                <div class="text-[10px] font-mono text-ink-subtle truncate max-w-[160px]">{{ $slide->link_url }}</div>
                            </td>

                            <!-- Sort -->
                            <td class="px-5 py-3.5 text-center font-mono text-ink-muted">
                                {{ $slide->sort_order }}
                            </td>

                            <!-- Status -->
                            <td class="px-5 py-3.5 text-center">
                                @if($slide->is_active)
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Live
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-gray-100 text-gray-600">
                                        Hidden
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="{{ route('admin.hero-slides.edit', $slide) }}" 
                                       title="Edit slide" 
                                       class="p-1.5 text-ink-muted hover:text-saddle hover:bg-paper-muted rounded transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" 
                                          onsubmit="return confirm('Delete this hero showcase slide?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Delete slide" 
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
                            <td colspan="7" class="px-5 py-12 text-center text-ink-muted">
                                <p class="text-sm font-medium">No hero showcases defined.</p>
                                <a href="{{ route('admin.hero-slides.create') }}" class="inline-block mt-3 px-3 py-1.5 bg-saddle text-white rounded text-xs font-mono">
                                    + Add First Hero Slide
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

