@extends('layouts.app')

@section('title', 'Contacto - Fisherton Rodados')

@section('content')
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl font-bold mb-8">Contacto</h1>

                {{-- Mostrar mensaje de éxito --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6"
                        role="alert">
                        <strong class="font-bold">¡Perfecto!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Contact Info -->
                    <div>
                        <h2 class="text-2xl font-bold mb-6">Información de Contacto</h2>

                        <div class="space-y-6">
                            <div>
                                <h3 class="font-bold text-lg mb-2">📍 Dirección</h3>
                                <p class="text-gray-700">Mendoza 8021<br>Rosario, Santa Fe, Argentina</p>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg mb-2">📞 Teléfono Flavio</h3>
                                <p class="text-gray-700">(0341) 511-9372</p>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg mb-2">📞 Teléfono Andrés</h3>
                                <p class="text-gray-700">(0341) 707-3969</p>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg mb-2">✉️ Email</h3>
                                <p class="text-gray-700">Fishertonrodados@hotmail.com</p>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg mb-2">🕐 Horarios</h3>
                                <p class="text-gray-700">
                                    Lunes a Viernes: 9:00 - 19:00hs<br>
                                    Sábados: 9:00 - 13:00hs<br>
                                </p>
                            </div>

                            <div>
                                <a href="https://wa.me/5493415119372" target="_blank"
                                    class="inline-block bg-primary text-dark px-6 py-3 rounded-lg font-bold hover:bg-yellow-400 transition">
                                    Contactar por WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div>
                        <h2 class="text-2xl font-bold mb-6">Envianos tu Consulta</h2>

                        <form method="POST" action="{{ route('leads.store') }}" class="space-y-4">
                            @csrf

                            <div>
                                <label class="block text-sm font-medium mb-2">Nombre *</label>
                                <input type="text" name="name" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2">Email *</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2">Teléfono *</label>
                                <input type="tel" name="phone" required
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-2">Mensaje</label>
                                <textarea name="message" rows="4"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                            </div>

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
@endsection
