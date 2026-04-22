<div class="bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-gray-100">

    {{-- ── Progress Steps ───────────────────────────────────────────── --}}
    <div class="bg-gray-50 px-6 py-5 border-b border-gray-100">
        <div class="flex items-center justify-between relative">
            {{-- Connector line behind the steps --}}
            <div class="absolute left-0 right-0 top-5 h-0.5 bg-gray-200 mx-10 z-0"></div>

            @foreach(['Service', 'Schedule', 'Details', 'Done'] as $i => $label)
            @php $num = $i + 1; @endphp
            <div class="flex flex-col items-center z-10 flex-1">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 shadow-sm
                    @if($step > $num) bg-green-500 text-white
                    @elseif($step == $num) bg-[#1a4fba] text-white scale-110 ring-4 ring-[#1a4fba]/20
                    @else bg-white text-gray-400 border-2 border-gray-200
                    @endif">
                    @if($step > $num)
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                    @else
                    {{ $num }}
                    @endif
                </div>
                <span
                    class="text-xs font-semibold mt-2 @if($step == $num) text-[#1a4fba] @elseif($step > $num) text-green-500 @else text-gray-400 @endif">
                    {{ $label }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── Step Content ─────────────────────────────────────────────── --}}
    <div class="p-6 sm:p-10">

        {{-- STEP 1: Choose Service --}}
        @if($step === 1)
        <div>
            <h3 class="font-bold text-[#0d1e3d] text-2xl mb-1">Choose a Service</h3>
            <p class="text-gray-400 text-sm mb-7">Select the treatment you would like to book.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @foreach($services as $service)
                <button wire:click="selectService({{ $service->id }})" type="button" class="relative flex items-start p-5 rounded-xl border-2 text-left cursor-pointer transition-all duration-200
                        @if($service_id == $service->id)
                            border-[#1a4fba] bg-[#1a4fba]/5 shadow-md
                        @else
                            border-gray-200 hover:border-[#1a4fba]/40 hover:bg-gray-50
                        @endif">

                    <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl flex-shrink-0 mr-4
                        @if($service_id == $service->id) bg-[#1a4fba]/10 @else bg-gray-50 @endif">
                        {{ $service->icon ?: '🦷' }}
                    </div>
                    <div class="min-w-0">
                        <span class="block font-bold text-[#0d1e3d] text-sm">{{ $service->title }}</span>
                        <span class="block text-xs text-gray-400 mt-0.5 truncate">
                            {{ \Illuminate\Support\Str::limit(strip_tags($service->description ?? ''), 55) }}
                        </span>
                    </div>

                    @if($service_id == $service->id)
                    <div class="ml-auto pl-2 flex-shrink-0">
                        <div class="w-6 h-6 rounded-full bg-[#1a4fba] flex items-center justify-center">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    @endif
                </button>
                @endforeach
            </div>

            @error('service_id')
            <p class="text-red-500 text-sm mt-3 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
            </p>
            @enderror
        </div>
        @endif

        {{-- STEP 2: Schedule --}}
        @if($step === 2)
        <div>
            <h3 class="font-bold text-[#0d1e3d] text-2xl mb-1">Schedule Appointment</h3>
            <p class="text-gray-400 text-sm mb-7">Pick your preferred date, time, and doctor.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-xs font-bold text-[#0d1e3d] mb-2 uppercase tracking-wide">Date</label>
                    <input type="date" wire:model.live="appointment_date" min="{{ date('Y-m-d') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-[#1a4fba]/30 focus:border-[#1a4fba] transition">
                    @error('appointment_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#0d1e3d] mb-2 uppercase tracking-wide">Preferred
                        Doctor</label>
                    <select wire:model="doctor_id"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-[#1a4fba]/30 focus:border-[#1a4fba] transition">
                        <option value="">Any available doctor</option>
                        @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} — {{ $doctor->specialty }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#0d1e3d] mb-3 uppercase tracking-wide">Available Time
                    Slots</label>
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-2.5">
                    @foreach($timeSlots as $time)
                    <button type="button" wire:click="selectTime('{{ $time }}')" class="py-3 rounded-xl font-semibold text-sm transition-all duration-200 border-2
                            @if($appointment_time === $time)
                                bg-[#1a4fba] border-[#1a4fba] text-white shadow-md
                            @else
                                bg-white border-gray-200 text-[#0d1e3d] hover:border-[#1a4fba]/50 hover:bg-[#1a4fba]/5
                            @endif">
                        {{ $time }}
                    </button>
                    @endforeach
                </div>
                @error('appointment_time')
                <p class="text-red-500 text-xs mt-2 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
                @enderror
            </div>
        </div>
        @endif

        {{-- STEP 3: Patient Details --}}
        @if($step === 3)
        <div>
            <h3 class="font-bold text-[#0d1e3d] text-2xl mb-1">Your Details</h3>
            <p class="text-gray-400 text-sm mb-7">Almost there — just a few contact details.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-[#0d1e3d] mb-2 uppercase tracking-wide">Full Name</label>
                    <input type="text" wire:model.blur="patient_name" placeholder="John Doe"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a4fba]/30 focus:border-[#1a4fba] transition @error('patient_name') border-red-400 @enderror">
                    @error('patient_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#0d1e3d] mb-2 uppercase tracking-wide">Email
                        Address</label>
                    <input type="email" wire:model.blur="email" placeholder="you@example.com"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a4fba]/30 focus:border-[#1a4fba] transition @error('email') border-red-400 @enderror">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#0d1e3d] mb-2 uppercase tracking-wide">Phone
                        Number</label>
                    <input type="tel" wire:model.blur="phone" placeholder="+250 788 000 000"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a4fba]/30 focus:border-[#1a4fba] transition @error('phone') border-red-400 @enderror">
                    @error('phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-[#0d1e3d] mb-2 uppercase tracking-wide">Additional Notes
                        <span class="font-normal text-gray-400">(Optional)</span></label>
                    <textarea wire:model="message" rows="3"
                        placeholder="Any specific concerns or information for the doctor..."
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1a4fba]/30 focus:border-[#1a4fba] transition resize-none"></textarea>
                </div>
            </div>

            {{-- Booking Summary Preview --}}
            <div class="mt-6 p-4 rounded-xl bg-[#0d1e3d]/5 border border-[#0d1e3d]/10 text-sm">
                <p class="font-bold text-[#0d1e3d] mb-2 text-xs uppercase tracking-wide">Your Booking Summary</p>
                <div class="grid grid-cols-2 gap-y-1 text-xs text-gray-600">
                    <span class="font-semibold">Service:</span>
                    <span>{{ $services->where('id', $service_id)->first()?->title ?? '—' }}</span>
                    <span class="font-semibold">Date:</span>
                    <span>{{ $appointment_date ? \Carbon\Carbon::parse($appointment_date)->format('D, M j Y') : '—'
                        }}</span>
                    <span class="font-semibold">Time:</span>
                    <span>{{ $appointment_time ?: '—' }}</span>
                    <span class="font-semibold">Doctor:</span>
                    <span>{{ $doctor_id ? ($doctors->where('id', $doctor_id)->first()?->name ?? 'Not set') : 'Any
                        available' }}</span>
                </div>
            </div>
        </div>
        @endif

        {{-- STEP 4: Confirmation --}}
        @if($step === 4)
        <div class="text-center py-6">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="font-bold text-[#0d1e3d] text-2xl mb-2">Appointment Requested!</h3>
            <p class="text-gray-400 text-sm mb-6 max-w-sm mx-auto">
                Thank you, <span class="font-bold text-[#0d1e3d]">{{ $confirmed_name }}</span>. We'll confirm your
                appointment at <span class="font-bold text-[#1a4fba]">{{ $confirmed_email }}</span> shortly.
            </p>

            <div class="bg-gray-50 rounded-xl p-5 max-w-xs mx-auto text-left mb-7 border border-gray-100 text-sm">
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">Service</span>
                        <span class="font-bold text-[#0d1e3d]">{{ $confirmed_service }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">Date</span>
                        <span class="font-bold text-[#0d1e3d]">{{ $confirmed_date }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">Time</span>
                        <span class="font-bold text-[#0d1e3d]">{{ $confirmed_time }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-medium">Status</span>
                        <span class="text-yellow-600 font-bold">⏳ Pending Confirmation</span>
                    </div>
                </div>
            </div>

            <button wire:click="restart" type="button"
                class="bg-[#1a4fba] text-white px-8 py-3 rounded-full font-bold text-sm hover:bg-[#0d1e3d] transition-all duration-300 shadow-lg">
                Book Another Appointment
            </button>
        </div>
        @endif

    </div>

    {{-- ── Navigation Buttons ───────────────────────────────────────── --}}
    @if($step < 4) <div
        class="px-6 sm:px-10 pb-8 flex items-center @if($step > 1) justify-between @else justify-end @endif gap-4">

        @if($step > 1)
        <button type="button" wire:click="prevStep"
            class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-[#0d1e3d] transition gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </button>
        @endif

        @if($step < 3) <button type="button" wire:click="nextStep" wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-not-allowed"
            class="inline-flex items-center gap-2 bg-[#0d1e3d] text-white text-sm font-bold px-7 py-3 rounded-full hover:bg-[#1a4fba] transition-all duration-300 shadow-lg">
            <span wire:loading.remove wire:target="nextStep">Continue</span>
            <span wire:loading wire:target="nextStep">Processing…</span>
            <svg wire:loading.remove wire:target="nextStep" class="w-4 h-4" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <svg wire:loading wire:target="nextStep" class="w-4 h-4 animate-spin" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12a8 8 0 018-8v8H4z" />
            </svg>
            </button>
            @else
            <button type="button" wire:click="submit" wire:loading.attr="disabled"
                wire:loading.class="opacity-70 cursor-not-allowed"
                class="inline-flex items-center gap-2 bg-[#1a4fba] text-white text-sm font-bold px-8 py-3 rounded-full hover:bg-[#0d1e3d] transition-all duration-300 shadow-lg shadow-[#1a4fba]/20">
                <span wire:loading.remove wire:target="submit">Confirm Booking</span>
                <span wire:loading wire:target="submit">Submitting…</span>
                <svg wire:loading.remove wire:target="submit" class="w-4 h-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <svg wire:loading wire:target="submit" class="w-4 h-4 animate-spin" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12a8 8 0 018-8v8H4z" />
                </svg>
            </button>
            @endif

</div>
@endif

</div>

</div>