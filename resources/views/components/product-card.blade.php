@props(['product'])

<article class="paper-card flex flex-col h-full group bg-white border border-[#E5E1D8] transition-all duration-300">
    
    <!-- Top Micro Catalog Metadata Strip -->
    <div class="px-4 py-2.5 border-b border-[#E5E1D8] bg-[#FAF8F5] flex items-center justify-between text-[11px] font-mono text-[#5C5E64]">
        <div class="flex items-center gap-1.5">
            <span class="w-1.5 h-1.5 rounded-full bg-[#FA8231]"></span>
            <span class="uppercase tracking-wider font-semibold text-[#141517]">{{ $product->category_name }}</span>
        </div>
        <span class="text-[#8A8C93]">{{ $product->sku }}</span>
    </div>

    <!-- Product Image Stage (Natural, Clean, Architectural) -->
    <a href="{{ route('products.show', $product->slug) }}" class="relative block overflow-hidden aspect-[4/3] bg-[#F2EFE9] border-b border-[#E5E1D8] focus:outline-none">
        <img src="{{ $product->primary_image }}" 
             alt="{{ $product->title }} - Technical Specification" 
             loading="lazy"
             class="w-full h-full object-cover object-center group-hover:scale-[1.03] transition-transform duration-700 ease-out">
        
        <!-- Subtle Eco or Material Tag -->
        @if($product->is_sustainable)
            <div class="absolute bottom-3 left-3">
                <span class="px-2 py-0.5 text-[10px] font-mono uppercase bg-white/95 text-[#141517] border border-[#E5E1D8] shadow-sm">
                    Recycled rPET
                </span>
            </div>
        @endif

        @if(!empty($product->capacity))
            <div class="absolute bottom-3 right-3">
                <span class="px-2 py-0.5 text-[10px] font-mono uppercase bg-[#141517]/90 text-white shadow-sm">
                    {{ $product->capacity }}
                </span>
            </div>
        @endif
    </a>

    <!-- Content & Technical Specifications Body -->
    <div class="p-5 flex flex-col flex-grow justify-between bg-white">
        <div>
            <h3 class="font-serif text-xl font-bold text-[#141517] group-hover:text-[#FA8231] transition-colors leading-snug">
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $product->title }}
                </a>
            </h3>

            <p class="mt-2 text-xs text-[#5C5E64] line-clamp-2 leading-relaxed">
                {{ $product->summary }}
            </p>

            <!-- Technical Attributes Grid (Humanized Trade Spec) -->
            <div class="mt-4 pt-3 border-t border-[#F2EFE9] space-y-1.5 text-[11px]">
                <div class="flex items-baseline justify-between gap-2">
                    <span class="text-[#8A8C93] uppercase font-mono text-[10px]">Textile:</span>
                    <span class="text-right text-[#141517] font-medium truncate max-w-[190px]" title="{{ $product->primary_material }}">
                        {{ $product->primary_material }}
                    </span>
                </div>
                @if(!empty($product->dimensions))
                    <div class="flex items-baseline justify-between gap-2">
                        <span class="text-[#8A8C93] uppercase font-mono text-[10px]">Dimensions:</span>
                        <span class="text-right text-[#5C5E64] font-mono truncate max-w-[190px]">
                            {{ explode('(', $product->dimensions)[0] }}
                        </span>
                    </div>
                @endif
                @if(!empty($product->hardware_specs))
                    <div class="flex items-baseline justify-between gap-2">
                        <span class="text-[#8A8C93] uppercase font-mono text-[10px]">Hardware:</span>
                        <span class="text-right text-[#5C5E64] truncate max-w-[190px]" title="{{ $product->hardware_specs }}">
                            {{ explode('&', $product->hardware_specs)[0] }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Action & Viewing Only Strip -->
        <div class="mt-5 pt-3 border-t border-[#E5E1D8] flex items-center justify-between text-xs">
            <span class="text-[10px] font-mono uppercase tracking-wider text-[#8A8C93]">
                Spec Sheet
            </span>

            <a href="{{ route('products.show', $product->slug) }}" 
               class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#141517] group-hover:text-[#FA8231] transition-colors">
                <span>View Details</span>
                <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
            </a>
        </div>
    </div>
</article>
