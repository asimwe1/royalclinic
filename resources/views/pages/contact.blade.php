@extends('layouts.app')

@section('title', 'Contact Us — Royal Specialized Dental Clinic')

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
            <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.25em] mb-3 block">Get in Touch</span>
            <h1 class="font-bold text-white text-4xl sm:text-5xl mb-4">Contact Us</h1>
            <p class="text-white/50 text-base max-w-xl mx-auto">We're here to answer any questions you have about our
                treatments or services.</p>
            <div class="flex items-center justify-center space-x-2 mt-5 text-sm text-white/40">
                <a href="{{ url('/') }}" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-white/70">Contact</span>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">

                {{-- Contact Info - Left --}}
                <div class="lg:col-span-2">
                    <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.2em] mb-3 block">Reach
                        Us</span>
                    <h2 class="font-bold text-[#0d1e3d] text-3xl mb-4">Let's Talk</h2>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8">Whether you have a dental emergency, a
                        question about our treatments, or you'd like to book an appointment — we're always happy to
                        help.</p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-clinic-royal/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-clinic-royal" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#0d1e3d] text-sm">Our Location</p>
                                <p class="text-gray-400 text-sm mt-0.5">KN 3 Rd, Kigali, Rwanda</p>
                                <a href="https://maps.google.com" target="_blank"
                                    class="text-clinic-royal text-xs font-semibold mt-1 inline-block hover:underline">View
                                    on Google Maps →</a>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-clinic-royal/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-clinic-royal" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#0d1e3d] text-sm">Phone</p>
                                <p class="text-gray-400 text-sm mt-0.5">+250 788 588 092</p>
                                <p class="text-gray-400 text-sm">+250 722 000 001</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-clinic-royal/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-clinic-royal" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#0d1e3d] text-sm">Email</p>
                                <p class="text-gray-400 text-sm mt-0.5">royaldentalclinicc@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-12 h-12 bg-clinic-royal/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-clinic-royal" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#0d1e3d] text-sm">Opening Hours</p>
                                <p class="text-gray-400 text-sm mt-0.5">Monday – Saturday: 08:00 – 20:00</p>
                                <p class="text-gray-400 text-sm">Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Form - Right --}}
                <div class="lg:col-span-3 bg-gray-50 rounded-3xl p-8 border border-gray-100">
                    <h3 class="font-bold text-[#0d1e3d] text-xl mb-6">Send Us a Message</h3>
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-[#0d1e3d] mb-1.5">First Name</label>
                                <input type="text" name="first_name" required placeholder="John"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal transition">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-[#0d1e3d] mb-1.5">Last Name</label>
                                <input type="text" name="last_name" required placeholder="Doe"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#0d1e3d] mb-1.5">Email Address</label>
                            <input type="email" name="email" required placeholder="you@example.com"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#0d1e3d] mb-1.5">Phone Number</label>
                            <input type="tel" name="phone" placeholder="+250 788 000 000"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#0d1e3d] mb-1.5">Subject</label>
                            <select name="subject"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal transition">
                                <option value="">Select a subject</option>
                                <option>General Inquiry</option>
                                <option>Book an Appointment</option>
                                <option>Insurance Question</option>
                                <option>Dental Emergency</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#0d1e3d] mb-1.5">Message</label>
                            <textarea name="message" rows="4" required placeholder="How can we help you?"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal transition resize-none"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#0d1e3d] text-white font-bold py-3.5 px-6 rounded-xl hover:bg-clinic-royal transition-all duration-300 shadow-lg text-sm">
                            Send Message →
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Map Embed --}}
    <section class="bg-gray-100">
        <div class="w-full h-80">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63800.86530628944!2d30.01624!3d-1.94995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca72f2d04fb25%3A0x4c3b5e6d04c4059f!2sKigali%2C%20Rwanda!5e0!3m2!1sen!2sus!4v1650000000000"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </section>

</main>
@endsection