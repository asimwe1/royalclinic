@extends('layouts.app')

@section('title', $service->title . ' — Royal Specialized Dental Clinic')

@section('content')
<main>

    {{-- Page Header --}}
    <section class="relative pt-36 pb-24 bg-[#0d1e3d] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1629909613654-28a3a7c4abd4?q=80&w=2070&auto=format&fit=crop"
                class="w-full h-full object-cover opacity-20" alt="">
            <div class="absolute inset-0 bg-[#0d1e3d]/80"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.25em] mb-3 block">{{ $service->icon
                ?? '🦷' }} Our Services</span>
            <h1 class="font-bold text-white text-4xl sm:text-5xl mb-4">{{ $service->title }}</h1>
            <div class="flex items-center justify-center space-x-2 mt-5 text-sm text-white/40">
                <a href="{{ url('/') }}" class="hover:text-white transition">Home</a>
                <span>/</span>
                <a href="{{ route('services') }}" class="hover:text-white transition">Services</a>
                <span>/</span>
                <span class="text-white/70">{{ $service->title }}</span>
            </div>
        </div>
    </section>

    {{-- Service Detail + Sidebar --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    <div class="rounded-3xl overflow-hidden h-72 mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover" alt="{{ $service->title }}">
                    </div>
                    <div class="prose prose-gray max-w-none">
                        <div class="text-gray-600 leading-relaxed text-base">
                            {!! $service->description !!}
                        </div>
                    </div>

                    {{-- Benefits Section --}}
                    <div class="mt-10 p-8 rounded-2xl bg-gray-50 border border-gray-100">
                        <h3 class="font-bold text-[#0d1e3d] text-xl mb-5">Why Choose RSDC for {{ $service->title }}?
                        </h3>
                        <div class="space-y-4">
                            @foreach(['Expert, certified dental specialists','State-of-the-art equipment and
                            techniques','Comprehensive care and follow-up','Flexible scheduling and insurance accepted']
                            as $benefit)
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-clinic-royal flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-gray-600 text-sm">{{ $benefit }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Quick Booking --}}
                    <div class="bg-[#0d1e3d] rounded-2xl p-7 text-white">
                        <h4 class="font-bold text-lg mb-2">Book This Service</h4>
                        <p class="text-white/50 text-sm mb-5">Schedule an appointment for {{ $service->title }} today.
                        </p>
                        <a href="{{ url('/#booking') }}"
                            class="block text-center bg-clinic-royal text-white font-bold py-3 px-6 rounded-xl hover:bg-white hover:text-[#0d1e3d] transition-all duration-300 text-sm">
                            Book Appointment
                        </a>
                    </div>

                    {{-- Contact Card --}}
                    <div class="rounded-2xl border border-gray-100 p-7">
                        <h4 class="font-bold text-[#0d1e3d] text-base mb-4">Have a Question?</h4>
                        <div class="space-y-4 text-sm">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-9 h-9 rounded-lg bg-clinic-royal/10 flex items-center justify-center text-clinic-royal flex-shrink-0">
                                    📞</div>
                                <span class="text-gray-600">+250 788 588 092</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-9 h-9 rounded-lg bg-clinic-royal/10 flex items-center justify-center text-clinic-royal flex-shrink-0">
                                    ✉️</div>
                                <span class="text-gray-600">royaldentalclinicc@gmail.com</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div
                                    class="w-9 h-9 rounded-lg bg-clinic-royal/10 flex items-center justify-center text-clinic-royal flex-shrink-0">
                                    🕒</div>
                                <span class="text-gray-600">Mon–Sat: 08:00–20:00</span>
                            </div>
                        </div>
                    </div>

                    {{-- Other Services --}}
                    @if($otherServices->count())
                    <div class="rounded-2xl border border-gray-100 p-7">
                        <h4 class="font-bold text-[#0d1e3d] text-base mb-5">Other Services</h4>
                        <div class="space-y-3">
                            @foreach($otherServices as $other)
                            <a href="{{ route('services.show', $other->slug) }}"
                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition group">
                                <span class="text-2xl w-8 text-center">{{ $other->icon ?? '🦷' }}</span>
                                <span
                                    class="font-semibold text-[#0d1e3d] text-sm group-hover:text-clinic-royal transition">{{
                                    $other->title }}</span>
                            </a>
                            @endforeach
                        </div>
                        <a href="{{ route('services') }}"
                            class="block text-center text-clinic-royal font-bold text-sm mt-4 hover:underline">View All
                            Services →</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</main>
@endsection