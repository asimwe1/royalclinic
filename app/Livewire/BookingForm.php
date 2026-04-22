<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Doctor;
use Livewire\Component;
use Illuminate\Support\Carbon;

class BookingForm extends Component
{
    public $step = 1;

    // Form fields
    public $service_id;
    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $patient_name;
    public $email;
    public $phone;
    public $message;

    public function mount()
    {
        $this->appointment_date = date('Y-m-d');
    }

    public function nextStep()
    {
        $this->validateStep();
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    protected function validateStep()
    {
        if ($this->step === 1) {
            $this->validate(['service_id' => 'required|exists:services,id']);
        }
        elseif ($this->step === 2) {
            $this->validate([
                'appointment_date' => 'required|date|after_or_equal:today',
                'appointment_time' => 'required',
            ]);
        }
        elseif ($this->step === 3) {
            $this->validate([
                'patient_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
            ]);
        }
    }

    public function submit()
    {
        $this->validateStep();

        $dateTime = Carbon::parse($this->appointment_date . ' ' . $this->appointment_time);

        Appointment::create([
            'patient_name' => $this->patient_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'service_id' => $this->service_id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $dateTime,
            'status' => 'pending',
            'message' => $this->message,
        ]);

        $this->step = 4;
    }

    public function render()
    {
        return view('livewire.booking-form', [
            'services' => Service::where('is_active', true)->get(),
            'doctors' => Doctor::where('is_active', true)->get(),
            'timeSlots' => [
                '08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'
            ],
        ]);
    }
}