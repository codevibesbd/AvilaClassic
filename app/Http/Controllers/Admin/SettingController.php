<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->query('tab', 'general');
        $validTabs = ['general', 'contact', 'header', 'footer', 'seo', 'code'];
        if (!in_array($activeTab, $validTabs)) {
            $activeTab = 'general';
        }

        $allSettings = Setting::all()->groupBy('group');

        return view('admin.settings.index', compact('activeTab', 'allSettings'));
    }

    public function update(Request $request)
    {
        $group = $request->input('group', 'general');

        // Handle file uploads for branding
        if ($request->hasFile('site_logo_file')) {
            $file = $request->file('site_logo_file');
            $fileName = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/branding');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $fileName);
            Setting::set('site_logo', '/uploads/branding/' . $fileName, 'general');
        }

        if ($request->hasFile('site_favicon_file')) {
            $file = $request->file('site_favicon_file');
            $fileName = 'favicon_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/branding');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $fileName);
            Setting::set('site_favicon', '/uploads/branding/' . $fileName, 'general');
        }

        if ($request->hasFile('footer_logo_file')) {
            $file = $request->file('footer_logo_file');
            $fileName = 'footer_logo_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/branding');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $fileName);
            Setting::set('footer_logo', '/uploads/branding/' . $fileName, 'footer');
        }

        $settings = $request->input('settings', []);
        foreach ($settings as $key => $value) {
            Setting::set($key, $value, $group);
        }

        return redirect()->route('admin.settings.index', ['tab' => $group])
            ->with('success', "Settings for '" . ucfirst($group) . "' have been updated and cached.");
    }
}

