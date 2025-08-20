<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $partners = Partner::all();
    return view('admin.partner.index', compact('partners'));
}

public function create()
{
    return view('admin.partner.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'description' => 'nullable',
    ]);

    $data = $request->only(['name', 'description']);

    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('partners', 'public');
    }

    Partner::create($data);

    return redirect()->route('admin.partners.index')->with('success', 'Partner successfully added.');
}

public function show(Partner $partner)
{
    return view('admin.partner.show', compact('partner'));
}

public function edit(Partner $partner)
{
    return view('admin.partner.edit', compact('partner'));
}

public function update(Request $request, Partner $partner)
{
    $request->validate([
        'name' => 'required',
        'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'description' => 'nullable',
    ]);

    $data = $request->only(['name', 'description']);

    if ($request->hasFile('logo')) {
        if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
            Storage::disk('public')->delete($partner->logo);
        }
        $data['logo'] = $request->file('logo')->store('partners', 'public');
    }

    $partner->update($data);

    return redirect()->route('admin.partners.index')->with('success', 'Partner successfully updated.');
}

public function destroy(Partner $partner)
{
    if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
        Storage::disk('public')->delete($partner->logo);
    }

    $partner->delete();

    return redirect()->route('admin.partners.index')->with('success', 'The partner was successfully deleted.');
}

}
