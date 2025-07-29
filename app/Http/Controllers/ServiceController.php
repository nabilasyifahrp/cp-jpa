<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }


    public function create()
    {
        return view('admin.services.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:50',
            'description'   =>  'required|string',
        ]);

        Service::create($request->all());
        return redirect()->route('service.index')->with('success', 'Service added successfully');
    }


    public function read($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.detail', compact('service'));
    }


    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }


    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title'         => 'required|string|max:50',
            'description'   => 'required|string',
        ]);

        $data = [
            'title'         => $request->title,
            'description'   => $request->description,
        ];

        $service->update($data);
        return redirect()->route('service.read', $service->id)->with('success', 'Service updated successfully');
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
