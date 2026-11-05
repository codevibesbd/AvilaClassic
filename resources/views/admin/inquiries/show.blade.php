@extends('admin.layouts.app')

@section('title', 'Inquiry from ' . $inquiry->name)
@section('page_title', 'Inquiry Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-mono text-ink-muted mb-1">
                <a href="{{ route('admin.inquiries.index') }}" class="hover:text-saddle">&larr; Back to Inquiries</a>
                <span>/</span>
                <span class="text-saddle font-semibold">Dispatch #{{ $inquiry->id }}</span>
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Client Specification Dispatch</h1>
        </div>

        <div class="flex items-center gap-2">
            <a href="mailto:{{ $inquiry->email }}?subject={{ rawurlencode('Avila Classic — In response to your inquiry') }}" 
               class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-medium rounded transition-colors shadow-xs">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Draft Email Reply</span>
            </a>
        </div>
    </div>

    <!-- Client Profile & Scope Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        
        <div class="bg-white p-5 rounded-xl border border-paper-border shadow-xs">
            <span class="text-[10px] font-mono uppercase tracking-wider text-ink-muted block mb-1">Client Identity</span>
            <div class="text-base font-semibold text-ink">{{ $inquiry->name }}</div>
            <a href="mailto:{{ $inquiry->email }}" class="text-xs font-mono text-saddle hover:underline block mt-0.5">
                {{ $inquiry->email }}
            </a>
            @if($inquiry->company)
                <div class="text-xs text-ink-muted mt-2 pt-2 border-t border-paper-border">
                    <span class="font-mono text-[10px] uppercase text-ink-subtle block">Company / Firm</span>
                    <span class="font-medium text-ink">{{ $inquiry->company }}</span>
                </div>
            @endif
        </div>

        <div class="bg-white p-5 rounded-xl border border-paper-border shadow-xs">
            <span class="text-[10px] font-mono uppercase tracking-wider text-ink-muted block mb-1">Production Scope</span>
            <div class="text-sm font-semibold text-ink">{{ $inquiry->category ?: 'General Portfolio' }}</div>
            <div class="text-xs text-ink-muted mt-2 pt-2 border-t border-paper-border">
                <span class="font-mono text-[10px] uppercase text-ink-subtle block">Target Volume</span>
                <span class="font-mono font-medium text-ink">{{ $inquiry->volume ?: 'Not specified' }}</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-paper-border shadow-xs">
            <span class="text-[10px] font-mono uppercase tracking-wider text-ink-muted block mb-1">Dispatch Origin</span>
            <div class="text-xs font-mono text-ink">{{ $inquiry->created_at->format('M j, Y • h:i A') }}</div>
            <div class="text-[11px] text-ink-subtle mt-0.5">{{ $inquiry->created_at->diffForHumans() }}</div>
            <div class="text-xs text-ink-muted mt-2 pt-2 border-t border-paper-border">
                <span class="font-mono text-[10px] uppercase text-ink-subtle block">Client Network IP</span>
                <span class="font-mono text-[11px] text-ink-subtle">{{ $inquiry->ip_address ?: 'Not logged' }}</span>
            </div>
        </div>

    </div>

    <!-- Message Body Container -->
    <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-3">
        <h2 class="text-xs font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-2">
            Dispatched Inquiry Message
        </h2>
        <div class="p-4 bg-paper-muted rounded-lg border border-paper-border text-sm text-ink leading-relaxed whitespace-pre-wrap font-sans">
{{ $inquiry->body }}
        </div>
    </div>

    <!-- Status & Management Controls -->
    <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
        <h2 class="text-xs font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-2">
            Ledger Status & Internal Follow-Up Notes
        </h2>

        <form action="{{ route('admin.inquiries.update', $inquiry) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-start">
                <div class="sm:col-span-4">
                    <label for="status" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Inquiry Ledger Status *
                    </label>
                    <select id="status" name="status" required
                            class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                        <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New (Awaiting Reply)</option>
                        <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted / In Progress</option>
                        <option value="archived" {{ $inquiry->status === 'archived' ? 'selected' : '' }}>Archived / Closed</option>
                    </select>
                </div>

                <div class="sm:col-span-8">
                    <label for="admin_notes" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Internal Administrative Notes
                    </label>
                    <textarea id="admin_notes" name="admin_notes" rows="3"
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink placeholder-ink-subtle"
                              placeholder="Record internal updates, quoted pricing, sample dispatch track numbers…">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-paper-border">
                <button type="button" 
                        onclick="if(confirm('Permanently delete this inquiry dispatch?')) document.getElementById('delete-inquiry-form').submit();"
                        class="px-3.5 py-1.5 text-xs font-mono text-red-600 hover:text-red-800 rounded transition-colors cursor-pointer">
                    Delete Inquiry
                </button>

                <button type="submit" 
                        class="px-5 py-2 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Update Ledger Status
                </button>
            </div>
        </form>

        <form id="delete-inquiry-form" action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>

</div>
@endsection

