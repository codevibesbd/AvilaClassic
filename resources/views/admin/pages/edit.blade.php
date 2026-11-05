@extends('admin.layouts.app')

@section('title', 'Edit Page: ' . $page->title)
@section('page_title', 'Edit Page')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-mono text-ink-muted mb-1">
                <a href="{{ route('admin.pages.index') }}" class="hover:text-saddle">&larr; Back to Pages</a>
                <span>/</span>
                <span class="text-saddle font-semibold">/{{ $page->slug }}</span>
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Edit Content Page: {{ $page->title }}</h1>
        </div>

        <div class="flex items-center gap-3">
            <a href="/{{ $page->slug }}" target="_blank" 
               class="px-3.5 py-2 border border-paper-border hover:border-ink bg-white text-ink text-xs font-mono rounded transition-colors flex items-center gap-1.5">
                <span>View Live</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
            <button type="submit" form="page-edit-form" 
                    class="px-5 py-2 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                Commit Changes
            </button>
        </div>
    </div>

    <form id="page-edit-form" 
          action="{{ route('admin.pages.update', $page) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6"
          x-data="{
              bannerImgPreview: '{{ $page->banner_image }}',
              handleFile(e) {
                  const file = e.target.files[0];
                  if (file) {
                      this.bannerImgPreview = URL.createObjectURL(file);
                  }
              }
          }">
        @csrf
        @method('PUT')

        <!-- Page Nomenclature & Publication -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                1. Page Identity & State
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                <div class="sm:col-span-8">
                    <label for="title" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Page Title (Internal & Nav) *
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}" required
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Fixed URL Slug
                    </label>
                    <input type="text" value="/{{ $page->slug }}" disabled
                           class="w-full px-3.5 py-2 bg-paper-muted/60 border border-paper-border rounded text-sm font-mono text-ink-muted cursor-not-allowed">
                </div>

                <div class="sm:col-span-12">
                    <label class="flex items-center gap-3 cursor-pointer pt-1">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $page->is_published) ? 'checked' : '' }}
                               class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                        <div>
                            <span class="text-xs font-semibold text-ink block">Page Published</span>
                            <span class="text-[11px] text-ink-muted">When unchecked, this page is restricted to draft mode.</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Hero Banner Section -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                2. Header Banner & Typography
            </h2>

            <div class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="banner_title" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                            Banner Main Headline
                        </label>
                        <input type="text" id="banner_title" name="banner_title" value="{{ old('banner_title', $page->banner_title) }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif">
                    </div>

                    <div>
                        <label for="banner_subtitle" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                            Banner Category Subtitle / Pill
                        </label>
                        <input type="text" id="banner_subtitle" name="banner_subtitle" value="{{ old('banner_subtitle', $page->banner_subtitle) }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-mono">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-12 gap-6 pt-2">
                    <div class="sm:col-span-6 space-y-3">
                        <label class="block text-xs font-mono uppercase text-ink-muted">
                            Banner Background Image
                        </label>
                        <input type="file" 
                               name="banner_image_file" 
                               accept="image/*" 
                               @change="handleFile"
                               class="block w-full text-xs text-ink file:mr-3 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-mono file:bg-paper-muted file:text-ink hover:file:bg-paper-border-strong cursor-pointer">
                        
                        <div>
                            <span class="text-[11px] text-ink-subtle block mb-1">Or direct web URL:</span>
                            <input type="text" name="banner_image" x-model="bannerImgPreview" value="{{ old('banner_image', $page->banner_image) }}"
                                   class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink placeholder-ink-subtle">
                        </div>
                    </div>

                    <div class="sm:col-span-6 flex flex-col items-center justify-center p-3 border-2 border-dashed border-paper-border rounded-lg bg-paper-muted/30 min-h-[140px]">
                        <template x-if="bannerImgPreview">
                            <img :src="bannerImgPreview" alt="Banner preview" class="max-h-36 rounded object-contain shadow-xs">
                        </template>
                        <template x-if="!bannerImgPreview">
                            <span class="text-[11px] font-mono text-ink-subtle">No banner asset selected</span>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Metadata -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                3. Search Engine Optimization (SEO)
            </h2>

            <div class="space-y-4">
                <div>
                    <label for="meta_title" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Browser Title Tag (&lt;title&gt;)
                    </label>
                    <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink"
                           placeholder="Avila Classic | Page Name">
                </div>

                <div>
                    <label for="meta_description" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Meta Description (Search Snippet)
                    </label>
                    <textarea id="meta_description" name="meta_description" rows="3"
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink"
                              placeholder="Concise overview presented in search results and social cards.">{{ old('meta_description', $page->meta_description) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Structured Content Blocks -->
        @if(!empty($page->content) && is_array($page->content))
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                4. Page Narrative & Content Elements
            </h2>

            <div class="space-y-4">
                @if(isset($page->content['intro_heading']) || isset($page->content['intro_body']))
                    <div class="space-y-3">
                        <label class="block text-xs font-mono uppercase text-ink-muted">Introductory Narrative</label>
                        <input type="text" name="content[intro_heading]" value="{{ $page->content['intro_heading'] ?? '' }}"
                               class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink font-serif"
                               placeholder="Main Intro Heading">
                        <textarea name="content[intro_body]" rows="3"
                                  class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink"
                                  placeholder="Introductory body paragraph">{{ $page->content['intro_body'] ?? '' }}</textarea>
                    </div>
                @endif

                @if(isset($page->content['stats']) && is_array($page->content['stats']))
                    <div class="pt-3 border-t border-paper-border">
                        <label class="block text-xs font-mono uppercase text-ink-muted mb-2">Key Metric Callouts</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($page->content['stats'] as $sidx => $stat)
                                <div class="p-3 bg-paper-muted rounded border border-paper-border space-y-2">
                                    <input type="text" name="content[stats][{{ $sidx }}][value]" value="{{ $stat['value'] ?? '' }}"
                                           class="w-full px-2 py-1 bg-white border border-paper-border rounded text-xs font-mono font-bold text-saddle" placeholder="Value (e.g. 1,100+)">
                                    <input type="text" name="content[stats][{{ $sidx }}][label]" value="{{ $stat['label'] ?? '' }}"
                                           class="w-full px-2 py-1 bg-white border border-paper-border rounded text-xs text-ink" placeholder="Label">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endif

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-paper-border">
            <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 text-xs font-mono text-ink-muted hover:text-ink">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                Commit Changes
            </button>
        </div>

    </form>

</div>
@endsection

