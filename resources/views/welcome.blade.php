@extends('layouts.app')

@section('content')
<main>

    {{-- =========================================================
    HERO SECTION - Full-screen navy bg with dental room image
    ========================================================= --}}
    <section class="relative min-h-screen flex flex-col justify-center overflow-hidden bg-[#0d1e3d]">

        {{-- Background dental clinic photo --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1629909613654-28a3a7c4abd4?q=80&w=2070&auto=format&fit=crop"
                class="w-full h-full object-cover opacity-35" alt="Royal Dental Clinic Kigali">
            {{-- Left-side gradient overlay (stronger on left for text) --}}
            <div class="absolute inset-0 bg-gradient-to-r from-[#0d1e3d] via-[#0d1e3d]/70 to-[#0d1e3d]/20"></div>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-24 pb-48">
            <div class="max-w-2xl">
                {{-- Super-label above headline --}}
                <p class="text-white/60 text-xs font-semibold uppercase tracking-[0.25em] mb-4">
                    Royal Specialized Dental Clinic
                </p>

                {{-- Main Headline — balanced text-4xl/5xl, not oversized --}}
                <h1 class="font-bold text-white text-4xl sm:text-5xl leading-tight mb-6">
                    Your Best Partner to<br>Restore your Smile
                </h1>

                {{-- Hero CTA Button (outlined style matching original) --}}
                <div class="flex items-center space-x-4 mb-10">
                    <a href="#booking"
                        class="inline-flex items-center border-2 border-white text-white text-sm font-bold px-7 py-3 rounded-full hover:bg-white hover:text-[#0d1e3d] transition-all duration-300">
                        Book Appointment
                    </a>
                </div>

                {{-- Google Rating row --}}
                <div class="flex items-center space-x-3">
                    <span class="text-white/80 text-sm font-semibold">Google Rating</span>
                    <span class="text-white font-bold text-sm">5.0</span>
                    <div class="flex text-yellow-400">
                        @for($i = 0; $i < 5; $i++) <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            @endfor
                    </div>
                    <span class="text-white/40 text-xs">Based on 23k Reviews</span>
                </div>
            </div>
        </div>

        {{-- Info Bar anchored to bottom --}}
        <div class="absolute bottom-0 left-0 w-full z-20">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div
                    class="bg-[#0a1729]/90 backdrop-blur-sm p-7 flex items-center space-x-5 border-r border-white/10 hover:bg-clinic-royal transition-colors duration-500 group cursor-pointer">
                    <div
                        class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-white/20 transition">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">Need Dental Services?</p>
                        <p class="text-white/50 text-xs mt-0.5">+250 788 588 092</p>
                    </div>
                </div>
                <div
                    class="bg-[#0a1729]/90 backdrop-blur-sm p-7 flex items-center space-x-5 border-r border-white/10 hover:bg-clinic-royal transition-colors duration-500 group cursor-pointer">
                    <div
                        class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-white/20 transition">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">Opening Hours</p>
                        <p class="text-white/50 text-xs mt-0.5">Mon to Sat 08:00 – 20:00</p>
                    </div>
                </div>
                <div
                    class="bg-[#0a1729]/90 backdrop-blur-sm p-7 flex items-center space-x-5 hover:bg-clinic-royal transition-colors duration-500 group cursor-pointer">
                    <div
                        class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 group-hover:bg-white/20 transition">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-bold text-sm">Email Us</p>
                        <p class="text-white/50 text-xs mt-0.5">royaldentalclinicc@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
    ABOUT SECTION - 2 col: image grid left, text right
    ========================================================= --}}
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                {{-- Left: Image Collage --}}
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="rounded-2xl overflow-hidden h-48 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Dental care">
                            </div>
                            <div class="rounded-2xl overflow-hidden h-36 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1588776814222-269e25b1f002?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Dental equipment">
                            </div>
                        </div>
                        <div class="space-y-4 mt-8">
                            <div class="rounded-2xl overflow-hidden h-36 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Dental team">
                            </div>
                            <div class="rounded-2xl overflow-hidden h-48 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1629909613654-28a3a7c4abd4?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Clinic interior">
                            </div>
                        </div>
                    </div>
                    {{-- Experience Badge --}}
                    <div
                        class="absolute -bottom-5 -right-5 bg-clinic-royal text-white p-5 rounded-2xl shadow-2xl text-center min-w-[120px]">
                        <span class="block font-black text-3xl">10+</span>
                        <span class="block text-xs font-semibold opacity-80 mt-1">Years Experience</span>
                    </div>
                </div>

                {{-- Right: Text Content --}}
                <div class="lg:pl-4">
                    <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">About
                        Us</span>
                    <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl leading-snug mb-5">
                        Professionals and Personalized<br>Dental Excellence
                    </h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-8">
                        At Royal Specialized Dental Clinic, we are dedicated to providing the highest quality dental
                        care in Kigali. Our team of experienced dentists uses the latest technology to ensure your
                        comfort and oral health.
                    </p>

                    <div class="space-y-4 mb-10">
                        @foreach([
                        ['icon' => '✓', 'title' => 'Expert Dental Team', 'desc' => 'Board-certified specialists with
                        years of clinical experience.'],
                        ['icon' => '✓', 'title' => 'Modern Equipment', 'desc' => 'State-of-the-art dental technology for
                        painless, precise care.'],
                        ['icon' => '✓', 'title' => 'Patient-Centered Care', 'desc' => 'Your comfort and satisfaction are
                        our highest priority.'],
                        ] as $item)
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-7 h-7 rounded-full bg-clinic-royal/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-clinic-royal font-bold text-sm">{{ $item['icon'] }}</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#0d1e3d] text-sm">{{ $item['title'] }}</h4>
                                <p class="text-gray-400 text-sm mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href="#booking"
                        class="inline-flex items-center bg-[#0d1e3d] text-white text-sm font-bold px-7 py-3 rounded-full hover:bg-clinic-royal transition-all duration-300 shadow-lg">
                        Book a Consultation
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
    SERVICES SECTION
    ========================================================= --}}
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">What We
                    Offer</span>
                <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl">Our Dental Services</h2>
                <div class="w-14 h-1 bg-clinic-royal mx-auto mt-4 rounded-full"></div>
            </div>

            @php
            $services = \App\Models\Service::where('is_active', true)->take(6)->get();
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @forelse($services as $service)
                <div
                    class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl hover:border-clinic-royal/20 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-clinic-royal/10 rounded-xl flex items-center justify-center text-2xl mb-5 group-hover:bg-clinic-royal group-hover:text-white transition-all duration-300">
                        {{ $service->icon ?: '🦷' }}
                    </div>
                    <h3 class="font-bold text-[#0d1e3d] text-lg mb-3">{{ $service->title }}</h3>
                    <div class="text-gray-400 text-sm leading-relaxed line-clamp-3 mb-5">
                        {!! $service->description !!}
                    </div>
                    <a href="#"
                        class="text-clinic-royal text-sm font-bold inline-flex items-center group-hover:translate-x-1 transition-transform duration-300">
                        Learn More <span class="ml-1.5">→</span>
                    </a>
                </div>
                @empty
                @foreach([
                ['icon' => '🦷', 'title' => 'General Dentistry', 'desc' => 'Comprehensive routine check-ups, cleanings,
                and preventive care for the whole family.'],
                ['icon' => '✨', 'title' => 'Cosmetic Dentistry', 'desc' => 'Teeth whitening, veneers, and smile
                makeovers to boost your confidence.'],
                ['icon' => '🔧', 'title' => 'Orthodontics', 'desc' => 'Traditional braces and clear aligners to
                straighten your teeth comfortably.'],
                ['icon' => '🪄', 'title' => 'Dental Implants', 'desc' => 'Permanent, natural-looking replacements that
                restore full functionality.'],
                ['icon' => '😷', 'title' => 'Oral Surgery', 'desc' => 'Expert extractions and surgical procedures in a
                safe, comfortable environment.'],
                ['icon' => '👶', 'title' => 'Pediatric Dentistry', 'desc' => 'Gentle, fun dental care designed
                especially for children and teens.'],
                ] as $item)
                <div
                    class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl hover:border-clinic-royal/20 transition-all duration-300">
                    <div
                        class="w-14 h-14 bg-clinic-royal/10 rounded-xl flex items-center justify-center text-2xl mb-5 group-hover:bg-clinic-royal group-hover:text-white transition-all duration-300">
                        {{ $item['icon'] }}
                    </div>
                    <h3 class="font-bold text-[#0d1e3d] text-lg mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-5">{{ $item['desc'] }}</p>
                    <a href="#"
                        class="text-clinic-royal text-sm font-bold inline-flex items-center group-hover:translate-x-1 transition-transform duration-300">
                        Learn More <span class="ml-1.5">→</span>
                    </a>
                </div>
                @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- =========================================================
    APPOINTMENT BOOKING SECTION
    ========================================================= --}}
    <section id="booking" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                {{-- Left info --}}
                <div>
                    <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">Quick
                        Appointment</span>
                    <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl leading-snug mb-5">
                        Book Your Visit<br>In Minutes
                    </h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-8">
                        Our simple booking system gets you scheduled in under 2 minutes. Choose your preferred service,
                        date, and one of our expert dentists.
                    </p>

                    {{-- Stats Row --}}
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <div class="text-center p-5 rounded-2xl bg-gray-50 border border-gray-100">
                            <span class="block font-black text-2xl text-[#0d1e3d]">10k+</span>
                            <span class="block text-xs text-gray-400 mt-1">Happy Patients</span>
                        </div>
                        <div class="text-center p-5 rounded-2xl bg-gray-50 border border-gray-100">
                            <span class="block font-black text-2xl text-[#0d1e3d]">15+</span>
                            <span class="block text-xs text-gray-400 mt-1">Expert Dentists</span>
                        </div>
                        <div class="text-center p-5 rounded-2xl bg-gray-50 border border-gray-100">
                            <span class="block font-black text-2xl text-[#0d1e3d]">5.0</span>
                            <span class="block text-xs text-gray-400 mt-1">Google Rating</span>
                        </div>
                    </div>

                    {{-- Contact details --}}
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 rounded-xl bg-gray-50">
                            <div
                                class="w-10 h-10 rounded-xl bg-clinic-royal/10 flex items-center justify-center text-clinic-royal flex-shrink-0">
                                📞</div>
                            <div>
                                <p class="text-xs text-gray-400">Phone</p>
                                <p class="font-bold text-[#0d1e3d] text-sm">+250 788 588 092</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 rounded-xl bg-gray-50">
                            <div
                                class="w-10 h-10 rounded-xl bg-clinic-royal/10 flex items-center justify-center text-clinic-royal flex-shrink-0">
                                🕒</div>
                            <div>
                                <p class="text-xs text-gray-400">Hours</p>
                                <p class="font-bold text-[#0d1e3d] text-sm">Mon – Sat: 08:00 – 20:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Booking Form --}}
                <div>
                    <livewire:booking-form />
                </div>
            </div>
        </div>
    </section>

    {{-- =========================================================
    WHY CHOOSE US - Stats bar
    ========================================================= --}}
    <section class="py-16 bg-[#0d1e3d]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                @foreach([
                ['num' => '10,000+', 'label' => 'Patients Treated'],
                ['num' => '15+', 'label' => 'Expert Dentists'],
                ['num' => '10+', 'label' => 'Years Experience'],
                ['num' => '5.0', 'label' => 'Google Rating'],
                ] as $stat)
                <div>
                    <span class="block font-black text-4xl mb-1">{{ $stat['num'] }}</span>
                    <span class="text-white/50 text-sm font-medium">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>
@endsection