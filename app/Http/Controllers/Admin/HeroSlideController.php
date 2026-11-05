<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order', 'asc')->get();
        return view('admin.hero.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_tag' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:50',
            'spec_text' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'link_url' => 'nullable|string|max:255',
            'link_label' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $validated['image'] ?? '';
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/hero');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = '/uploads/hero/' . $filename;
        }

        HeroSlide::create([
            'title' => $validated['title'],
            'category_tag' => $validated['category_tag'] ?? 'CORE SPECIFICATION',
            'sku' => $validated['sku'] ?? 'AVL-HERO',
            'spec_text' => $validated['spec_text'] ?? '',
            'image' => $imagePath ?: '/images/hero/slide-1-backpack.jpg',
            'link_url' => $validated['link_url'] ?? '/products',
            'link_label' => $validated['link_label'] ?? 'Inspect Technical Blueprint',
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        return view('admin.hero.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_tag' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:50',
            'spec_text' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:10240',
            'link_url' => 'nullable|string|max:255',
            'link_label' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $validated['image'] ?? $heroSlide->image;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/hero');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = '/uploads/hero/' . $filename;
        }

        $heroSlide->update([
            'title' => $validated['title'],
            'category_tag' => $validated['category_tag'] ?? $heroSlide->category_tag,
            'sku' => $validated['sku'] ?? $heroSlide->sku,
            'spec_text' => $validated['spec_text'] ?? $heroSlide->spec_text,
            'image' => $imagePath,
            'link_url' => $validated['link_url'] ?? $heroSlide->link_url,
            'link_label' => $validated['link_label'] ?? $heroSlide->link_label,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Hero slide deleted successfully.');
    }
}
