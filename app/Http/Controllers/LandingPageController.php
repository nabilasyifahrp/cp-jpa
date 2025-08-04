<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() 
    {
        $services = Service::latest()->take(3)->get();
        return view('layouts.app', compact('services'));
    }
}
