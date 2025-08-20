<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Partner; // Jangan lupa import model Partner
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
<<<<<<< Updated upstream
        $totalProducts = Product::count();

        return view('admin.dashboard.index', compact('totalServices',  'totalProducts'));
=======
        $totalPartners = Partner::count();

        return view('admin.dashboard.index', compact('totalServices', 'totalPartners'));
>>>>>>> Stashed changes
    }
}
