@extends('layouts.app')

@section('title', 'Blog — Royal Specialized Dental Clinic')

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
            <span class="text-clinic-royal text-xs font-bold uppercase tracking-[0.25em] mb-3 block">Insights &
                Tips</span>
            <h1 class="font-bold text-white text-4xl sm:text-5xl mb-4">Dental Health Blog</h1>
            <p class="text-white/50 text-base max-w-xl mx-auto">Expert advice, treatment guides, and oral health tips
                from the RSDC dental team.</p>
            <div class="flex items-center justify-center space-x-2 mt-5 text-sm text-white/40">
                <a href="{{ url('/') }}" class="hover:text-white transition">Home</a>
                <span>/</span>
                <span class="text-white/70">Blogs</span>
            </div>
        </div>
    </section>

    {{-- Blog Grid --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Category Filter --}}
            <div class="flex flex-wrap gap-3 justify-center mb-14">
                @foreach(['All', 'General Care', 'Cosmetic', 'Orthodontics', 'Kids Dental', 'Oral Hygiene'] as $cat)
                <button
                    class="px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 text-gray-500 hover:bg-clinic-royal hover:text-white hover:border-clinic-royal transition-all duration-200 {{ $loop->first ? 'bg-clinic-royal text-white border-clinic-royal' : 'bg-white' }}">
                    {{ $cat }}
                </button>
                @endforeach
            </div>

            {{-- Static Blog Cards (until Posts model is implemented) --}}
            @php
            $posts = [
            ['img'=>'https://images.unsplash.com/photo-1629909615184-74f495363b67?q=80&w=800&auto=format&fit=crop','cat'=>'General
            Care','date'=>'April 15, 2025','read'=>'4 min read','title'=>'How Often Should You Really Visit the
            Dentist?','excerpt'=>'Most people know they should visit the dentist regularly, but how often is the right
            frequency? We break down the evidence-based recommendations for different patient profiles.','author'=>'Dr.
            Amara I.'],
            ['img'=>'https://images.unsplash.com/photo-1588776814222-269e25b1f002?q=80&w=800&auto=format&fit=crop','cat'=>'Cosmetic','date'=>'March
            28, 2025','read'=>'5 min read','title'=>'Teeth Whitening: What Actually Works?','excerpt'=>'From in-clinic
            treatments to over-the-counter strips and charcoal toothpastes — we compare the options and separate fact
            from marketing hype.','author'=>'Dr. Sophie M.'],
            ['img'=>'https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?q=80&w=800&auto=format&fit=crop','cat'=>'Kids
            Dental','date'=>'March 10, 2025','read'=>'3 min read','title'=>'Making Dental Visits Fun for Your
            Kids','excerpt'=>'Dental anxiety often starts in childhood. Here are our top tips for turning a dental
            check-up into an experience your child will actually look forward to.','author'=>'Dr. Keza P.'],
            ['img'=>'https://images.unsplash.com/photo-1629909613654-28a3a7c4abd4?q=80&w=800&auto=format&fit=crop','cat'=>'Orthodontics','date'=>'February
            20, 2025','read'=>'6 min read','title'=>'Braces vs. Clear Aligners: Which Is Right for
            You?','excerpt'=>'Both braces and Invisalign can straighten your teeth effectively, but the right choice
            depends on your lifestyle, budget, and treatment complexity. We compare them honestly.','author'=>'Dr. Amara
            I.'],
            ['img'=>'https://images.unsplash.com/photo-1581591524425-c7e0978865fc?q=80&w=800&auto=format&fit=crop','cat'=>'Oral
            Hygiene','date'=>'February 5, 2025','read'=>'4 min read','title'=>'The Right Way to Brush: Habits Most
            People Get Wrong','excerpt'=>'Brushing twice a day is a great start, but technique matters just as much as
            frequency. Learn the evidence-based brushing method recommended by our hygienists.','author'=>'Dr. Sophie
            M.'],
            ['img'=>'https://images.unsplash.com/photo-1559757175-0eb30cd8c063?q=80&w=800&auto=format&fit=crop','cat'=>'General
            Care','date'=>'January 14, 2025','read'=>'5 min read','title'=>'Understanding Dental Insurance in
            Rwanda','excerpt'=>'Navigating health insurance for dental care can be confusing. This guide explains what
            is typically covered, how to submit claims, and how to maximize your benefits at RSDC.','author'=>'RSDC
            Admin'],
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <article
                    class="group bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $post['img'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            alt="{{ $post['title'] }}">
                        <span
                            class="absolute top-4 left-4 bg-clinic-royal text-white text-xs font-bold px-3 py-1 rounded-full">{{
                            $post['cat'] }}</span>
                    </div>
                    <div class="p-7">
                        <div class="flex items-center space-x-3 text-xs text-gray-400 mb-3">
                            <span>{{ $post['date'] }}</span>
                            <span>•</span>
                            <span>{{ $post['read'] }}</span>
                        </div>
                        <h3
                            class="font-bold text-[#0d1e3d] text-lg leading-snug mb-3 group-hover:text-clinic-royal transition-colors duration-300">
                            {{ $post['title'] }}</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-5 line-clamp-3">{{ $post['excerpt'] }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-clinic-royal/10 flex items-center justify-center text-xs font-bold text-clinic-royal">
                                    {{ substr($post['author'], 0, 1) }}
                                </div>
                                <span class="text-xs text-gray-500 font-semibold">{{ $post['author'] }}</span>
                            </div>
                            <a href="#"
                                class="text-clinic-royal text-xs font-bold inline-flex items-center hover:translate-x-1 transition-transform duration-300">
                                Read More <span class="ml-1">→</span>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Load More --}}
            <div class="text-center mt-14">
                <button
                    class="border-2 border-[#0d1e3d] text-[#0d1e3d] font-bold px-8 py-3 rounded-full text-sm hover:bg-[#0d1e3d] hover:text-white transition-all duration-300">
                    Load More Articles
                </button>
            </div>
        </div>
    </section>

    {{-- Newsletter CTA --}}
    <section class="py-16 bg-gray-50 border-t border-gray-100">
        <div class="max-w-xl mx-auto px-4 text-center">
            <h3 class="font-bold text-[#0d1e3d] text-2xl mb-3">Get Dental Tips in Your Inbox</h3>
            <p class="text-gray-400 text-sm mb-6">Subscribe to receive one practical dental health tip per month. No
                spam, ever.</p>
            <form class="flex gap-3">
                <input type="email" placeholder="your@email.com"
                    class="flex-1 px-5 py-3 rounded-full border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-clinic-royal/30 focus:border-clinic-royal">
                <button type="submit"
                    class="bg-clinic-royal text-white font-bold px-6 py-3 rounded-full text-sm hover:bg-[#0d1e3d] transition-all duration-300 whitespace-nowrap">Subscribe</button>
            </form>
        </div>
    </section>

</main>
@endsection