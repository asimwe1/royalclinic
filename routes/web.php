<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Doctor;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// About Us page
Route::get('/about', function () {
    $doctors = Doctor::where('is_active', true)->get();
    return view('pages.about', compact('doctors'));
})->name('about');

// Services listing page
Route::get('/services', function () {
    $services = Service::where('is_active', true)->get();
    return view('pages.services', compact('services'));
})->name('services');

// Individual Service page
Route::get('/services/{slug}', function ($slug) {
    $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
    $otherServices = Service::where('is_active', true)->where('id', '!=', $service->id)->take(3)->get();
    return view('pages.service-detail', compact('service', 'otherServices'));
})->name('services.show');

// Contact page
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Blog listing page
Route::get('/blogs', function () {
    return view('pages.blog');
})->name('blog');