@extends('admin.layouts.app')

@section('title', 'Modify Hero Showcase Slide')
@section('page_title', 'Edit Hero Slide')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-mono text-ink-muted mb-1">
                <a href="{{ route('admin.hero-slides.index') }}" class="hover:text-saddle">&larr; Back to Hero Slides</a>
                <span>/</span>
                <span class="text-saddle font-semibold">Slide #{{ $slide->id }}</span>
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">Modify Hero Slide</h1>
        </div>

        <button type="submit" form="hero-edit-form" 
                class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
            Commit Changes
        </button>
    </div>

    <form id="hero-edit-form" 
          action="{{ route('admin.hero-slides.update', $slide) }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6"
          x-data="{
              imgPreview: '{{ $slide->image }}',
              handleFile(e) {
                  const file = e.target.files[0];
                  if (file) {
                      this.imgPreview = URL.createObjectURL(file);
                  }
              }
          }">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                Slide Narrative & Headlines
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                <div class="sm:col-span-8">
                    <label for="title" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Hero Slide Headline *
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $slide->title) }}" required
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div class="sm:col-span-4">
                    <label for="category_tag" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Category Tag / Badge
                    </label>
                    <input type="text" id="category_tag" name="category_tag" value="{{ old('category_tag', $slide->category_tag) }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm font-mono text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div class="sm:col-span-4">
                    <label for="sku" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Featured SKU
                    </label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku', $slide->sku) }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm font-mono text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div class="sm:col-span-8">
                    <label for="spec_text" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Technical Highlights String
                    </label>
                    <input type="text" id="spec_text" name="spec_text" value="{{ old('spec_text', $slide->spec_text) }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm font-mono text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div class="sm:col-span-6">
                    <label for="link_label" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        CTA Button Label
                    </label>
                    <input type="text" id="link_label" name="link_label" value="{{ old('link_label', $slide->link_label) }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div class="sm:col-span-6">
                    <label for="link_url" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        CTA Target URL
                    </label>
                    <input type="text" id="link_url" name="link_url" value="{{ old('link_url', $slide->link_url) }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm font-mono text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>
            </div>
        </div>

        <!-- Visual Media -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                Slide Background Visual
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                <div class="sm:col-span-6 space-y-3">
                    <label class="block text-xs font-mono uppercase text-ink-muted">
                        Replace Photographic Asset
                    </label>
                    <input type="file" 
                           name="image_file" 
                           accept="image/*" 
                           @change="handleFile"
                           class="block w-full text-xs text-ink file:mr-3 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-mono file:bg-paper-muted file:text-ink hover:file:bg-paper-border-strong cursor-pointer">
                    
                    <div>
                        <span class="text-[11px] text-ink-subtle block mb-1">Or direct web/relative URL:</span>
                        <input type="text" name="image" x-model="imgPreview" value="{{ old('image', $slide->image) }}"
                               class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink placeholder-ink-subtle">
                    </div>
                </div>

                <div class="sm:col-span-6 flex flex-col items-center justify-center p-3 border-2 border-dashed border-paper-border rounded-lg bg-paper-muted/30 min-h-[160px]">
                    <template x-if="imgPreview">
                        <img :src="imgPreview" alt="Hero preview" class="max-h-40 rounded object-contain shadow-xs">
                    </template>
                    <template x-if="!imgPreview">
                        <div class="text-center text-ink-subtle">
                            <span class="text-[11px] font-mono">No imagery assigned</span>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Visibility and Order -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                Display & Rotation Sequence
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slide->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <div>
                        <span class="text-xs font-semibold text-ink block">Slide Active</span>
                        <span class="text-[11px] text-ink-muted">Include this slide in public homepage rotation</span>
                    </div>
                </label>

                <div>
                    <label for="sort_order" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Rotation Sequence Order
                    </label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $slide->sort_order) }}"
                           class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-paper-border">
            <button type="button" 
                    onclick="if(confirm('Delete this hero slide permanently?')) document.getElementById('delete-slide-form').submit();"
                    class="px-4 py-2 text-xs font-mono text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors cursor-pointer">
                Delete Slide
            </button>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.hero-slides.index') }}" class="px-4 py-2 text-xs font-mono text-ink-muted hover:text-ink">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                    Commit Changes
                </button>
            </div>
        </div>

    </form>

    <form id="delete-slide-form" action="{{ route('admin.hero-slides.destroy', $slide) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>
@endsection

