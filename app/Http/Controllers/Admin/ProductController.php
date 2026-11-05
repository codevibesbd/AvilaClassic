<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');
        $featured = $request->query('featured');

        $query = Product::query();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        if (! empty($search)) {
            $query->search($search);
        }

        if ($featured !== null && $featured !== '') {
            $query->where('is_featured', (bool) $featured);
        }

        $products = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        $categories = [
            'backpacks' => 'Backpacks & Daypacks',
            'luggage' => 'Luggage & Trolleys',
            'duffle' => 'Duffle & Travel Gear',
            'briefcases' => 'Briefcases & Organizers',
            'totes' => 'Totes & Eco-Shoppers',
            'accessories' => 'Lifestyle & Accessories',
        ];

        return view('admin.products.index', compact('products', 'categories', 'category', 'search', 'featured'));
    }

    public function create()
    {
        $categories = [
            'backpacks' => 'Backpacks & Daypacks',
            'luggage' => 'Luggage & Trolleys',
            'duffle' => 'Duffle & Travel Gear',
            'briefcases' => 'Briefcases & Organizers',
            'totes' => 'Totes & Eco-Shoppers',
            'accessories' => 'Lifestyle & Accessories',
        ];

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku',
            'category' => 'required|string|max:50',
            'tagline' => 'nullable|string|max:255',
            'summary' => 'required|string|max:1000',
            'description' => 'required|string',
            'primary_material' => 'required|string|max:255',
            'lining_material' => 'nullable|string|max:255',
            'hardware_specs' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:100',
            'dimensions' => 'nullable|string|max:100',
            'weight' => 'nullable|string|max:100',
            'primary_image' => 'nullable|string',
            'primary_image_file' => 'nullable|image|max:10240',
            'gallery_images_text' => 'nullable|string',
            'features_text' => 'nullable|string',
            'certifications_text' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_sustainable' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $slug = Str::slug($validated['title']);
        $count = Product::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $categoryNames = [
            'backpacks' => 'Backpacks & Daypacks',
            'luggage' => 'Luggage & Trolleys',
            'duffle' => 'Duffle & Travel Gear',
            'briefcases' => 'Briefcases & Organizers',
            'totes' => 'Totes & Eco-Shoppers',
            'accessories' => 'Lifestyle & Accessories',
        ];

        $primaryImage = $validated['primary_image'] ?? '';
        if ($request->hasFile('primary_image_file')) {
            $file = $request->file('primary_image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/products');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $primaryImage = '/uploads/products/' . $filename;
        }

        // Parse features, certifications, gallery
        $features = ! empty($validated['features_text'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['features_text']))))
            : [];

        $certifications = ! empty($validated['certifications_text'])
            ? array_values(array_filter(array_map('trim', explode(',', $validated['certifications_text']))))
            : [];

        $gallery = ! empty($validated['gallery_images_text'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['gallery_images_text']))))
            : [];

        // Colors
        $colors = [];
        if ($request->has('color_names') && is_array($request->input('color_names'))) {
            $names = $request->input('color_names');
            $hexes = $request->input('color_hexes');
            foreach ($names as $idx => $n) {
                if (! empty($n)) {
                    $colors[] = [
                        'name' => trim($n),
                        'hex' => $hexes[$idx] ?? '#000000',
                    ];
                }
            }
        }

        Product::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'sku' => strtoupper($validated['sku']),
            'category' => $validated['category'],
            'category_name' => $categoryNames[$validated['category']] ?? ucfirst($validated['category']),
            'tagline' => $validated['tagline'] ?? null,
            'summary' => $validated['summary'],
            'description' => $validated['description'],
            'primary_material' => $validated['primary_material'],
            'lining_material' => $validated['lining_material'] ?? null,
            'hardware_specs' => $validated['hardware_specs'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'dimensions' => $validated['dimensions'] ?? null,
            'weight' => $validated['weight'] ?? null,
            'primary_image' => $primaryImage ?: 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=1200&q=80',
            'gallery_images' => $gallery,
            'features' => $features,
            'certifications' => $certifications,
            'color_options' => $colors,
            'is_featured' => $request->boolean('is_featured'),
            'is_sustainable' => $request->boolean('is_sustainable'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product specification record created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = [
            'backpacks' => 'Backpacks & Daypacks',
            'luggage' => 'Luggage & Trolleys',
            'duffle' => 'Duffle & Travel Gear',
            'briefcases' => 'Briefcases & Organizers',
            'totes' => 'Totes & Eco-Shoppers',
            'accessories' => 'Lifestyle & Accessories',
        ];

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku,' . $product->id,
            'category' => 'required|string|max:50',
            'tagline' => 'nullable|string|max:255',
            'summary' => 'required|string|max:1000',
            'description' => 'required|string',
            'primary_material' => 'required|string|max:255',
            'lining_material' => 'nullable|string|max:255',
            'hardware_specs' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:100',
            'dimensions' => 'nullable|string|max:100',
            'weight' => 'nullable|string|max:100',
            'primary_image' => 'nullable|string',
            'primary_image_file' => 'nullable|image|max:10240',
            'gallery_images_text' => 'nullable|string',
            'features_text' => 'nullable|string',
            'certifications_text' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_sustainable' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $categoryNames = [
            'backpacks' => 'Backpacks & Daypacks',
            'luggage' => 'Luggage & Trolleys',
            'duffle' => 'Duffle & Travel Gear',
            'briefcases' => 'Briefcases & Organizers',
            'totes' => 'Totes & Eco-Shoppers',
            'accessories' => 'Lifestyle & Accessories',
        ];

        $primaryImage = $validated['primary_image'] ?? $product->primary_image;
        if ($request->hasFile('primary_image_file')) {
            $file = $request->file('primary_image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/products');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $primaryImage = '/uploads/products/' . $filename;
        }

        $features = ! empty($validated['features_text'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['features_text']))))
            : [];

        $certifications = ! empty($validated['certifications_text'])
            ? array_values(array_filter(array_map('trim', explode(',', $validated['certifications_text']))))
            : [];

        $gallery = ! empty($validated['gallery_images_text'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['gallery_images_text']))))
            : [];

        $colors = [];
        if ($request->has('color_names') && is_array($request->input('color_names'))) {
            $names = $request->input('color_names');
            $hexes = $request->input('color_hexes');
            foreach ($names as $idx => $n) {
                if (! empty($n)) {
                    $colors[] = [
                        'name' => trim($n),
                        'hex' => $hexes[$idx] ?? '#000000',
                    ];
                }
            }
        }

        $product->update([
            'title' => $validated['title'],
            'sku' => strtoupper($validated['sku']),
            'category' => $validated['category'],
            'category_name' => $categoryNames[$validated['category']] ?? ucfirst($validated['category']),
            'tagline' => $validated['tagline'] ?? null,
            'summary' => $validated['summary'],
            'description' => $validated['description'],
            'primary_material' => $validated['primary_material'],
            'lining_material' => $validated['lining_material'] ?? null,
            'hardware_specs' => $validated['hardware_specs'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'dimensions' => $validated['dimensions'] ?? null,
            'weight' => $validated['weight'] ?? null,
            'primary_image' => $primaryImage,
            'gallery_images' => $gallery,
            'features' => $features,
            'certifications' => $certifications,
            'color_options' => $colors,
            'is_featured' => $request->boolean('is_featured'),
            'is_sustainable' => $request->boolean('is_sustainable'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product specification updated successfully.');
    }

    public function destroy(Product $product)
    {
        $title = $product->title;
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', "Product '{$title}' removed from catalog.");
    }
}
