<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index(Request $request)
    {
        $headerItems = MenuItem::where('location', 'header')->orderBy('sort_order', 'asc')->get();
        $footerEnterprise = MenuItem::where('location', 'footer_enterprise')->orderBy('sort_order', 'asc')->get();
        $footerDisciplines = MenuItem::where('location', 'footer_disciplines')->orderBy('sort_order', 'asc')->get();

        return view('admin.navigation.index', compact('headerItems', 'footerEnterprise', 'footerDisciplines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|in:header,footer_enterprise,footer_disciplines',
            'label' => 'required|string|max:100',
            'url' => 'required|string|max:255',
            'target' => 'nullable|string|in:_self,_blank',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $maxOrder = MenuItem::where('location', $validated['location'])->max('sort_order') ?? 0;
        $sortOrder = $validated['sort_order'] ?? ($maxOrder + 1);

        MenuItem::create([
            'location' => $validated['location'],
            'label' => $validated['label'],
            'url' => $validated['url'],
            'target' => $validated['target'] ?? '_self',
            'sort_order' => $sortOrder,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.navigation.index')
            ->with('success', "Navigation item '{$validated['label']}' added.");
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:100',
            'url' => 'required|string|max:255',
            'target' => 'nullable|string|in:_self,_blank',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $menuItem->update([
            'label' => $validated['label'],
            'url' => $validated['url'],
            'target' => $validated['target'] ?? '_self',
            'sort_order' => $validated['sort_order'] ?? $menuItem->sort_order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.navigation.index')
            ->with('success', "Navigation item '{$menuItem->label}' updated.");
    }

    public function destroy(MenuItem $menuItem)
    {
        $label = $menuItem->label;
        $menuItem->delete();

        return redirect()->route('admin.navigation.index')
            ->with('success', "Navigation item '{$label}' removed.");
    }
}

