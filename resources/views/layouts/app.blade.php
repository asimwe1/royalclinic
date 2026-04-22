<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Royal Specialized Dental Clinic — Kigali')</title>
    <meta name="description"
        content="Royal Specialized Dental Clinic (RSDC) - Professional and personalized dental excellence in Kigali, Rwanda.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>

<body class="font-sans antialiased bg-white text-gray-800" x-data="{ mobileMenuOpen: false, scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 50)">

    <!-- Navigation Header -->
    <header class="fixed w-full z-50 transition-all duration-500"
        :class="scrolled ? 'bg-[#0d1e3d]/95 backdrop-blur-md shadow-2xl' : 'bg-transparent'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 rounded-full bg-white/15 border border-white/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C9.5 2 7 4 7 6.5c0 1.5.5 3 1.2 4.3L6 21h1.5l1-4h7l1 4H18l-2.2-10.2C16.5 9.5 17 8 17 6.5 17 4 14.5 2 12 2zm0 2c1.7 0 3 1.2 3 2.5 0 1-.3 2.2-.9 3.3L13.8 13h-3.6L9 9.8C8.3 8.7 8 7.5 8 6.5 8 5.2 10.3 4 12 4z" />
                        </svg>
                    </div>
                    <a href="/" class="font-black text-2xl text-white tracking-tight uppercase">RSDC</a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ url('/') }}"
                        class="text-sm font-semibold text-white/90 hover:text-white transition-colors duration-200 {{ request()->is('/') ? 'text-white' : '' }}">Home</a>
                    <a href="{{ route('about') }}"
                        class="text-sm font-semibold text-white/90 hover:text-white transition-colors duration-200 {{ request()->is('about') ? 'text-white' : '' }}">About</a>
                    <a href="{{ route('services') }}"
                        class="text-sm font-semibold text-white/90 hover:text-white transition-colors duration-200 {{ request()->is('services*') ? 'text-white' : '' }}">Services</a>
                    <a href="{{ route('blog') }}"
                        class="text-sm font-semibold text-white/90 hover:text-white transition-colors duration-200 {{ request()->is('blogs') ? 'text-white' : '' }}">Blogs</a>
                    <a href="{{ route('contact') }}"
                        class="text-sm font-semibold text-white/90 hover:text-white transition-colors duration-200 {{ request()->is('contact') ? 'text-white' : '' }}">Contact</a>
                    <a href="/admin/login"
                        class="text-sm font-semibold text-white/90 hover:text-white transition-colors duration-200">Login</a>
                </nav>

                <!-- CTA + Hamburger -->
                <div class="flex items-center space-x-4">
                    <a href="#booking"
                        class="hidden md:inline-flex bg-clinic-royal text-white text-sm font-bold px-6 py-2.5 rounded-full hover:bg-white hover:text-clinic-navy transition-all duration-300 shadow-lg">
                        Book Appointment
                    </a>
                    <!-- Mobile Hamburger -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition style="display:none"
            class="md:hidden bg-[#0d1e3d] border-t border-white/10 px-4 pt-2 pb-6 space-y-1">
            <a href="{{ url('/') }}"
                class="block py-3 text-sm font-semibold text-white/90 hover:text-white border-b border-white/10">Home</a>
            <a href="{{ route('about') }}"
                class="block py-3 text-sm font-semibold text-white/90 hover:text-white border-b border-white/10">About</a>
            <a href="{{ route('services') }}"
                class="block py-3 text-sm font-semibold text-white/90 hover:text-white border-b border-white/10">Services</a>
            <a href="{{ route('blog') }}"
                class="block py-3 text-sm font-semibold text-white/90 hover:text-white border-b border-white/10">Blogs</a>
            <a href="{{ route('contact') }}"
                class="block py-3 text-sm font-semibold text-white/90 hover:text-white border-b border-white/10">Contact</a>
            <div class="pt-4">
                <a href="{{ url('/#booking') }}"
                    class="block text-center bg-clinic-royal text-white font-bold px-6 py-3 rounded-full">Book
                    Appointment</a>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-[#0d1e3d] text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-1">
                    <div class="flex items-center space-x-3 mb-5">
                        <div
                            class="w-9 h-9 rounded-full bg-white/15 border border-white/30 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C9.5 2 7 4 7 6.5c0 1.5.5 3 1.2 4.3L6 21h1.5l1-4h7l1 4H18l-2.2-10.2C16.5 9.5 17 8 17 6.5 17 4 14.5 2 12 2zm0 2c1.7 0 3 1.2 3 2.5 0 1-.3 2.2-.9 3.3L13.8 13h-3.6L9 9.8C8.3 8.7 8 7.5 8 6.5 8 5.2 10.3 4 12 4z" />
                            </svg>
                        </div>
                        <span class="font-black text-xl text-white tracking-tight uppercase">RSDC</span>
                    </div>
                    <p class="text-white/50 text-sm leading-relaxed mb-6">Kigali's leading specialized dental clinic.
                        Expert care, advanced technology, and a warm atmosphere.</p>
                    <div class="flex space-x-3">
                        <a href="#"
                            class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-clinic-royal transition text-xs font-bold">f</a>
                        <a href="#"
                            class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-clinic-royal transition text-xs font-bold">ig</a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold text-base mb-5">Quick Links</h4>
                    <ul class="space-y-3 text-white/50 text-sm">
                        <li><a href="/" class="hover:text-white transition">Home</a></li>
                        <li><a href="#about" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#services" class="hover:text-white transition">Services</a></li>
                        <li><a href="#contact" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-base mb-5">Our Services</h4>
                    <ul class="space-y-3 text-white/50 text-sm">
                        <li><a href="#" class="hover:text-white transition">General Dentistry</a></li>
                        <li><a href="#" class="hover:text-white transition">Cosmetic Dentistry</a></li>
                        <li><a href="#" class="hover:text-white transition">Orthodontics</a></li>
                        <li><a href="#" class="hover:text-white transition">Dental Implants</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-base mb-5">Contact Info</h4>
                    <ul class="space-y-4 text-white/50 text-sm">
                        <li class="flex items-start space-x-3">
                            <span class="text-clinic-royal mt-0.5">📍</span>
                            <span>KN 3 Rd, Kigali, Rwanda</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-clinic-royal mt-0.5">📞</span>
                            <span>+250 788 588 092</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <span class="text-clinic-royal mt-0.5">✉️</span>
                            <span>royaldentalclinicc@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-white/30">
                <p>&copy; {{ date('Y') }} Royal Specialized Dental Clinic. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>

</html>