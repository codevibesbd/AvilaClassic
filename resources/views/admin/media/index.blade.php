@extends('admin.layouts.app')

@section('title', 'Media Assets Library')
@section('page_title', 'Media Library')

@section('content')
<div class="space-y-6" x-data="{ copySuccess: false, copiedUrl: '', copy(url) {
    navigator.clipboard.writeText(url);
    this.copiedUrl = url;
    this.copySuccess = true;
    setTimeout(() => { this.copySuccess = false; }, 2500);
} }">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Media Assets Library</h1>
            <p class="text-xs text-ink-muted mt-0.5">Upload, organize, and copy URLs of high-resolution product photography, factory schematics, and editorial banners.</p>
        </div>
    </div>

    <!-- Upload Card -->
    <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs">
        <h2 class="text-xs font-mono uppercase tracking-wider text-ink font-semibold mb-3">Upload New Media Asset</h2>
        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row gap-3 items-end">
            @csrf
            <div class="flex-1 w-full">
                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Asset Display Name (Optional)</label>
                <input type="text" name="name" placeholder="e.g. Leather Workshop Artisan 2026"
                       class="w-full px-3 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink">
            </div>

            <div class="flex-1 w-full">
                <label class="block text-[11px] font-mono uppercase text-ink-muted mb-1">Select File (Image / Document up to 16MB) *</label>
                <input type="file" name="file" required accept="image/*,application/pdf"
                       class="w-full text-xs text-ink file:mr-3 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-mono file:bg-paper-muted file:text-ink hover:file:bg-paper-border-strong cursor-pointer">
            </div>

            <button type="submit" 
                    class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs shrink-0 cursor-pointer">
                Upload Asset
            </button>
        </form>
    </div>

    <!-- Search & Filter Bar -->
    <div class="flex items-center justify-between gap-3">
        <form method="GET" action="{{ route('admin.media.index') }}" class="relative w-72">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search assets by file name…"
                   class="w-full pl-8 pr-3 py-1.5 bg-white border border-paper-border rounded text-xs text-ink placeholder-ink-subtle focus-visible:ring-2 focus-visible:ring-saddle">
            <svg class="w-3.5 h-3.5 text-ink-subtle absolute left-2.5 top-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </form>
        <span class="text-xs font-mono text-ink-subtle">{{ $totalCount }} total media objects</span>
    </div>

    <!-- Toast copy notification -->
    <div x-show="copySuccess" 
         x-transition 
         class="fixed bottom-6 right-6 z-50 p-3 bg-ink text-white text-xs font-mono rounded-lg shadow-xl flex items-center gap-2"
         x-cloak>
        <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span>URL copied to clipboard!</span>
    </div>

    <!-- Media Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse($mediaItems as $media)
            <div class="bg-white rounded-xl border border-paper-border p-3 shadow-xs hover:shadow-md transition-shadow flex flex-col justify-between group">
                <div>
                    <div class="aspect-square w-full rounded-lg bg-paper-muted border border-paper-border overflow-hidden mb-2.5 flex items-center justify-center relative">
                        @if(str_starts_with($media->mime_type, 'image/'))
                            <img src="{{ $media->url }}" alt="{{ $media->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-10 h-10 text-ink-subtle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        @endif

                        <button type="button" @click="copy('{{ url($media->url) }}')" 
                                title="Copy public URL"
                                class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-mono gap-1 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span>Copy URL</span>
                        </button>
                    </div>

                    <div class="text-xs font-medium text-ink truncate" title="{{ $media->name }}">{{ $media->name }}</div>
                    <div class="text-[10px] font-mono text-ink-subtle mt-0.5">{{ $media->formatted_size }}</div>
                </div>

                <div class="flex items-center justify-between pt-2 mt-2 border-t border-paper-border">
                    <button type="button" @click="copy('{{ url($media->url) }}')" 
                            class="text-[10px] font-mono text-saddle hover:underline cursor-pointer">
                        Copy URL
                    </button>

                    <form action="{{ route('admin.media.destroy', $media) }}" method="POST" 
                          onsubmit="return confirm('Permanently delete asset {{ $media->file_name }}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-ink-subtle hover:text-red-600 p-0.5 cursor-pointer" title="Delete file">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full p-12 text-center text-ink-muted bg-white rounded-xl border border-paper-border">
                <p class="text-sm">No media assets found.</p>
                <p class="text-xs text-ink-subtle mt-1">Use the upload tool above to add photography or technical assets.</p>
            </div>
        @endforelse
    </div>

    @if($mediaItems->hasPages())
        <div class="px-5 py-4 bg-white rounded-xl border border-paper-border">
            {{ $mediaItems->links() }}
        </div>
    @endif

</div>
@endsection

