{{-- filepath: c:\Users\Juan Gonzalez\Desktop\FRodados\agencia-autos\resources\views\vehicles\show.blade.php --}}
@extends('layouts.app')

@section('title', $vehicle->brand . ' ' . $vehicle->model . ' - Fisherton Rodados')

@section('content')
    <section class="py-12">
        <div class="container mx-auto px-4">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- Images -->
                <div>
                    <a href="javascript:history.back()"
                        class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-200 hover:bg-gray-300 transition mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-dark" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <circle cx="12" cy="12" r="12" fill="currentColor" class="text-gray-200" />
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    @php
                        $vehicleImages = $vehicle->vehicleImages ?? collect();
                    @endphp
                    @if ($vehicleImages->count() > 0)
                        <div class="mb-4 bg-gray-50 rounded-lg p-2 flex items-center justify-center relative cursor-zoom-in"
                            style="min-height: 300px; max-height: 600px;" id="imageContainer" onclick="toggleZoom(event)">
                            <img id="mainVehicleImage" src="{{ $vehicle->main_image }}"
                                alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                class="max-w-full max-h-full object-contain rounded-lg shadow-lg transition-all duration-300"
                                onload="adjustImageSize(this)">
                            <svg class="absolute top-2 right-2 md:top-4 md:right-4 w-6 h-6 md:w-8 md:h-8 text-gray-400 hover:text-gray-600 transition pointer-events-none"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="10" cy="10" r="6" stroke-width="2" />
                                <path stroke-width="2" d="M14 14l4 4" />
                            </svg>
                        </div>
                        @if ($vehicleImages->count() > 1)
                            <div class="grid grid-cols-4 gap-2">
                                @foreach ($vehicleImages as $image)
                                    <div class="bg-gray-50 rounded-lg p-2 h-24">
                                        <img src="{{ asset('storage/' . $image->url) }}"
                                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                            class="w-full h-full object-cover rounded-lg cursor-pointer hover:opacity-75 transition"
                                            onclick="document.getElementById('mainVehicleImage').src='{{ asset('storage/' . $image->url) }}'; resetZoom();">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @else
                        <img src="{{ asset('images/placeholder-car.jpg') }}"
                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                            class="w-full h-96 object-cover rounded-lg shadow-lg">
                    @endif
                </div>
                @php
                    $whatsappNumber = '5493415119372';
                    $whatsappNumber2 = '5493417073969'; // Cambia por tu número de WhatsApp
                    $waMessage =
                        'Hola, estoy interesado en este vehiculo que vi en la web:%0A' .
                        strtoupper($vehicle->brand . ' ' . $vehicle->model . ' ' . $vehicle->year) .
                        '%0A' .
                        'PRECIO: ' .
                        $vehicle->formatted_price .
                        '%0A%0A' .
                        'Quisiera más información....';
                    $waUrl = "https://wa.me/{$whatsappNumber}?text={$waMessage}";
                    $waUrl2 = "https://wa.me/{$whatsappNumber2}?text={$waMessage}";
                @endphp


                <!-- Details -->
                <div>
                    <div class="mb-4">
                        <span
                            class="bg-primary text-dark px-3 py-1 rounded-full font-bold text-sm">{{ ucfirst($vehicle->category) }}</span>
                    </div>

                    <h1 class="text-4xl font-bold mb-4">{{ $vehicle->brand }} {{ $vehicle->model }}</h1>

                    <div class="text-5xl font-bold text-dark mb-8">{{ $vehicle->formatted_price }}</div>

                    <!-- Specs -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-bold mb-4">Especificaciones</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-gray-600 text-sm">Año</div>
                                <div class="font-bold">{{ $vehicle->year }}</div>
                            </div>
                            <div>
                                <div class="text-gray-600 text-sm">Kilómetros</div>
                                <div class="font-bold">{{ $vehicle->kilometers }} km</div>
                            </div>
                            <div>
                                <div class="text-gray-600 text-sm">Combustible</div>
                                <div class="font-bold">{{ ucfirst($vehicle->fuel_type) }}</div>
                            </div>
                            <div>
                                <div class="text-gray-600 text-sm">Transmisión</div>
                                <div class="font-bold">{{ ucfirst($vehicle->transmission) }}</div>
                            </div>
                            @if ($vehicle->color)
                                <div>
                                    <div class="text-gray-600 text-sm">Color</div>
                                    <div class="font-bold">{{ $vehicle->color }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <a href="{{ $waUrl }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-lg font-bold text-lg hover:bg-green-600 transition mb-6">
                        <img src="{{ asset('images/whatsapp.gif') }}" alt="WhatsApp" class="w-7 h-7" />
                        Consultar a Flavio
                    </a>
                    <a href="{{ $waUrl2 }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-lg font-bold text-lg hover:bg-green-600 transition mb-6">
                        <img src="{{ asset('images/whatsapp.gif') }}" alt="WhatsApp" class="w-7 h-7" />
                        Consultar a Andrés
                    </a>
                    @if ($vehicle->description)
                        <div class="mb-8 description">
                            <h2 class="text-2xl font-bold mb-4">Descripción</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $vehicle->description }}</p>
                        </div>
                    @endif

                    {{-- Mostrar mensaje de éxito --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                            role="alert">
                            <strong class="font-bold">¡Perfecto!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Contact Form -->
                    <div class="bg-primary rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4 text-dark">¿Te interesa este vehículo?</h2>
                        <h1>Dejá tus datos y te llamamos</h1>
                        <form method="POST" action="{{ route('leads.store') }}" class="space-y-4">
                            @csrf
                            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                            <input type="text" name="name" placeholder="Tu nombre" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-dark">

                            <input type="email" name="email" placeholder="Tu email" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-dark">

                            <input type="tel" name="phone" placeholder="Tu teléfono" required
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-dark">

                            <textarea name="message" placeholder="Mensaje (opcional)" rows="3"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-dark"></textarea>

                            <button type="submit"
                                class="w-full bg-dark text-white px-6 py-4 rounded-lg font-bold text-lg hover:bg-gray-800 transition">
                                Enviar Consulta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .max-w-vertical {
            max-width: 50% !important;
        }
    </style>
    <script>
let isZoomed = false;

function adjustImageSize(img) {
    const container = document.getElementById('imageContainer');
    img.classList.remove('max-w-vertical');
    if (img.naturalHeight > img.naturalWidth) {
        // Imagen vertical
        container.style.maxHeight = '550px';
        img.classList.add('max-w-vertical');
    } else {
        // Imagen horizontal
        container.style.maxHeight = '600px';
    }
}

function toggleZoom(event) {
    const img = document.getElementById('mainVehicleImage');
    const container = document.getElementById('imageContainer');

    if (!isZoomed) {
        img.style.transform = 'scale(2)';
        img.style.cursor = 'zoom-out';
        container.style.overflow = 'auto';
        isZoomed = true;
    } else {
        resetZoom();
    }
}

function resetZoom() {
    const img = document.getElementById('mainVehicleImage');
    const container = document.getElementById('imageContainer');
    img.style.transform = 'scale(1)';
    img.style.cursor = 'zoom-in';
    container.style.overflow = 'hidden';
    isZoomed = false;
}
</script>
@endsection
