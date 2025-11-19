<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredVehicles = Vehicle::with(['vehicleImages' => function ($query) {
            $query->where('is_main', true)->orWhere(function ($q) {
                $q->whereNull('is_main')->orWhere('is_main', false);
            })->orderByDesc('is_main')->limit(1);
        }])
            ->where('available', true)
            ->where('featured', true)
            ->latest()
            ->limit(6)
            ->get();

        return view('home', compact('featuredVehicles'));
    }
}
