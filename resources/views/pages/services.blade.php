@extends('layouts.app')

@section('title', 'Our Services — Royal Specialized Dental Clinic')

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
            <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.25em] mb-3 block">What We Do</span>
            <h1 class="font-bold text-white text-4xl sm:text-5xl mb-4">Our Services</h1>
            <p class="text-white/50 text-base max-w-xl mx-auto">Comprehensive dental care for every stage of life,
                delivered by specialists who genuinely care.</p>
            <div class="flex items-center justify-center space-x-2 mt-5 text-sm text-white/40">
                <a href="{{ url('/') }}" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-white/70">Services</span>
            </div>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
            $allServices = $services->count() ? $services : collect([
            (object)['icon'=>'🦷','title'=>'General Dentistry','slug'=>'general-dentistry','description'=>'Routine
            check-ups, cleanings, fillings, and preventive care to keep your smile healthy long-term.'],
            (object)['icon'=>'✨','title'=>'Cosmetic Dentistry','slug'=>'cosmetic-dentistry','description'=>'Teeth
            whitening, veneers, bonding, and complete smile makeovers to boost your confidence.'],
            (object)['icon'=>'🔧','title'=>'Orthodontics','slug'=>'orthodontics','description'=>'Traditional braces and
            Invisalign clear aligners to straighten teeth for all ages.'],
            (object)['icon'=>'🪄','title'=>'Dental Implants','slug'=>'dental-implants','description'=>'Permanent
            titanium root replacements that look, feel, and function exactly like natural teeth.'],
            (object)['icon'=>'😷','title'=>'Oral Surgery','slug'=>'oral-surgery','description'=>'Expert extractions,
            wisdom teeth removal, and surgical procedures in a calm environment.'],
            (object)['icon'=>'👶','title'=>'Pediatric Dentistry','slug'=>'pediatric-dentistry','description'=>'Gentle,
            fun, and stress-free dental care designed specifically for children and teenagers.'],
            (object)['icon'=>'💉','title'=>'Root Canal Therapy','slug'=>'root-canal','description'=>'Modern, virtually
            painless endodontic treatment to save infected teeth and relieve pain.'],
            (object)['icon'=>'🦴','title'=>'Periodontics','slug'=>'periodontics','description'=>'Specialized gum disease
            treatment and prevention to protect the foundation of your teeth.'],
            (object)['icon'=>'🏅','title'=>'Dental Crowns &
            Bridges','slug'=>'crowns-bridges','description'=>'Custom-crafted restorations to repair, protect, and
            replace damaged or missing teeth.'],
            ]);
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($allServices as $service)
                <div
                    class="group bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-xl hover:border-clinic-royal/20 transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-clinic-royal/10 rounded-xl flex items-center justify-center text-3xl mb-6 group-hover:bg-clinic-royal group-hover:text-white transition-all duration-300">
                        {{ $service->icon ?? '🦷' }}
                    </div>
                    <h3 class="font-bold text-[#0d1e3d] text-xl mb-3">{{ $service->title }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">
                        @if(is_string($service->description))
                        {{ strip_tags($service->description) }}
                        @else
                        {{ $service->description }}
                        @endif
                    </p>
                    @if(isset($service->id))
                    <a href="{{ route('services.show', $service->slug) }}"
                        class="text-clinic-royal text-sm font-bold inline-flex items-center group-hover:translate-x-1 transition-transform duration-300">
                        Learn More <span class="ml-1.5">→</span>
                    </a>
                    @else
                    <a href="#"
                        class="text-clinic-royal text-sm font-bold inline-flex items-center group-hover:translate-x-1 transition-transform duration-300">
                        Learn More <span class="ml-1.5">→</span>
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">Why
                        RSDC</span>
                    <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl leading-snug mb-5">The RSDC Difference</h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-8">We combine clinical expertise with genuine
                        compassion to deliver an experience that goes far beyond a standard dental visit.</p>
                    <div class="space-y-5">
                        @foreach([
                        ['icon'=>'✓','title'=>'Board-Certified Specialists','desc'=>'Each of our dentists holds
                        specialist qualifications from accredited international institutions.'],
                        ['icon'=>'✓','title'=>'State-of-the-Art Equipment','desc'=>'Digital X-rays, 3D imaging, and
                        laser dentistry for precise, minimally-invasive treatment.'],
                        ['icon'=>'✓','title'=>'Flexible Appointment Times','desc'=>'Early morning and Saturday slots
                        available. Book online in under 2 minutes.'],
                        ['icon'=>'✓','title'=>'Insurance Accepted','desc'=>'We work with all major Rwandan and
                        international health insurance providers.'],
                        ] as $item)
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-7 h-7 rounded-full bg-clinic-royal flex items-center justify-center flex-shrink-0 mt-0.5">
                                <span class="text-white font-bold text-xs">{{ $item['icon'] }}</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#0d1e3d] text-sm">{{ $item['title'] }}</h4>
                                <p class="text-gray-400 text-sm mt-0.5">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-3xl overflow-hidden shadow-2xl h-96">
                    <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?q=80&w=1200&auto=format&fit=crop"
                        class="w-full h-full object-cover" alt="RSDC Team">
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-20 bg-[#0d1e3d]">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="font-bold text-white text-3xl sm:text-4xl mb-5">Not Sure Which Service You Need?</h2>
            <p class="text-white/50 text-base mb-8">Book a free consultation — our team will assess your needs and
                recommend the right treatment plan.</p>
            <a href="{{ url('/#booking') }}"
                class="inline-flex items-center bg-clinic-royal text-white font-bold px-8 py-3.5 rounded-full hover:bg-white hover:text-[#0d1e3d] transition-all duration-300 shadow-lg">
                Book a Free Consultation
            </a>
        </div>
    </section>

</main>
@endsection