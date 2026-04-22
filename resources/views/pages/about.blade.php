@extends('layouts.app')

@section('title', 'About Us — Royal Specialized Dental Clinic')

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
            <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.25em] mb-3 block">Learn More</span>
            <h1 class="font-bold text-white text-4xl sm:text-5xl mb-4">About Us</h1>
            <p class="text-white/50 text-base max-w-xl mx-auto">Royal Specialized Dental Clinic — Kigali's leading
                dental practice committed to excellence and patient comfort.</p>
            <div class="flex items-center justify-center space-x-2 mt-5 text-sm text-white/40">
                <a href="{{ url('/') }}" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-white/70">About</span>
            </div>
        </div>
    </section>

    {{-- Our Story --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="rounded-2xl overflow-hidden h-56 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Dental care">
                            </div>
                            <div class="rounded-2xl overflow-hidden h-40 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1588776814222-269e25b1f002?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Dental equipment">
                            </div>
                        </div>
                        <div class="space-y-4 mt-10">
                            <div class="rounded-2xl overflow-hidden h-40 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Dental team">
                            </div>
                            <div class="rounded-2xl overflow-hidden h-56 shadow-lg">
                                <img src="https://images.unsplash.com/photo-1629909613654-28a3a7c4abd4?q=80&w=600&auto=format&fit=crop"
                                    class="w-full h-full object-cover" alt="Clinic interior">
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute -bottom-6 -right-4 bg-clinic-royal text-white p-5 rounded-2xl shadow-2xl text-center min-w-[120px]">
                        <span class="block font-black text-3xl">10+</span>
                        <span class="block text-xs font-semibold opacity-80 mt-1">Years Experience</span>
                    </div>
                </div>

                <div class="lg:pl-4">
                    <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">Our
                        Story</span>
                    <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl leading-snug mb-5">Professionals and
                        Personalized Dental Excellence</h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-5">
                        Founded over a decade ago, Royal Specialized Dental Clinic has grown to become Rwanda's most
                        trusted dental care provider. We combine world-class expertise with a patient-first philosophy,
                        ensuring every visit exceeds expectations.
                    </p>
                    <p class="text-gray-400 text-base leading-relaxed mb-8">
                        Our state-of-the-art facility in the heart of Kigali houses an experienced team of specialist
                        dentists, hygienists, and support staff all working together to deliver exceptional outcomes.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach([['10,000+','Happy Patients'],['15+','Expert
                        Dentists'],['6+','Specializations'],['5.0','Google Rating']] as [$n,$l])
                        <div class="p-5 rounded-2xl bg-gray-50 border border-gray-100 text-center">
                            <span class="block font-black text-2xl text-[#0d1e3d]">{{ $n }}</span>
                            <span class="block text-xs text-gray-400 mt-1">{{ $l }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission & Values --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">What Drives
                    Us</span>
                <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl">Our Mission & Values</h2>
                <div class="w-14 h-1 bg-clinic-royal mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach([
                ['icon'=>'🎯','title'=>'Our Mission','desc'=>'To deliver exceptional, affordable, and compassionate
                dental care that transforms lives and builds confidence through healthier smiles.'],
                ['icon'=>'👁️','title'=>'Our Vision','desc'=>'To be East Africa\'s most trusted and innovative dental
                clinic — recognized for excellence, safety, and patient-centered outcomes.'],
                ['icon'=>'🤝','title'=>'Integrity','desc'=>'We adhere to the highest ethical standards, communicating
                transparently and treating every patient with dignity and respect.'],
                ['icon'=>'🔬','title'=>'Innovation','desc'=>'Continuously investing in the latest dental technology to
                ensure our patients receive the safest and most effective treatments available.'],
                ['icon'=>'💛','title'=>'Compassion','desc'=>'We understand dental anxiety. Our environment and team are
                designed to put you at ease from the moment you walk through our door.'],
                ['icon'=>'🏆','title'=>'Excellence','desc'=>'We hold ourselves to the highest clinical standards,
                pursuing continuous education and specialist training to stay at the forefront of dentistry.'],
                ] as $item)
                <div class="bg-white border border-gray-100 rounded-2xl p-8 hover:shadow-lg transition duration-300">
                    <div class="w-12 h-12 bg-clinic-royal/10 rounded-xl flex items-center justify-center text-2xl mb-5">
                        {{ $item['icon'] }}</div>
                    <h3 class="font-bold text-[#0d1e3d] text-lg mb-3">{{ $item['title'] }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Meet the Team --}}
    @if($doctors->count())
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">The
                    Experts</span>
                <h2 class="font-bold text-[#0d1e3d] text-3xl sm:text-4xl">Meet Our Dental Team</h2>
                <div class="w-14 h-1 bg-clinic-royal mx-auto mt-4 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($doctors as $doctor)
                <div
                    class="group text-center bg-gray-50 rounded-2xl p-8 hover:shadow-xl hover:bg-white transition duration-300 border border-gray-100">
                    <div class="w-28 h-28 rounded-full mx-auto mb-5 overflow-hidden border-4 border-white shadow-lg">
                        @if($doctor->image)
                        <img src="{{ Storage::url($doctor->image) }}" class="w-full h-full object-cover"
                            alt="{{ $doctor->name }}">
                        @else
                        <div class="w-full h-full bg-clinic-royal/10 flex items-center justify-center text-4xl">👨‍⚕️
                        </div>
                        @endif
                    </div>
                    <h3 class="font-bold text-[#0d1e3d] text-lg mb-1">{{ $doctor->name }}</h3>
                    <p class="text-clinic-royal text-sm font-semibold mb-3">{{ $doctor->specialty }}</p>
                    <p class="text-gray-400 text-sm leading-relaxed line-clamp-3">{{ strip_tags($doctor->bio) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="py-20 bg-[#0d1e3d]">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="font-bold text-white text-3xl sm:text-4xl mb-5">Ready to Experience the Difference?</h2>
            <p class="text-white/50 text-base mb-8">Book a consultation with one of our expert dentists today.</p>
            <a href="{{ url('/#booking') }}"
                class="inline-flex items-center bg-clinic-royal text-white font-bold px-8 py-3.5 rounded-full hover:bg-white hover:text-[#0d1e3d] transition-all duration-300 shadow-lg">
                Book an Appointment
            </a>
        </div>
    </section>

</main>
@endsection