<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Livewire\Component;
use Livewire\Attributes\Validate;

class BookingForm extends Component
{
    public int $step = 1;
    public bool $submitting = false;

    // Step 1
    public ?int $service_id = null;

    // Step 2
    public string $appointment_date = '';
    public string $appointment_time = '';
    public ?int $doctor_id = null;

    // Step 3
    public string $patient_name = '';
    public string $email       = '';
    public string $phone       = '';
    public string $message     = '';

    // Computed summary values for step 4
    public string $confirmed_name    = '';
    public string $confirmed_email   = '';
    public string $confirmed_service = '';
    public string $confirmed_date    = '';
    public string $confirmed_time    = '';

    public array $timeSlots = [
        '08:00', '09:00', '10:00', '11:00',
        '13:00', '14:00', '15:00', '16:00', '17:00',
    ];

    public function mount(): void
    {
        // Default to tomorrow so it's always a valid future date
        $this->appointment_date = now()->addDay()->format('Y-m-d');
    }

    // ── Step navigation ────────────────────────────────────────────────

    public function nextStep(): void
    {
        $this->validateCurrentStep();
        $this->step++;
        $this->resetErrorBag();
    }

    public function prevStep(): void
    {
        $this->step = max(1, $this->step - 1);
        $this->resetErrorBag();
    }

    public function selectService(int $id): void
    {
        $this->service_id = $id;
        $this->resetErrorBag('service_id');
    }

    public function selectTime(string $time): void
    {
        $this->appointment_time = $time;
        $this->resetErrorBag('appointment_time');
    }

    // ── Validation per step ───────────────────────────────────────────

    protected function validateCurrentStep(): void
    {
        match ($this->step) {
            1 => $this->validate([
                'service_id' => 'required|integer|exists:services,id',
            ], [
                'service_id.required' => 'Please select a service to continue.',
            ]),
            2 => $this->validate([
                'appointment_date' => 'required|date|after_or_equal:today',
                'appointment_time' => 'required',
            ], [
                'appointment_date.required'         => 'Please pick a date.',
                'appointment_date.after_or_equal'   => 'Date must be today or in the future.',
                'appointment_time.required'          => 'Please select a time slot.',
            ]),
            3 => $this->validate([
                'patient_name' => 'required|string|min:2|max:255',
                'email'        => 'required|email|max:255',
                'phone'        => 'required|string|min:7|max:20',
            ], [
                'patient_name.required' => 'Please enter your full name.',
                'email.required'        => 'Please enter a valid email address.',
                'phone.required'        => 'Please enter your phone number.',
            ]),
            default => null,
        };
    }

    // ── Final submit ──────────────────────────────────────────────────

    public function submit(): void
    {
        $this->submitting = true;

        // Re-validate step 3 fields
        $this->validate([
            'patient_name' => 'required|string|min:2|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|min:7|max:20',
            'service_id'   => 'required|integer|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        $dateTime = \Carbon\Carbon::parse(
            $this->appointment_date . ' ' . $this->appointment_time
        );

        Appointment::create([
            'patient_name'     => $this->patient_name,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'service_id'       => $this->service_id,
            'doctor_id'        => $this->doctor_id ?: null,
            'appointment_date' => $dateTime,
            'status'           => 'pending',
            'message'          => $this->message ?: null,
        ]);

        // Store summary before reset
        $service = Service::find($this->service_id);
        $this->confirmed_name    = $this->patient_name;
        $this->confirmed_email   = $this->email;
        $this->confirmed_service = $service?->title ?? '—';
        $this->confirmed_date    = \Carbon\Carbon::parse($this->appointment_date)->format('D, M j Y');
        $this->confirmed_time    = $this->appointment_time;

        $this->submitting = false;
        $this->step = 4;
    }

    public function restart(): void
    {
        $this->reset([
            'service_id', 'appointment_date', 'appointment_time',
            'doctor_id', 'patient_name', 'email', 'phone', 'message',
        ]);
        $this->appointment_date = now()->addDay()->format('Y-m-d');
        $this->resetErrorBag();
        $this->step = 1;
    }

    // ── Render ────────────────────────────────────────────────────────

    public function render()
    {
        return view('livewire.booking-form', [
            'services' => Service::where('is_active', true)->get(),
            'doctors'  => Doctor::where('is_active', true)->get(),
        ]);
    }
}