<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(3)->get();
        $categories = Category::all();
        $products = Product::with('category')->get();

        return view('layouts.app', compact('services', 'products', 'categories'));
    }
}
