@extends('layouts.app')

@section('title', 'Fisherton Rodados - Tu próximo auto te espera')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative min-h-[70vh] md:min-h-[78vh] flex items-center justify-center overflow-hidden rounded-none md:rounded-xl">
        <!-- Fondo + Overlay degradado -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/12.jpeg') }}" alt="Fisherton Rodados" class="w-full h-full object-cover hero-img" style="
    height: 110%;"/>
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/55 to-black/45"></div>
        </div>

        <!-- Contenido centrado -->
        <div class="relative z-10 w-full max-w-4xl mx-4">
            <div
                class="text-center rounded-2xl ">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-[1.1] tracking-wide text-white">
                    TU PRÓXIMO AUTO <span class="text-[#FFD700]">TE ESPERA AQUÍ</span>
                </h1>
                <p class="mt-3 md:mt-4 text-base md:text-xl text-white/85 font-normal">
                    Encontrá el vehículo perfecto para vos.
                </p>

                <!-- Botones -->
                <div class="mt-7 md:mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('vehicles.index') }}"
                        class="inline-flex items-center justify-center rounded-full bg-[#FFD700] text-black font-semibold px-8 py-3 shadow-[0_8px_24px_rgba(255,215,0,.25)] hover:shadow-[0_12px_28px_rgba(255,215,0,.35)] hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#FFD700]/50 transition">
                        Ver Vehículos
                    </a>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center justify-center rounded-full bg-white text-gray-900 font-semibold px-8 py-3 border border-white/20 shadow-[0_6px_20px_rgba(0,0,0,.15)] hover:bg-white hover:shadow-[0_10px_26px_rgba(0,0,0,.2)] hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-white/40 transition">
                        Contactanos
                    </a>
                </div>

                <!-- Flecha (se mantiene) -->
                <div class="mt-9 md:mt-10">
                    <div class="indicator">
                        <span></span><span></span><span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Calidad Garantizada -->
                <div class="feature-card text-center p-8 bg-white rounded-xl border border-gray-200">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="64px" height="64px"
                            viewBox="0 0 24 24">
                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Calidad Garantizada</h3>
                    <p class="text-gray-600">Todos nuestros vehículos pasan por rigurosas inspecciones</p>
                </div>
                <!-- Mejores Precios -->
                <div class="feature-card text-center p-8 bg-white rounded-xl border border-gray-200">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="64px" height="64px"
                            viewBox="-2.4 -2.4 28.80 28.80" stroke="#000000" stroke-width="0.00024">
                            <path
                                d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Mejores Precios</h3>
                    <p class="text-gray-600">Financiación flexible y planes a tu medida</p>
                </div>
                <!-- Atención Personalizada -->
                <div class="feature-card text-center p-8 bg-white rounded-xl border border-gray-200">
                    <div class="mb-4 flex justify-center">
                        <svg fill="#000000" width="64px" height="64px" viewBox="0 0 512.004 512.004"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M136.425,235.442c0,4.565,1.783,8.849,5.009,12.066l6.033,6.033c8.064,8.055,18.765,12.493,30.165,12.493
                                                                                                c11.401,0,22.11-4.437,30.174-12.493l42.505-42.505c16.836,14.063,37.854,21.717,60.041,21.717h0.043
                                                                                                c25.079-0.017,48.683-9.805,66.441-27.571c3.337-3.336,3.337-8.738,0-12.066c-3.337-3.337-8.73-3.337-12.066,0
                                                                                                c-14.541,14.541-33.86,22.562-54.383,22.571h-0.026c-20.506,0-39.782-7.987-54.281-22.485c-3.337-3.328-8.738-3.328-12.066,0
                                                                                                l-48.282,48.273c-9.66,9.668-26.53,9.668-36.198,0l-6.033-6.033l102.579-102.579c9.566-9.566,18.654-9.566,30.165-9.566
                                                                                                c12.322,0,27.674,0,42.24-14.566l24.132-24.141c3.336-3.336,3.336-8.738,0-12.066c-3.328-3.337-8.73-3.337-12.066,0
                                                                                                l-24.132,24.141c-9.574,9.566-18.662,9.566-30.174,9.566c-12.322,0-27.665,0-42.231,14.566L141.442,223.367
                                                                                                C138.208,226.593,136.425,230.877,136.425,235.442z">
                                        </path>
                                        <path
                                            d="M76.802,93.891c9.412,0,17.067-7.654,17.067-17.067c0-9.412-7.654-17.067-17.067-17.067
                                                                                                c-9.412,0-17.067,7.654-17.067,17.067C59.735,86.237,67.39,93.891,76.802,93.891z">
                                        </path>
                                        <path
                                            d="M159.533,120.797l24.132,24.132c1.672,1.673,3.857,2.5,6.033,2.5c2.185,0,4.369-0.828,6.033-2.5
                                                                                                c3.337-3.328,3.337-8.73,0-12.066l-24.132-24.132c-3.328-3.336-8.73-3.336-12.066,0
                                                                                                C156.205,112.059,156.205,117.46,159.533,120.797z">
                                        </path>
                                        <path
                                            d="M435.202,59.758c9.404,0,17.067-7.654,17.067-17.067c0-9.412-7.663-17.067-17.067-17.067s-17.067,7.654-17.067,17.067
                                                                                                C418.135,52.103,425.798,59.758,435.202,59.758z">
                                        </path>
                                        <path
                                            d="M454.769,181.725c-13.867,13.867-18.628,36.454-23.228,58.3c-4.079,19.388-8.303,39.45-18.577,49.724l-12.075,12.066
                                                                                                c-3.328,3.337-3.328,8.738,0,12.066c1.672,1.673,3.857,2.5,6.042,2.5c2.176,0,4.361-0.828,6.033-2.5l12.066-12.066
                                                                                                c13.858-13.858,18.611-36.437,23.211-58.274c4.087-19.405,8.32-39.467,18.594-49.749c3.337-3.328,3.337-8.73,0-12.066
                                                                                                C463.499,178.388,458.106,178.388,454.769,181.725z">
                                        </path>
                                        <path
                                            d="M509.502,181.725L370.468,42.691l28.1-28.1c3.337-3.337,3.337-8.73,0-12.066c-3.337-3.336-8.73-3.336-12.066,0
                                                                                                l-34.133,34.133c-3.337,3.337-3.337,8.73,0,12.066l145.067,145.067c1.664,1.664,3.849,2.5,6.033,2.5s4.369-0.836,6.033-2.5
                                                                                                C512.838,190.454,512.838,185.061,509.502,181.725z">
                                        </path>
                                        <path d="M316.418,253.541c-3.337-3.328-8.73-3.328-12.066,0c-3.336,3.337-3.336,8.738,0,12.075l90.505,90.505
                                                                                                c6.656,6.656,6.656,17.485,0,24.141c-6.639,6.639-17.476,6.647-24.141,0l-90.505-90.513c-3.337-3.337-8.738-3.337-12.066,0
                                                                                                c-3.337,3.337-3.337,8.738,0,12.066L382.79,416.46c6.656,6.656,6.656,17.485,0,24.132s-17.476,6.665-24.141,0.008
                                                                                                L250.046,331.988c-3.337-3.337-8.738-3.337-12.066,0c-3.337,3.328-3.337,8.73,0,12.066l96.538,96.538
                                                                                                c6.656,6.656,6.656,17.485,0,24.141c-6.451,6.451-17.681,6.451-24.132-0.008l-12.075-12.066h-0.009l-78.43-78.43
                                                                                                c-3.337-3.336-8.738-3.336-12.066,0c-3.336,3.328-3.336,8.73,0,12.066l78.438,78.438c3.226,3.226,5.001,7.509,5.001,12.075
                                                                                                c0,4.557-1.775,8.841-5.001,12.066c-6.639,6.639-17.476,6.656-24.132-0.009L116.969,343.858
                                                                                                c-22.127-22.127-26.931-50.022-31.172-74.641c-3.567-20.71-6.938-40.269-20.028-53.359c-3.337-3.337-8.73-3.337-12.066,0
                                                                                                s-3.337,8.73,0,12.066c9.259,9.259,12.049,25.446,15.275,44.194c4.437,25.771,9.967,57.847,35.925,83.806L250.046,500.94
                                                                                                c6.647,6.647,15.386,9.984,24.132,9.984c8.738-0.009,17.485-3.337,24.132-9.984c4.847-4.855,8.064-10.906,9.361-17.493
                                                                                                c12.51,6.033,28.8,3.482,38.912-6.647c4.855-4.855,8.064-10.914,9.361-17.502c12.689,6.093,28.407,3.866,38.912-6.639
                                                                                                c13.312-13.303,13.312-34.953,0-48.265l-3.234-3.243c5.606-1.493,10.914-4.437,15.309-8.823c13.303-13.312,13.303-34.97,0-48.273
                                                                                                L316.418,253.541z"></path>
                                        <path
                                            d="M159.635,70.791l-51.2-51.2c-3.336-3.337-8.73-3.337-12.066,0c-3.337,3.336-3.337,8.73,0,12.066l45.167,45.167
                                                                                                L2.502,215.858c-3.336,3.337-3.336,8.73,0,12.066c1.664,1.664,3.849,2.5,6.033,2.5s4.369-0.836,6.033-2.5L159.635,82.858
                                                                                                C162.972,79.521,162.972,74.128,159.635,70.791z">
                                        </path>
                                        <path
                                            d="M209.879,493.379c-4.753,2.492-12.868,2.79-20.181-4.506c-7.313-7.322-7.253-15.829-4.881-19.533
                                                                                                c2.355-3.669,1.57-8.516-1.835-11.255c-3.388-2.739-8.294-2.483-11.383,0.614c-6.665,6.656-17.502,6.647-24.141,0
                                                                                                c-6.647-6.656-6.647-17.485,0-24.141c1.673-1.664,2.5-3.849,2.5-6.033s-0.828-4.361-2.5-6.033c-3.328-3.328-8.73-3.328-12.066,0
                                                                                                l-6.033,6.033c-6.647,6.656-17.485,6.656-24.132,0s-6.647-17.485,0-24.132l6.033-6.033c3.038-3.029,3.345-7.842,0.734-11.238
                                                                                                c-2.611-3.396-7.347-4.326-11.042-2.185c-4.642,2.679-12.809,2.364-19.857-4.676c-7.492-7.492-7.458-15.795-5.043-19.294
                                                                                                c2.679-3.874,1.698-9.19-2.176-11.87c-3.883-2.688-9.19-1.707-11.87,2.176c-6.903,10.001-6.716,27.315,7.023,41.054
                                                                                                c5.41,5.402,11.298,8.627,17.101,10.172c-1.946,4.335-2.97,9.071-2.97,13.961c0,9.114,3.55,17.69,10.001,24.132
                                                                                                c8.755,8.764,21.137,11.759,32.375,8.986c0.666,7.731,3.951,15.283,9.856,21.188c8.491,8.482,20.352,11.554,31.292,9.233
                                                                                                c1.058,7.066,4.48,14.464,10.948,20.941c7.893,7.885,17.109,11.042,25.523,11.042c5.402,0,10.47-1.306,14.643-3.49
                                                                                                c4.173-2.185,5.786-7.339,3.593-11.52C219.206,492.807,214.035,491.186,209.879,493.379z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Atención Personalizada</h3>
                    <p class="text-gray-600">Te asesoramos para encontrar el auto perfecto</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Vehicles -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 md:px-12 lg:px-32">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Vehículos Destacados</h2>
                <p class="text-gray-600 text-lg">Descubrí nuestra selección de autos recién ingresados</p>
            </div>

            @if ($featuredVehicles->count() > 0)
                <div class="swiper destacadosSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($featuredVehicles as $vehicle)
                            <div class="swiper-slide">
                                <a href="{{ route('vehicles.show', $vehicle) }}"
                                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition group">
                                    <div class="relative h-64 bg-gray-200 overflow-hidden">
                                        <img src="{{ $vehicle->main_image }}"
                                            alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                        <div
                                            class="absolute top-4 right-4 bg-primary text-dark px-3 py-1 rounded-full font-bold text-sm">
                                            Destacado
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-2xl font-bold mb-2">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $vehicle->year }} •
                                            {{ $vehicle->kilometers }} km</p>
                                        <div class="flex items-center justify-between">
                                            <span
                                                class="text-3xl font-bold text-dark">{{ $vehicle->formatted_price }}</span>
                                            <span class="text-dark font-medium">Ver más →</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('vehicles.index') }}"
                        class="inline-block bg-dark text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-800 transition">
                        Ver Todos los Vehículos
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600 text-lg">Próximamente nuevos vehículos destacados</p>
                </div>
            @endif
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.destacadosSwiper', {
                slidesPerView: 1,
                spaceBetween: 32,
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    1280: {
                        slidesPerView: 3
                    }
                },
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
    <!-- Opiniones de nuestros clientes -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-2 md:px-6">
            <h2 class="text-3xl font-bold text-center mb-8 mt-4 md:mt-0 md:mb-8">Opiniones de nuestros clientes</h2>
            <div class="flex flex-col lg:flex-row gap-6 items-start justify-center">
                <!-- Card Fisherton Rodados (más ancha) -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center w-full max-w-md self-start mx-auto mb-6 lg:mb-0">
                    <h3 class="font-bold text-2xl mb-1 text-center">Fisherton Rodados</h3>
                    <div class="flex items-center mb-1">
                        <span class="text-yellow-500 text-2xl">★★★★☆</span>
                        <span class="ml-2 text-gray-700 text-lg">4.4</span>
                    </div>
                    <span class="text-gray-600 text-base mb-2 text-center">58 opiniones en Google</span>
                    <button
                        onclick="window.open('https://www.google.com/search?sca_esv=b82477915abf7e02&sxsrf=AE3TifOuBqA21QbdyuZ7FUo3if4UGwdeuw:1763001490407&si=AMgyJEuzsz2NflaaWzrzdpjxXXRaJ2hfdMsbe_mSWso6src8s8wW-WqJS8ZqHT3BbElm9H_5Ywg0qDbF8GR_h505jigL0cUwVRNFt_CbjnkLhduFyZe8CoLnakoP7AF06aNZZWK93C9nAYHl0PWjgcD56l6x2lv9EA%3D%3D&q=Fisherton+Rodados+Opiniones&sa=X&ved=2ahUKEwij48usjO6QAxW3D7kGHRDBGNUQ0bkNegQIORAD&biw=1707&bih=811&dpr=1.13#lrd=0x95b652ce38f321e3:0xd2a33ac9cd91a776,3,,,,', '_blank')"
                        class="bg-blue-500 text-white px-5 py-3 rounded hover:bg-blue-600 transition text-base mt-2">
                        Escribe una reseña
                    </button>
                </div>
                <!-- Carrusel de reseñas -->
                <div class="w-full flex-1 min-h-[220px] flex items-center">
                    <div class="swiper mySwiper w-full">
                        <div class="swiper-wrapper">
                            <!-- Débora Belén Potenza -->
                            <div
                                class="swiper-slide bg-white p-4 rounded-lg shadow-md mx-2 mb-4 h-[180px] flex flex-col justify-between overflow-hidden">
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjX2MTAjpuDI09H47UIRxd0iaF4xhQH8hGfaEzSRxmkVtICFsiOSyg=s64-c-rp-mo-ba2-br100"
                                        alt="Débora Belén Potenza" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-bold text-base">Débora Belén Potenza</h3>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-yellow-500 text-base">★★★★★</span>
                                </div>
                                <p class="text-gray-700 text-base">Excelente todo. Calidad humana del Dueño a destacar 🤩
                                </p>
                            </div>
                            <!-- Jorge Grivetto -->
                            <div
                                class="swiper-slide bg-white p-4 rounded-lg shadow-md mx-2 mb-4 h-[180px] flex flex-col justify-between overflow-hidden">
                                <!-- contenido de la reseña -->
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://lh3.googleusercontent.com/a/ACg8ocJ45p8sJHx0zO9c4sMslhoVYTS_A3npYyTpuzBw-mhTAAWY=s64-c-rp-mo-ba2-br100"
                                        alt="Jorge Grivetto" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-bold text-base">Jorge Grivetto</h3>
                                        <span class="text-sm text-gray-500">Local Guide · 19 opiniones</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-yellow-500 text-base">★★★★★</span>
                                    <span class="text-xs text-gray-500">Hace 5 años</span>
                                </div>
                                <p class="text-gray-700 text-base">Muy buena atención y te ofrecen todas las posibilidades
                                    que estén a su alcance para que puedas comprar tu automóvil</p>
                            </div>
                            <!-- Matías Malamud -->
                            <div
                                class="swiper-slide bg-white p-4 rounded-lg shadow-md mx-2 mb-4 h-[180px] flex flex-col justify-between overflow-hidden">
                                <!-- contenido de la reseña -->
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjWEPgH4EwudK7tBtiRAIquwEGMIcAnqgu1GqFoSaaYjZQ9e7rM=s64-c-rp-mo-ba4-br100"
                                        alt="Matías Malamud" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-bold text-base">Matías Malamud</h3>
                                        <span class="text-sm text-gray-500">Local Guide · 155 opiniones · 61 fotos</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-yellow-500 text-base">★★★★★</span>
                                    <span class="text-xs text-gray-500">Hace 4 años</span>
                                </div>
                                <p class="text-gray-700 text-base">Muy buena atención y asesoramiento, gente seria en el
                                    rubro.</p>
                            </div>
                            <!-- Guillermo Doctorovich -->
                            <div
                                class="swiper-slide bg-white p-4 rounded-lg shadow-md mx-2 mb-4 h-[180px] flex flex-col justify-between overflow-hidden">
                                <!-- contenido de la reseña -->
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://lh3.googleusercontent.com/a/ACg8ocJq62xARmBtcmb8JcbC4JK64eYIZqNetvi6cYK7HaZZryBPbw=s64-c-rp-mo-ba5-br100"
                                        alt="Guillermo Doctorovich" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-bold text-base">Guillermo Doctorovich</h3>
                                        <span class="text-sm text-gray-500">Local Guide · 141 opiniones · 728 fotos</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-yellow-500 text-base">★★★★★</span>
                                    <span class="text-xs text-gray-500">Editado Hace 3 años</span>
                                </div>
                                <p class="text-gray-700 text-base">Excelente atención y responsabilidad a la hora de
                                    resolver inconvenientes, muy buenos precios y surtido de autos.<br>Muy recomendable</p>
                            </div>
                            <!-- Hector Acevedo -->
                            <div
                                class="swiper-slide bg-white p-4 rounded-lg shadow-md mx-2 mb-4 h-[180px] flex flex-col justify-between overflow-hidden">
                                <!-- contenido de la reseña -->
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://lh3.googleusercontent.com/a-/ALV-UjVNGmkT0Zo5x-J3CjKMb0CHd-OyE1zEW1DUeU3FbrxDWC3ghRk=s64-c-rp-mo-br100"
                                        alt="Hector Acevedo" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h3 class="font-bold text-base">HECTOR ACEVEDO</h3>
                                        <span class="text-sm text-gray-500">3 opiniones</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-yellow-500 text-base">★★★★★</span>
                                    <span class="text-xs text-gray-500">Hace 2 años</span>
                                </div>
                                <p class="text-gray-700 text-base">Excelente atención y muy buenos precios !!!</p>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.mySwiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    1280: {
                        slidesPerView: 3
                    }
                },
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                // NO pongas autoHeight
            });
        });
    </script>

    <!-- Why Choose Us -->


    <section class="bg-primary py-16">
        <div class="max-w-6xl mx-auto px-4 md:px-12 lg:px-32 flex flex-col md:flex-row items-center justify-center gap-12">
            <!-- Mapa -->
            <div class="w-full md:w-1/2 flex justify-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3348.380355085405!2d-60.73327700000001!3d-32.940966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b652ce38f321e3%3A0xd2a33ac9cd91a776!2sFisherton%20Rodados!5e0!3m2!1ses!2sar!4v1762998104073!5m2!1ses!2sar"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- Datos de contacto -->
            <div class="w-full md:w-1/2 max-w-lg mx-auto rounded-lg">
                <h2 class="text-3xl font-bold text-dark mb-4">Nuestra Ubicación</h2>
                <p class="mb-6 text-gray-700">Visítanos en nuestro local. Estamos ubicados en una zona de fácil acceso
                    sobre una avenida, en Rosario, Santa Fe, Argentina.</p>
                <ul class="space-y-6 text-lg">
                    <li class="flex items-start gap-3">
                        <!-- Dirección SVG -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-map-pin h-5 w-5 text-dark">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </span>
                        <span>
                            <span class="font-bold text-dark">Dirección:</span><br>
                            Mendoza 8021, Rosario, Santa Fe, Argentina
                        </span>
                    </li>
                    <li class="flex items-start gap-3">
                        <!-- Horario SVG -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-clock h-5 w-5 text-dark">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </span>
                        <span>
                            <span class="font-bold text-dark">Horarios de Atención:</span><br>
                            Lunes a Viernes: 8:00 - 18:00<br>
                            Sábados: 8:00 - 13:00<br>
                        </span>
                    </li>
                    <li class="flex items-start gap-3">
                        <!-- Contacto SVG -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-phone h-5 w-5 text-dark">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </span>
                        <span>
                            <span class="font-bold text-dark">Contacto Directo:</span><br>
                            📞 (0341) 55119372<br>
                            📱 WhatsApp: +54 9 341 511-9372<br>
                            ✉️ Fishertonrodados@hotmail.com
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    {{-- <section class="bg-primary py-16">
        <div class="container mx-auto px-4 text-center max-w-xl">
            <h2 class="text-4xl font-bold text-dark mb-6">¿Listo para tu próximo auto?</h2>
            <p class="text-xl text-gray-800 mb-8">Contactanos hoy y encontrá el vehículo ideal</p>
            @if (session('success'))
                <div id="success-message"
                    class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded px-4 py-2">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        var msg = document.getElementById('success-message');
                        if (msg) {
                            msg.style.display = 'none';
                        }
                    }, 10000); // 10 segundos
                </script>
            @endif
            <form method="POST" action="{{ route('contact.send') }}"
                class="bg-white rounded-lg shadow-md p-8 text-left mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-dark font-bold mb-2">Nombre</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-dark font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-dark font-bold mb-2">Mensaje</label>
                    <textarea name="message" id="message" rows="4" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                </div>
                <button type="submit"
                    class="bg-dark text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-800 transition w-full">
                    Enviar Consulta
                </button>
            </form>
        </div>
    </section>
     --}}
@endsection
