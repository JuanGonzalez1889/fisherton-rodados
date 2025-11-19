<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fisherton Rodados - Tu próximo auto te espera')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#fef006',
                        secondary: '#E91E63',
                        dark: '#1a1a1a',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-white text-gray-900">
    <!-- Header -->
    <header class="bg-primary shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-4 md:px-12 lg:px-32 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('images/logo2.jpg') }}" alt="Fisherton Rodados" class="h-12">
                </a>

                <!-- Menú hamburguesa (solo mobile) -->
                <button class="md:hidden text-dark focus:outline-none"
                    onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                    </svg>
                </button>

                <!-- Menú centrado (desktop) -->
                <div class="hidden md:flex flex-1 justify-end">
                    <div class="flex items-center gap-8">
                        <a href="{{ route('home') }}"
                            class="text-dark hover:text-gray-700 font-bold transition pb-1 border-b-4
                        @if (request()->routeIs('home')) border-secondary @else border-transparent @endif">
                            Inicio
                        </a>
                        <a href="{{ route('vehicles.index') }}"
                            class="text-dark hover:text-gray-700 font-bold transition pb-1 border-b-4
                        @if (request()->routeIs('vehicles.index')) border-secondary @else border-transparent @endif">
                            Vehículos
                        </a>
                        <a href="{{ route('about') }}"
                            class="text-dark hover:text-gray-700 font-bold transition pb-1 border-b-4
                        @if (request()->routeIs('about')) border-secondary @else border-transparent @endif">
                            Nosotros
                        </a>
                        <a href="{{ route('contact') }}"
                            class="text-dark hover:text-gray-700 font-bold transition pb-1 border-b-4
                        @if (request()->routeIs('contact')) border-secondary @else border-transparent @endif">
                            Contacto
                        </a>
                        <!-- Botón WhatsApp (desktop) -->
                        <a href="https://wa.me/5493415119372" target="_blank"
                            class="hidden md:inline-block bg-dark text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-bold flex-shrink-0">
                            WhatsApp
                        </a>
                    </div>
                </div>


            </div>

            <!-- Menú mobile -->
            <div id="mobileMenu" class="md:hidden hidden mt-4">
                <div class="flex flex-col gap-4">
                    <a href="{{ route('home') }}"
                        class="text-dark font-bold transition pb-1 border-b-4
                    @if (request()->routeIs('home')) border-secondary @else border-transparent @endif">
                        Inicio
                    </a>
                    <a href="{{ route('vehicles.index') }}"
                        class="text-dark font-bold transition pb-1 border-b-4
                    @if (request()->routeIs('vehicles.index')) border-secondary @else border-transparent @endif">
                        Vehículos
                    </a>
                    <a href="{{ route('about') }}"
                        class="text-dark font-bold transition pb-1 border-b-4
                    @if (request()->routeIs('about')) border-secondary @else border-transparent @endif">
                        Nosotros
                    </a>
                    <a href="{{ route('contact') }}"
                        class="text-dark font-bold transition pb-1 border-b-4
                    @if (request()->routeIs('contact')) border-secondary @else border-transparent @endif">
                        Contacto
                    </a>
                    <a href="https://wa.me/5493415551234" target="_blank"
                        class="bg-dark text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-bold flex-shrink-0">
                        WhatsApp
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>


        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white">
        <div class="container mx-auto px-8 lg:px-16 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                <!-- Logo y descripción -->
                <div>
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Fisherton Rodados" style="height: 7.5rem;"
                        class="mx-auto md:mx-0 mb-4">
                    <p class="text-gray-400">Tu concesionaria de confianza en Rosario</p>
                </div>

                <!-- Enlaces -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Enlaces</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="text-gray-400 hover:text-primary transition">Inicio</a></li>
                        <li><a href="{{ route('vehicles.index') }}"
                                class="text-gray-400 hover:text-primary transition">Nuestros Vehículos</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-primary transition">Quienes
                                Somos?</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="text-gray-400 hover:text-primary transition">Contactanos</a></li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div>
                    <h3 class="text-lg font-bold mb-4">Contacto</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 Mendoza 8021, Rosario</li>
                        <li>📞 (0341) 511-9372</li>
                        <li>📞 (0341) 707-3969</li>
                        <li>✉️ Fishertonrodados@hotmail.com</li>
                    </ul>
                    <!-- Redes sociales -->
                    <div class="flex justify-center md:justify-start mt-4 space-x-4">
                        <a href="https://www.facebook.com/fishertonrodados.automotor" target="_blank"
                            class="text-gray-400 hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M22.675 0h-21.35C.563 0 0 .563 0 1.258v21.484C0 23.437.563 24 1.258 24h11.495v-9.294H9.691v-3.622h3.062V8.413c0-3.025 1.843-4.672 4.533-4.672 1.288 0 2.396.096 2.717.139v3.15l-1.865.001c-1.463 0-1.745.695-1.745 1.716v2.252h3.49l-.455 3.622h-3.035V24h5.946c.695 0 1.258-.563 1.258-1.258V1.258C24 .563 23.437 0 22.675 0z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/fishertonrodados/" target="_blank"
                            class="text-gray-400 hover:text-primary transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.332 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.332 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.332-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308 1.265-.058 1.645-.07 4.849-.07zm0-2.163C8.741 0 8.332.013 7.052.072 5.773.131 4.633.387 3.678 1.342 2.723 2.297 2.467 3.437 2.408 4.716 2.349 5.996 2.336 6.405 2.336 12s.013 6.004.072 7.284c.061 1.279.317 2.419 1.272 3.374.955.955 2.095 1.211 3.374 1.272 1.279.059 1.688.072 7.284.072s6.004-.013 7.284-.072c1.279-.061 2.419-.317 3.374-1.272.955-.955 1.211-2.095 1.272-3.374.059-1.279.072-1.688.072-7.284s-.013-6.004-.072-7.284c-.061-1.279-.317-2.419-1.272-3.374-.955-.955-2.095-1.211-3.374-1.272C15.668.013 15.259 0 12 0z" />
                                <path
                                    d="M12 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Fisherton Rodados. Todos los derechos reservados.</p>
        </div>
        </div>
    </footer>
</body>

</html>
