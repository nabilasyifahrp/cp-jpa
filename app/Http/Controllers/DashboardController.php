<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalProducts = Product::count();

        return view('admin.dashboard.index', compact('totalServices',  'totalProducts'));
    }
}
