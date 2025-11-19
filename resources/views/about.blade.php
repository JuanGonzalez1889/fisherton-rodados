@extends('layouts.app')

@section('title', 'Nosotros - Fisherton Rodados')

@section('content')
  <!-- HERO BANNER: reemplazá public/images/nosotros-hero.jpg por tu imagen -->
    <section class="container mx-auto px-4 mt-6">
        <div class="relative overflow-hidden rounded-2xl min-h-[38vh] md:min-h-[52vh]">
            <!-- Fondo -->
            <img
                src="{{ asset('images/background.jpg') }}"
                alt="Fisherton Rodados - Nosotros"
                class="absolute inset-0 w-full h-full object-cover object-center" />
            <!-- Degradado de negro a transparente (izq -> der) -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/75 to-transparent"></div>

            <!-- Contenido -->
            <div class="relative z-10 h-full flex items-center">
                <div class="p-6 sm:p-10 lg:p-16 text-white max-w-3xl">
                    <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold leading-tight">
                        Conocé Fisherton Rodados
                    </h2>
                    <p class="mt-4 text-sm sm:text-base md:text-lg text-gray-200">
                        Un equipo dispuesto a ayudarte a encontrar el vehículo ideal para vos.
                    </p>

                    <a href="#sobre-nosotros"
                       class="mt-6 inline-flex items-center gap-2 bg-white text-gray-900 px-5 py-3 rounded-xl font-semibold shadow hover:shadow-md hover:bg-gray-100 transition group">
                        Conocenos
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             class="w-5 h-5 transition-transform group-hover:translate-y-0.5"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre nosotros (ancla para el scroll del botón) -->
    <section id="sobre-nosotros" class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl font-bold mb-8">Sobre Nosotros</h1>

                <div class="prose prose-lg max-w-none">
                    <p class="text-xl text-gray-700 leading-relaxed mb-6">
                        En <strong>Fisherton Rodados</strong>, somos una agencia de autos con más de <strong>19 años</strong> de experiencia en el mercado automotor de Rosario. Nos especializamos en la compra, venta y financiación de vehículos usados de alta calidad.
                    </p>

                    <h2 class="text-3xl font-bold mt-12 mb-6">Nuestra Misión</h2>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Brindar a nuestros clientes la mejor experiencia en la compra de su vehículo, ofreciendo calidad, transparencia y un servicio personalizado que supere sus expectativas.
                    </p>

                    <h2 class="text-3xl font-bold mt-12 mb-6">¿Por qué elegirnos?</h2>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-primary text-2xl mr-3">✓</span>
                            <span><strong>Vehículos certificados:</strong> Todos nuestros autos pasan por rigurosas inspecciones mecánicas y de documentación.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-primary text-2xl mr-3">✓</span>
                            <span><strong>Financiación flexible:</strong> Trabajamos con las mejores entidades financieras para ofrecerte planes a tu medida.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-primary text-2xl mr-3">✓</span>
                            <span><strong>Asesoramiento profesional:</strong> Nuestro equipo te guía en cada paso del proceso de compra.</span>
                        </li>
                       
                    </ul>

                    <div class="bg-primary rounded-lg p-8 mt-12">
                        <h2 class="text-3xl font-bold mb-4 text-dark">Visitanos</h2>
                        <p class="text-dark text-lg mb-4">
                            Estamos ubicados en Mendoza 8021, Rosario, Santa Fe.<br>
                            Horario: Lunes a Viernes de 9:00 a 19:00hs | Sábados de 9:00 a 13:00hs
                        </p>
                        <a href="{{ route('contact') }}"
                           class="inline-block bg-dark text-white px-8 py-4 rounded-lg font-bold hover:bg-gray-800 transition">
                            Contactanos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
