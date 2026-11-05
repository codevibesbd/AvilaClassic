<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $ledger = HomepageSection::getByKey('ledger_stats');
        $materials = HomepageSection::getByKey('materials_archive');
        $quality = HomepageSection::getByKey('quality_gates');
        $steps = HomepageSection::getByKey('sourcing_steps');

        return view('admin.homepage.index', compact('ledger', 'materials', 'quality', 'steps'));
    }

    public function update(Request $request, string $section)
    {
        return match ($section) {
            'hero' => $this->updateHeroIntro($request),
            'ledger' => $this->updateLedger($request),
            'materials' => $this->updateMaterials($request),
            'quality' => $this->updateQualityGates($request),
            'steps' => $this->updateSourcingSteps($request),
            default => redirect()->route('admin.homepage.index'),
        };
    }

    public function updateHeroIntro(Request $request)
    {
        $validated = $request->validate([
            'hero_badge' => 'required|string|max:255',
            'hero_headline' => 'required|string|max:255',
            'hero_headline_highlight' => 'required|string|max:255',
            'hero_copy' => 'required|string',
            'hero_cta_primary_label' => 'required|string|max:100',
            'hero_cta_primary_url' => 'required|string|max:255',
            'hero_cta_secondary_label' => 'required|string|max:100',
            'hero_cta_secondary_url' => 'required|string|max:255',
        ]);

        foreach ($validated as $key => $val) {
            Setting::set($key, $val, 'homepage');
        }

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Homepage Hero introduction text updated successfully.');
    }

    public function updateLedger(Request $request)
    {
        $section = HomepageSection::firstOrCreate(['section_key' => 'ledger_stats']);

        $labels = $request->input('label', []);
        $values = $request->input('value', []);
        $units = $request->input('unit', []);
        $descriptions = $request->input('description', []);

        $items = [];
        foreach ($labels as $idx => $label) {
            if (! empty($label)) {
                $items[] = [
                    'label' => $label,
                    'value' => $values[$idx] ?? '',
                    'unit' => $units[$idx] ?? '',
                    'description' => $descriptions[$idx] ?? '',
                ];
            }
        }

        $section->update([
            'content' => $items,
            'is_enabled' => $request->boolean('is_enabled', true),
        ]);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Operational Ledger statistics updated successfully.');
    }

    public function updateMaterials(Request $request)
    {
        $section = HomepageSection::firstOrCreate(['section_key' => 'materials_archive']);

        $tags = $request->input('tag', []);
        $sources = $request->input('source', []);
        $names = $request->input('name', []);
        $descriptions = $request->input('description', []);
        $metrics = $request->input('metric', []);

        $items = [];
        foreach ($names as $idx => $name) {
            if (! empty($name)) {
                $items[] = [
                    'tag' => $tags[$idx] ?? '',
                    'source' => $sources[$idx] ?? '',
                    'name' => $name,
                    'description' => $descriptions[$idx] ?? '',
                    'metric' => $metrics[$idx] ?? '',
                ];
            }
        }

        $section->update([
            'title' => $request->input('title', 'The Materials We Trust'),
            'subtitle' => $request->input('subtitle', 'Textile & Component Standards'),
            'description' => $request->input('section_description'),
            'content' => $items,
            'is_enabled' => $request->boolean('is_enabled', true),
        ]);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Materials Archive updated successfully.');
    }

    public function updateQualityGates(Request $request)
    {
        $section = HomepageSection::firstOrCreate(['section_key' => 'quality_gates']);

        $codes = $request->input('code', []);
        $titles = $request->input('title', []);
        $descriptions = $request->input('description', []);

        $items = [];
        foreach ($titles as $idx => $title) {
            if (! empty($title)) {
                $items[] = [
                    'code' => $codes[$idx] ?? '',
                    'title' => $title,
                    'description' => $descriptions[$idx] ?? '',
                ];
            }
        }

        $section->update([
            'title' => $request->input('heading', 'Built by hand. Audited by machines.'),
            'subtitle' => $request->input('subtitle', 'Factory Floor Standards'),
            'description' => $request->input('narrative'),
            'content' => $items,
            'is_enabled' => $request->boolean('is_enabled', true),
        ]);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Quality Testing Gates updated successfully.');
    }

    public function updateSourcingSteps(Request $request)
    {
        $section = HomepageSection::firstOrCreate(['section_key' => 'sourcing_steps']);

        $steps = $request->input('step', []);
        $titles = $request->input('title', []);
        $descriptions = $request->input('description', []);

        $items = [];
        foreach ($titles as $idx => $title) {
            if (! empty($title)) {
                $items[] = [
                    'step' => $steps[$idx] ?? '',
                    'title' => $title,
                    'description' => $descriptions[$idx] ?? '',
                ];
            }
        }

        $section->update([
            'title' => $request->input('heading', 'From Technical Sketch to U.S. Stock Delivery'),
            'subtitle' => $request->input('subtitle', 'Direct Sourcing & Wholesale Protocol'),
            'content' => $items,
            'is_enabled' => $request->boolean('is_enabled', true),
        ]);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Direct Sourcing Protocol steps updated successfully.');
    }
}
