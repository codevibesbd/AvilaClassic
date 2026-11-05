@extends('admin.layouts.app')

@section('title', 'New Product Specification')
@section('page_title', 'Create Product')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-mono text-ink-muted mb-1">
                <a href="{{ route('admin.products.index') }}" class="hover:text-saddle">&larr; Back to Catalog</a>
            </div>
            <h1 class="font-serif text-2xl sm:text-3xl font-medium text-ink">New Technical Specification</h1>
        </div>

        <button type="submit" form="product-create-form" 
                class="px-5 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
            Publish Specimen
        </button>
    </div>

    <form id="product-create-form" 
          action="{{ route('admin.products.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6"
          x-data="{
              primaryImgPreview: '',
              colors: [{ name: 'Carbon Black', hex: '#141517' }],
              addColor() {
                  this.colors.push({ name: '', hex: '#FA8231' });
              },
              removeColor(idx) {
                  this.colors.splice(idx, 1);
              },
              handleFile(e) {
                  const file = e.target.files[0];
                  if (file) {
                      this.primaryImgPreview = URL.createObjectURL(file);
                  }
              }
          }">
        @csrf

        <!-- Core Identity -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                1. Nomenclature & Categorization
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                <!-- Title -->
                <div class="sm:col-span-8">
                    <label for="title" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Product Name / Model Title *
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                           placeholder="e.g. Cordura Expedition Duffel 65L">
                </div>

                <!-- SKU -->
                <div class="sm:col-span-4">
                    <label for="sku" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Master SKU / Code *
                    </label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku') }}" required
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm font-mono text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                           placeholder="AVL-EXP-65L">
                </div>

                <!-- Category -->
                <div class="sm:col-span-6">
                    <label for="category" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Discipline / Category *
                    </label>
                    <select id="category" name="category" required
                            class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                        <option value="">Select Category</option>
                        @foreach($categories as $catKey => $catName)
                            <option value="{{ $catKey }}" {{ old('category') === $catKey ? 'selected' : '' }}>
                                {{ $catName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tagline -->
                <div class="sm:col-span-6">
                    <label for="tagline" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Editorial Tagline / Positioning
                    </label>
                    <input type="text" id="tagline" name="tagline" value="{{ old('tagline') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-sm text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                           placeholder="Engineered for high-latitude transit & harsh terminals">
                </div>
            </div>
        </div>

        <!-- Materiality & Engineering -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                2. Material Composition & Metrics
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="primary_material" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Primary Shell Material *
                    </label>
                    <input type="text" id="primary_material" name="primary_material" value="{{ old('primary_material', '1000D Ballistic Nylon with DWR') }}" required
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div>
                    <label for="lining_material" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Internal Lining Spec
                    </label>
                    <input type="text" id="lining_material" name="lining_material" value="{{ old('lining_material', '210D Ripstop Polyester with PU coating') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div>
                    <label for="hardware_specs" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Hardware & Fasteners
                    </label>
                    <input type="text" id="hardware_specs" name="hardware_specs" value="{{ old('hardware_specs', 'YKK RC Zippers & Duraflex Buckles') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle">
                </div>

                <div>
                    <label for="capacity" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Volume Capacity
                    </label>
                    <input type="text" id="capacity" name="capacity" value="{{ old('capacity') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                           placeholder="e.g. 42 Liters">
                </div>

                <div>
                    <label for="dimensions" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Dimensions (L x W x H)
                    </label>
                    <input type="text" id="dimensions" name="dimensions" value="{{ old('dimensions') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                           placeholder="55 x 35 x 23 cm">
                </div>

                <div>
                    <label for="weight" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Tare Weight
                    </label>
                    <input type="text" id="weight" name="weight" value="{{ old('weight') }}"
                           class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                           placeholder="1.45 kg">
                </div>
            </div>
        </div>

        <!-- Narrative & Descriptions -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                3. Technical Description & Features
            </h2>

            <div>
                <label for="summary" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                    Executive Summary (Catalog Card Blurb) *
                </label>
                <textarea id="summary" name="summary" rows="2" required
                          class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                          placeholder="Concise overview of product purpose and target use case.">{{ old('summary') }}</textarea>
            </div>

            <div>
                <label for="description" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                    Comprehensive Engineering Specification *
                </label>
                <textarea id="description" name="description" rows="5" required
                          class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink font-sans focus-visible:ring-2 focus-visible:ring-saddle"
                          placeholder="Detailed manufacturing brief, structural reinforcement notes, and performance ratings.">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="features_text" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Key Features (One item per line)
                    </label>
                    <textarea id="features_text" name="features_text" rows="4"
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink font-mono focus-visible:ring-2 focus-visible:ring-saddle"
                              placeholder="Reinforced double-box corner stitching&#10;Hydration bladder routing sleeve&#10;TSA-approved lock compartment">{{ old('features_text') }}</textarea>
                </div>

                <div>
                    <label for="certifications_text" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Certifications (Comma separated)
                    </label>
                    <textarea id="certifications_text" name="certifications_text" rows="4"
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs text-ink font-mono focus-visible:ring-2 focus-visible:ring-saddle"
                              placeholder="C-TPAT Tier 2, BSCI A-Grade, ISO 9001:2015, REACH Compliant">{{ old('certifications_text') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Imagery & Visual Assets -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                4. Lookbook Photography & Media
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                <!-- Primary Image Upload -->
                <div class="sm:col-span-6 space-y-3">
                    <label class="block text-xs font-mono uppercase text-ink-muted">
                        Primary Specimen Image (Upload or URL)
                    </label>
                    
                    <input type="file" 
                           name="primary_image_file" 
                           accept="image/*" 
                           @change="handleFile"
                           class="block w-full text-xs text-ink file:mr-3 file:py-2 file:px-4 file:rounded file:border-0 file:text-xs file:font-mono file:bg-paper-muted file:text-ink hover:file:bg-paper-border-strong cursor-pointer">
                    
                    <div>
                        <span class="text-[11px] text-ink-subtle block mb-1">Or direct web URL:</span>
                        <input type="text" name="primary_image" x-model="primaryImgPreview" value="{{ old('primary_image') }}"
                               class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink placeholder-ink-subtle"
                               placeholder="https://... or /images/products/...">
                    </div>
                </div>

                <!-- Preview Box -->
                <div class="sm:col-span-6 flex flex-col items-center justify-center p-3 border-2 border-dashed border-paper-border rounded-lg bg-paper-muted/30 min-h-[140px]">
                    <template x-if="primaryImgPreview">
                        <img :src="primaryImgPreview" alt="Image preview" class="max-h-36 rounded object-contain shadow-xs">
                    </template>
                    <template x-if="!primaryImgPreview">
                        <div class="text-center text-ink-subtle">
                            <svg class="w-8 h-8 mx-auto mb-1 stroke-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-[11px] font-mono">No image loaded yet</span>
                        </div>
                    </template>
                </div>

                <!-- Gallery URLs -->
                <div class="sm:col-span-12">
                    <label for="gallery_images_text" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Gallery Image URLs (One URL per line)
                    </label>
                    <textarea id="gallery_images_text" name="gallery_images_text" rows="3"
                              class="w-full px-3.5 py-2 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink focus-visible:ring-2 focus-visible:ring-saddle"
                              placeholder="https://images.unsplash.com/...&#10;/images/products/detail-1.jpg">{{ old('gallery_images_text') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Color Palette Options -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <div class="flex items-center justify-between border-b border-paper-border pb-3">
                <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold">
                    5. Finish & Color Swatches
                </h2>
                <button type="button" @click="addColor()" 
                        class="text-xs font-mono text-saddle hover:underline flex items-center gap-1 cursor-pointer">
                    + Add Finish Variant
                </button>
            </div>

            <div class="space-y-2">
                <template x-for="(col, index) in colors" :key="index">
                    <div class="flex items-center gap-3">
                        <input type="color" 
                               name="color_hexes[]" 
                               x-model="col.hex" 
                               class="w-9 h-9 p-0.5 rounded border border-paper-border cursor-pointer bg-white">
                        <input type="text" 
                               name="color_names[]" 
                               x-model="col.name" 
                               placeholder="Color name (e.g. Obsidian Matte)" 
                               class="flex-1 px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs text-ink">
                        <button type="button" @click="removeColor(index)" 
                                class="p-1.5 text-red-500 hover:text-red-700 cursor-pointer"
                                title="Remove swatch">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </template>
            </div>
        </div>

        <!-- Publication Controls & Sorting -->
        <div class="bg-white rounded-xl border border-paper-border p-6 shadow-xs space-y-4">
            <h2 class="text-sm font-mono uppercase tracking-wider text-ink font-semibold border-b border-paper-border pb-3">
                6. Visibility & Display Hierarchy
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items-center">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <div>
                        <span class="text-xs font-semibold text-ink block">Feature on Homepage</span>
                        <span class="text-[11px] text-ink-muted">Surface on primary curated showcase</span>
                    </div>
                </label>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_sustainable" value="1" {{ old('is_sustainable') ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-paper-border text-saddle focus:ring-saddle">
                    <div>
                        <span class="text-xs font-semibold text-ink block">Sustainable Line Badge</span>
                        <span class="text-[11px] text-ink-muted">Highlight recycled or low-impact weave</span>
                    </div>
                </label>

                <div>
                    <label for="sort_order" class="block text-xs font-mono uppercase text-ink-muted mb-1">
                        Catalog Sequence Order
                    </label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}"
                           class="w-full px-3 py-1.5 bg-paper-muted border border-paper-border rounded text-xs font-mono text-ink">
                </div>
            </div>
        </div>

        <!-- Submit Bar -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-paper-border">
            <a href="{{ route('admin.products.index') }}" 
               class="px-4 py-2 text-xs font-mono text-ink-muted hover:text-ink">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2.5 bg-saddle hover:bg-saddle-hover text-white text-xs font-mono font-semibold uppercase tracking-wider rounded transition-colors shadow-xs cursor-pointer">
                Save & Publish Specimen
            </button>
        </div>

    </form>

</div>
@endsection

