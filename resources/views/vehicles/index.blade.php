@extends('layouts.app')

@section('title', 'Vehículos - Fisherton Rodados')

@section('content')
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <a href="javascript:history.back()"
                class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-200 hover:bg-gray-300 transition mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-dark" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <circle cx="12" cy="12" r="12" fill="currentColor" class="text-gray-200" />
                    <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-4xl font-bold mb-8" style="
    text-align: center;
">Nuestro Stock Completo</h1>
            <div class="info-bar-minimal">
                <span>¡Consultá por financiación disponible para nuestros vehículos! 🚀</span>
            </div>
            <!-- Filters -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <form method="GET" action="{{ route('vehicles.index') }}"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Categoría -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select name="category" id="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="all">Todas las categorías</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}"
                                    {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Marca -->
                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700">Marca</label>
                        <select name="brand" id="brand"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Todas las marcas</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                    {{ ucfirst($brand) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Modelo -->
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700">Modelo</label>
                        <input type="text" name="model" id="model" placeholder="Ej: Amarok"
                            value="{{ request('model') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <!-- Combustible -->
                    <div>
                        <label for="fuel_type" class="block text-sm font-medium text-gray-700">Combustible</label>
                        <select name="fuel_type" id="fuel_type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="">Todos los combustibles</option>
                            <option value="nafta" {{ request('fuel_type') == 'nafta' ? 'selected' : '' }}>Nafta</option>
                            <option value="diesel" {{ request('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="gnc" {{ request('fuel_type') == 'gnc' ? 'selected' : '' }}>GNC</option>
                            <option value="electrico" {{ request('fuel_type') == 'electrico' ? 'selected' : '' }}>Eléctrico
                            </option>
                        </select>
                    </div>

                    <!-- Año desde y Año hasta -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="year_from" class="block text-sm font-medium text-gray-700">Año desde</label>
                            <input type="number" name="year_from" id="year_from" placeholder="Ej: 2015"
                                value="{{ request('year_from') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label for="year_to" class="block text-sm font-medium text-gray-700">Año hasta</label>
                            <input type="number" name="year_to" id="year_to" placeholder="Ej: 2025"
                                value="{{ request('year_to') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex items-end gap-4">
                        <!-- Botón Buscar -->
                        <button type="submit"
                            class="w-full bg-primary text-white px-3 py-1 rounded-lg hover:bg-primary-dark transition text-sm">
                            Buscar
                        </button>

                        <!-- Botón Limpiar Filtros -->
                        <a href="{{ route('vehicles.index') }}"
                            class="w-full bg-gray-300 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-400 transition text-sm text-center">
                            Limpiar filtros
                        </a>
                    </div>
                </form>
            </div>

            <!-- Vehicles Grid -->
            @if ($vehicles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($vehicles as $vehicle)
                        <a href="{{ route('vehicles.show', $vehicle) }}"
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                            <div class="relative h-64 bg-gray-200 overflow-hidden">
                                <img src="{{ $vehicle->main_image }}"
                                    alt="{{ $vehicle->brand }} {{ $vehicle->model }}"class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                @if ($vehicle->featured)
                                    <div
                                        class="absolute top-4 right-4 bg-primary text-dark px-3 py-1 rounded-full font-bold text-sm">
                                        Destacado
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="text-sm text-gray-500 mb-2">{{ ucfirst($vehicle->category) }}</div>
                                <h3 class="text-2xl font-bold mb-2">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                <p class="text-gray-600 mb-4">{{ $vehicle->year }} • {{ $vehicle->kilometers }} km</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-3xl font-bold text-primary">{{ $vehicle->formatted_price }}</span>
                                    <span class="text-dark font-medium">Ver más →</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $vehicles->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 text-lg">No se encontraron vehículos con los filtros seleccionados</p>
                </div>
            @endif
        </div>
    </section>
@endsection
