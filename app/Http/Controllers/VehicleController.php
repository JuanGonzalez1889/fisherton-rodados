<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
{
    // Base query: solo vehículos disponibles
    $query = Vehicle::where('available', true);

    // Filtrar por categoría (si existe)
    if ($request->has('category') && $request->category !== 'all') {
        $query->where('category', $request->category);
    }

    // Filtrar por marca
    if ($request->filled('brand')) {
        $query->where('brand', $request->brand);
    }

    // Filtrar por modelo
    if ($request->filled('model')) {
        $query->where('model', 'like', '%' . $request->model . '%');
    }

    // Filtrar por tipo de combustible
    if ($request->filled('fuel_type')) {
        $query->where('fuel_type', $request->fuel_type);
    }

    // Filtrar por rango de años
    if ($request->filled('year_from')) {
        $query->where('year', '>=', $request->year_from);
    }

    if ($request->filled('year_to')) {
        $query->where('year', '<=', $request->year_to);
    }

    // Filtrar por búsqueda general (marca o modelo)
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('brand', 'like', "%{$search}%")
              ->orWhere('model', 'like', "%{$search}%");
        });
    }

    // Obtener vehículos filtrados con paginación
    $vehicles = $query->latest()->paginate(12);

    // Obtener categorías y marcas únicas para los filtros
    $categories = Vehicle::distinct()->pluck('category');
    $brands = Vehicle::distinct()->pluck('brand');

    // Retornar la vista con las variables necesarias
    return view('vehicles.index', compact('vehicles', 'categories', 'brands'));
}
public function show($id)
{
    $vehicle = Vehicle::findOrFail($id);
    return view('vehicles.show', compact('vehicle'));
}
}
