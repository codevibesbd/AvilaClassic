<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Media::query()->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('file_name', 'like', "%{$search}%");
            });
        }

        $mediaItems = $query->paginate(24)->withQueryString();
        $totalCount = Media::count();

        return view('admin.media.index', compact('mediaItems', 'totalCount', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,webp,svg,gif,pdf|max:16384',
            'name' => 'nullable|string|max:255',
        ]);

        $file = $request->file('file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $cleanName = Str::slug($originalName);
        $fileName = $cleanName . '_' . time() . '.' . $file->getClientOriginalExtension();
        $destination = public_path('uploads/media');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $fileName);
        $publicUrl = '/uploads/media/' . $fileName;

        $media = Media::create([
            'name' => $request->filled('name') ? $request->input('name') : $originalName,
            'file_name' => $fileName,
            'disk' => 'public',
            'path' => 'uploads/media/' . $fileName,
            'url' => $publicUrl,
            'mime_type' => mime_content_type($destination . '/' . $fileName) ?: 'application/octet-stream',
            'size' => filesize($destination . '/' . $fileName),
            'folder' => 'general',
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'media' => $media,
                'url' => $publicUrl,
            ]);
        }

        return redirect()->route('admin.media.index')
            ->with('success', "File '{$fileName}' uploaded successfully.");
    }

    public function destroy(Media $media)
    {
        $filePath = public_path($media->path);
        if (file_exists($filePath)) {
            @unlink($filePath);
        }

        $name = $media->name;
        $media->delete();

        return redirect()->route('admin.media.index')
            ->with('success', "Media '{$name}' deleted.");
    }
}

