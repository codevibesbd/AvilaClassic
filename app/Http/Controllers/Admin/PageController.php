<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = SitePage::orderBy('id', 'asc')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(SitePage $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, SitePage $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'banner_title' => 'nullable|string|max:255',
            'banner_subtitle' => 'nullable|string|max:255',
            'banner_image' => 'nullable|string|max:500',
            'banner_image_file' => 'nullable|image|max:8192',
            'is_published' => 'nullable|boolean',
            'content_json' => 'nullable|string',
        ]);

        $bannerImagePath = $validated['banner_image'] ?? $page->banner_image;

        if ($request->hasFile('banner_image_file')) {
            $file = $request->file('banner_image_file');
            $fileName = 'page_' . $page->slug . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/pages');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $fileName);
            $bannerImagePath = '/uploads/pages/' . $fileName;
        }

        $content = $page->content;
        if ($request->filled('content_json')) {
            $decoded = json_decode($request->input('content_json'), true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $content = $decoded;
            }
        } elseif ($request->has('content') && is_array($request->input('content'))) {
            $content = $request->input('content');
        }

        $page->update([
            'title' => $validated['title'],
            'meta_title' => $validated['meta_title'] ?? $page->meta_title,
            'meta_description' => $validated['meta_description'] ?? $page->meta_description,
            'banner_title' => $validated['banner_title'] ?? $page->banner_title,
            'banner_subtitle' => $validated['banner_subtitle'] ?? $page->banner_subtitle,
            'banner_image' => $bannerImagePath,
            'content' => $content,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.pages.index')->with('success', "Page '{$page->title}' updated successfully.");
    }
}

