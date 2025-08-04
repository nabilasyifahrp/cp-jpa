<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class DetailServiceController extends Controller
{
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('section.detail-service', compact('service'));
    }
}
