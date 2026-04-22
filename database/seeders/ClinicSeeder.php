<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClinicSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'General Dentistry', 'icon' => '🦷', 'description' => 'Comprehensive dental care for you and your family, ensuring long-term oral health and wellness.'],
            ['title' => 'Cosmetic Dentistry', 'icon' => '✨', 'description' => 'Enhance your smile with our advanced cosmetic treatments, including whitening and veneers.'],
            ['title' => 'Orthodontics', 'icon' => '📏', 'description' => 'Straighten your teeth and improve your bite with our personalized orthodontic solutions.'],
            ['title' => 'Dental Implants', 'icon' => '🔩', 'description' => 'Permanent solutions for missing teeth that look and feel completely natural.'],
            ['title' => 'Emergency Care', 'icon' => '🚨', 'description' => 'Swift and effective treatment for dental emergencies to relieve pain and save your smile.'],
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'icon' => $service['icon'],
                'description' => $service['description'],
                'is_active' => true,
            ]);
        }

        $doctors = [
            ['name' => 'Dr. Landry N.', 'specialty' => 'Oral Surgeon', 'bio' => 'Expert in complex dental surgeries with over 10 years of experience.'],
            ['name' => 'Dr. Diane M.', 'specialty' => 'Cosmetic Dentist', 'bio' => 'Specializing in creating beautiful, natural-looking smiles.'],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create([
                'name' => $doctor['name'],
                'specialty' => $doctor['specialty'],
                'bio' => $doctor['bio'],
                'is_active' => true,
            ]);
        }
    }
}