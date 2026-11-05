@extends('admin.layouts.app')

@section('title', 'Corporate Content Pages')
@section('page_title', 'Pages')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Corporate Content Pages</h1>
            <p class="text-xs text-ink-muted mt-0.5">Edit editorial narrative, metadata, hero banners, and corporate credentials for all main site pages.</p>
        </div>
    </div>

    <!-- Pages Grid / Table -->
    <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-paper-muted text-[10px] font-mono uppercase tracking-wider text-ink-muted border-b border-paper-border">
                        <th class="px-5 py-3">Banner Asset</th>
                        <th class="px-5 py-3">Page Title & Path</th>
                        <th class="px-5 py-3">Banner Headlines</th>
                        <th class="px-5 py-3">SEO Meta Snippet</th>
                        <th class="px-5 py-3 text-center">Status</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-paper-border text-xs">
                    @forelse($pages as $p)
                        <tr class="hover:bg-paper-muted/40 transition-colors">
                            <td class="px-5 py-3.5">
                                <img src="{{ $p->banner_image ?: '/images/placeholder.jpg' }}" 
                                     alt="{{ $p->title }}" 
                                     class="w-20 h-12 object-cover rounded border border-paper-border bg-paper-muted">
                            </td>

                            <td class="px-5 py-3.5">
                                <div class="font-semibold text-ink">{{ $p->title }}</div>
                                <div class="text-[10px] font-mono text-saddle mt-0.5">/{{ $p->slug }}</div>
                            </td>

                            <td class="px-5 py-3.5">
                                <div class="font-medium text-ink truncate max-w-xs">{{ $p->banner_title }}</div>
                                <div class="text-[11px] text-ink-subtle truncate max-w-xs">{{ $p->banner_subtitle }}</div>
                            </td>

                            <td class="px-5 py-3.5 text-ink-muted">
                                <div class="truncate max-w-xs text-[11px]">{{ $p->meta_description ?: 'No meta description configured' }}</div>
                            </td>

                            <td class="px-5 py-3.5 text-center">
                                @if($p->is_published)
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono px-2 py-0.5 rounded-full bg-gray-100 text-gray-600">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <a href="/{{ $p->slug }}" target="_blank" 
                                       title="View live page" 
                                       class="p-1.5 text-ink-muted hover:text-ink hover:bg-paper-muted rounded transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('admin.pages.edit', $p) }}" 
                                       class="px-3 py-1 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-medium rounded transition-colors shadow-xs">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-8 text-center text-ink-muted">
                                No site pages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

