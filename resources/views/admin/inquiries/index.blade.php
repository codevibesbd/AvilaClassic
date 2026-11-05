@extends('admin.layouts.app')

@section('title', 'Client Inquiries Dispatch')
@section('page_title', 'Inquiries')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">B2B Inquiries & Dispatches</h1>
            <p class="text-xs text-ink-muted mt-0.5">Review and manage wholesale inquiries, private-label quotation requests, and corporate communications.</p>
        </div>
    </div>

    <!-- Filter Tabs & Search -->
    <div class="bg-white p-4 rounded-xl border border-paper-border shadow-xs space-y-3">
        <div class="flex flex-wrap items-center justify-between gap-3">
            
            <!-- Status Tabs -->
            <div class="flex items-center gap-1.5 text-xs font-mono">
                <a href="{{ route('admin.inquiries.index', ['status' => 'all', 'search' => $search]) }}" 
                   class="px-3 py-1.5 rounded transition-colors {{ empty($status) || $status === 'all' ? 'bg-ink text-white font-semibold' : 'bg-paper-muted text-ink-muted hover:text-ink' }}">
                    All ({{ $counts['all'] }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'new', 'search' => $search]) }}" 
                   class="px-3 py-1.5 rounded transition-colors {{ $status === 'new' ? 'bg-red-600 text-white font-semibold' : 'bg-paper-muted text-ink-muted hover:text-ink' }}">
                    New ({{ $counts['new'] }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'contacted', 'search' => $search]) }}" 
                   class="px-3 py-1.5 rounded transition-colors {{ $status === 'contacted' ? 'bg-amber-600 text-white font-semibold' : 'bg-paper-muted text-ink-muted hover:text-ink' }}">
                    Contacted ({{ $counts['contacted'] }})
                </a>
                <a href="{{ route('admin.inquiries.index', ['status' => 'archived', 'search' => $search]) }}" 
                   class="px-3 py-1.5 rounded transition-colors {{ $status === 'archived' ? 'bg-gray-700 text-white font-semibold' : 'bg-paper-muted text-ink-muted hover:text-ink' }}">
                    Archived ({{ $counts['archived'] }})
                </a>
            </div>

            <!-- Search Field -->
            <form method="GET" action="{{ route('admin.inquiries.index') }}" class="flex items-center gap-2">
                @if($status)
                    <input type="hidden" name="status" value="{{ $status }}">
                @endif
                <div class="relative">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search client, email…"
                           class="w-56 pl-8 pr-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs text-ink placeholder-ink-subtle focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-saddle">
                    <svg class="w-3.5 h-3.5 text-ink-subtle absolute left-2.5 top-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button type="submit" class="px-3 py-1.5 bg-paper-muted hover:bg-paper-border text-xs font-mono rounded">
                    Search
                </button>
            </form>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="bg-white rounded-xl border border-paper-border shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-paper-muted text-[10px] font-mono uppercase tracking-wider text-ink-muted border-b border-paper-border">
                        <th class="px-5 py-3">Client & Company</th>
                        <th class="px-5 py-3">Inquiry Scope & Volume</th>
                        <th class="px-5 py-3">Dispatch Message Excerpt</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Timestamp</th>
                        <th class="px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-paper-border text-xs">
                    @forelse($inquiries as $inquiry)
                        <tr class="hover:bg-paper-muted/40 transition-colors {{ $inquiry->status === 'new' ? 'bg-amber-50/20' : '' }}">
                            <!-- Client -->
                            <td class="px-5 py-3.5">
                                <div class="font-medium text-ink">{{ $inquiry->name }}</div>
                                <div class="text-[11px] font-mono text-ink-subtle">{{ $inquiry->email }}</div>
                                @if($inquiry->company)
                                    <div class="text-[10px] font-mono text-saddle mt-0.5">{{ $inquiry->company }}</div>
                                @endif
                            </td>

                            <!-- Scope -->
                            <td class="px-5 py-3.5 text-ink-muted">
                                <div class="font-medium text-ink">{{ $inquiry->category ?: 'General Portfolio' }}</div>
                                @if($inquiry->volume)
                                    <div class="text-[10px] font-mono text-ink-subtle">Target Volume: {{ $inquiry->volume }}</div>
                                @endif
                            </td>

                            <!-- Body excerpt -->
                            <td class="px-5 py-3.5 text-ink-muted">
                                <div class="truncate max-w-xs text-[11px]">{{ $inquiry->body }}</div>
                            </td>

                            <!-- Status -->
                            <td class="px-5 py-3.5">
                                @if($inquiry->status === 'new')
                                    <span class="inline-flex items-center gap-1 text-[10px] font-mono font-semibold px-2 py-0.5 rounded-full bg-red-50 text-red-700 border border-red-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span> New
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

                            <!-- Timestamp -->
                            <td class="px-5 py-3.5 text-[11px] font-mono text-ink-subtle whitespace-nowrap">
                                <div>{{ $inquiry->created_at->format('M j, Y') }}</div>
                                <div class="text-[10px]">{{ $inquiry->created_at->format('h:i A') }}</div>
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="{{ route('admin.inquiries.show', $inquiry) }}" 
                                       class="px-3 py-1 bg-ink hover:bg-black text-white text-xs font-mono font-medium rounded transition-colors shadow-xs">
                                        Inspect
                                    </a>

                                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" 
                                          onsubmit="return confirm('Remove inquiry record?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Delete inquiry"
                                                class="p-1.5 text-ink-muted hover:text-red-600 rounded transition-colors cursor-pointer">
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
                                <p class="text-sm font-medium">No client dispatches found matching this criteria.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($inquiries->hasPages())
            <div class="px-5 py-4 border-t border-paper-border bg-paper-muted/30">
                {{ $inquiries->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

