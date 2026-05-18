<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.index');
})->name('home');

Route::get('/gallery', function () {
    return view('frontend.pages.gallery.index');
})->name('gallery');

Route::get('/rooms', function () {
    return view('frontend.pages.rooms.index');
})->name('rooms');

Route::get('/room-details', function () {
    return view('frontend.pages.rooms.room-details');
})->name('room-details');

Route::get('/about-us', function () {
    return view('frontend.pages.about-us');
})->name('about-us');

Route::get('/services', function () {
    return view('frontend.pages.services.index');
})->name('services');

Route::get('/service-details', function () {
    return view('frontend.pages.services.service-details');
})->name('service-details');

Route::get('/facilities', function () {
    return view('frontend.pages.facilities');
})->name('facilities');

Route::get('/our-team', function () {
    return view('frontend.pages.our-team');
})->name('our-team');

Route::get('/contact-us', function () {
    return view('frontend.pages.contact-us');
})->name('contact-us');

Route::get('/faqs', function () {
    return view('frontend.pages.faqs');
})->name('faqs');

Route::get('/spa', function () {
    return view('frontend.pages.spa');
})->name('spa');

Route::get('/checkout', function () {
    return view('frontend.pages.checkout');
})->name('checkout');

Route::get('/login', function () {
    return view('frontend.pages.login');
})->name('login');

Route::get('/blogs', function () {
    return view('frontend.pages.blogs.index');
})->name('blogs');

Route::get('/blog-details', function () {
    return view('frontend.pages.blogs.blog-details');
})->name('blog-details');

Route::get('/restaurant', function () {
    return view('frontend.pages.restaurant');
})->name('restaurant');
