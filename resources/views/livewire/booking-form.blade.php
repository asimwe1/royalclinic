<div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-clinic-light">
    <!-- Progress Bar -->
    <div class="bg-clinic-light/30 px-8 py-6 border-b border-clinic-light">
        <div class="flex items-center justify-between mb-4">
            @foreach(['Service', 'Schedule', 'Details', 'Done'] as $i => $label)
            <div class="flex flex-col items-center flex-1 relative">
                <div
                    class="w-10 h-10 rounded-full flex items-center justify-center font-bold transition duration-500 {{ $step > $i + 1 ? 'bg-green-500 text-white' : ($step == $i + 1 ? 'bg-clinic-royal text-white scale-110' : 'bg-white text-clinic-slate border border-clinic-light') }}">
                    @if($step > $i + 1) ✓ @else {{ $i + 1 }} @endif
                </div>
                <span
                    class="text-xs font-bold mt-2 {{ $step == $i + 1 ? 'text-clinic-royal' : 'text-clinic-slate' }}">{{
                    $label }}</span>
                @if($i < 3) <div
                    class="absolute top-5 left-[60%] w-[80%] h-[2px] {{ $step > $i + 1 ? 'bg-green-500' : 'bg-clinic-light' }}">
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>

<div class="p-8 lg:p-12">
    <!-- Step 1: Select Service -->
    @if($step === 1)
    <div x-data x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-12">
        <h3 class="font-urbanist font-extrabold text-3xl mb-2">Select a Service</h3>
        <p class="text-clinic-slate mb-8">Choose the treatment you would like to book an appointment for.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($services as $service)
            <label
                class="relative flex items-center p-6 rounded-2xl border-2 cursor-pointer transition duration-300 {{ $service_id == $service->id ? 'border-clinic-royal bg-clinic-royal/5' : 'border-clinic-light hover:border-clinic-royal/30' }}">
                <input type="radio" wire:model="service_id" value="{{ $service->id }}" class="hidden">
                <div class="w-12 h-12 bg-clinic-royal/10 rounded-xl flex items-center justify-center text-2xl mr-4">
                    {{ $service->icon ?: '✨' }}
                </div>
                <div>
                    <span class="block font-bold text-clinic-navy text-lg">{{ $service->title }}</span>
                    <span class="block text-sm text-clinic-slate">{{ Str::limit($service->description, 50) }}</span>
                </div>
                @if($service_id == $service->id)
                <div class="ml-auto text-clinic-royal">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                @endif
            </label>
            @endforeach
        </div>
        @error('service_id') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
    </div>
    @endif

    <!-- Step 2: Schedule -->
    @if($step === 2)
    <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-12">
        <h3 class="font-urbanist font-extrabold text-3xl mb-2">Schedule Appointment</h3>
        <p class="text-clinic-slate mb-8">Pick your preferred date and time.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <label class="block font-bold text-clinic-navy mb-3">Select Date</label>
                <input type="date" wire:model.live="appointment_date"
                    class="w-full p-4 rounded-xl border-clinic-light focus:ring-clinic-royal focus:border-clinic-royal bg-clinic-light/50 font-medium">
                @error('appointment_date') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-bold text-clinic-navy mb-3">Preferred Doctor (Optional)</label>
                <select wire:model="doctor_id"
                    class="w-full p-4 rounded-xl border-clinic-light focus:ring-clinic-royal focus:border-clinic-royal bg-clinic-light/50 font-medium">
                    <option value="">Any available doctor</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-10">
            <label class="block font-bold text-clinic-navy mb-4">Available Time Slots</label>
            <div class="grid grid-cols-3 sm:grid-cols-5 md:grid-cols-6 gap-3">
                @foreach($timeSlots as $time)
                <button wire:click="$set('appointment_time', '{{ $time }}')"
                    class="p-4 rounded-xl font-bold text-sm transition duration-300 border-2 {{ $appointment_time == $time ? 'bg-clinic-royal border-clinic-royal text-white shadow-lg' : 'bg-white border-clinic-light text-clinic-navy hover:border-clinic-royal/50' }}">
                    {{ $time }}
                </button>
                @endforeach
            </div>
            @error('appointment_time') <span class="text-red-500 text-sm mt-2 block">{{ $message }}</span> @enderror
        </div>
    </div>
    @endif

    <!-- Step 3: Patient Info -->
    @if($step === 3)
    <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-12">
        <h3 class="font-urbanist font-extrabold text-3xl mb-2">Almost Done</h3>
        <p class="text-clinic-slate mb-8">Please provide your contact information to finalize your booking.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-bold text-clinic-navy mb-2">Full Name</label>
                <input type="text" wire:model="patient_name"
                    class="w-full p-4 rounded-xl border-clinic-light focus:ring-clinic-royal focus:border-clinic-royal bg-clinic-light/50 font-medium"
                    placeholder="John Doe">
                @error('patient_name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-bold text-clinic-navy mb-2">Email Address</label>
                <input type="email" wire:model="email"
                    class="w-full p-4 rounded-xl border-clinic-light focus:ring-clinic-royal focus:border-clinic-royal bg-clinic-light/50 font-medium"
                    placeholder="john@example.com">
                @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-bold text-clinic-navy mb-2">Phone Number</label>
                <input type="tel" wire:model="phone"
                    class="w-full p-4 rounded-xl border-clinic-light focus:ring-clinic-royal focus:border-clinic-royal bg-clinic-light/50 font-medium"
                    placeholder="+250 XXX XXX XXX">
                @error('phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block font-bold text-clinic-navy mb-2">Message (Optional)</label>
                <input type="text" wire:model="message"
                    class="w-full p-4 rounded-xl border-clinic-light focus:ring-clinic-royal focus:border-clinic-royal bg-clinic-light/50 font-medium"
                    placeholder="Any specific concerns?">
            </div>
        </div>
    </div>
    @endif

    <!-- Step 4: Success -->
    @if($step === 4)
    <div class="text-center py-10" x-transition:enter="transition cubic-bezier(0,0,0,1) duration-500 scale-90 opacity-0"
        x-transition:enter-end="scale-100 opacity-100">
        <div
            class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center text-5xl mx-auto mb-8 animate-bounce">
            ✅
        </div>
        <h3 class="font-urbanist font-extrabold text-4xl mb-4">Appointment Requested!</h3>
        <p class="text-clinic-slate text-lg mb-10 max-w-lg mx-auto">Thank you, <span
                class="font-bold text-clinic-navy">{{ $patient_name }}</span>. We have received your request and will
            contact you shortly at <span class="font-bold text-clinic-navy">{{ $email }}</span> to confirm your session.
        </p>
        <button wire:click="$set('step', 1)"
            class="bg-clinic-navy text-white px-10 py-4 rounded-full font-urbanist font-bold hover:bg-clinic-royal transition shadow-xl">
            Book Another One
        </button>
    </div>
    @endif

    <!-- Navigation Buttons -->
    @if($step < 4) <div class="flex justify-between items-center mt-12 pt-8 border-t border-clinic-light">
        @if($step > 1)
        <button wire:click="prevStep"
            class="font-bold text-clinic-navy hover:text-clinic-royal transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Previous Step
        </button>
        @else
        <div></div>
        @endif

        @if($step < 3) <button wire:click="nextStep"
            class="bg-clinic-navy text-white px-10 py-4 rounded-full font-urbanist font-bold hover:bg-clinic-royal transition shadow-xl flex items-center">
            Next Step
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            </button>
            @else
            <button wire:click="submit"
                class="bg-clinic-royal text-white px-12 py-4 rounded-full font-urbanist font-bold hover:bg-clinic-navy transition shadow-xl shadow-clinic-royal/20 flex items-center">
                Confirm Booking
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </button>
            @endif
</div>
@endif
</div>
</div>