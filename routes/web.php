<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\ContactLeadController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\RoomFacilityController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\HomeAboutSectionController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\MissionVisionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\NearbyAttractionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\EventAboutSectionController;

// ==================== FRONTEND ROUTES ====================
Route::get('/', function () {
    return view('frontend.pages.index');
})->name('home');

Route::get('/gallery', function () {
    return view('frontend.pages.gallery.index');
})->name('gallery');

// ==================== FRONTEND: ROOMS ====================
Route::get('/zp-rooms', function () {
    $categories = App\Models\RoomCategory::where('status', 'active')->get();
    $rooms = App\Models\Room::with('category')->where('status', 'active')->paginate(12);
    return view('frontend.pages.rooms.index', compact('rooms', 'categories'));
})->name('zp-rooms');
Route::get('/room-details', function () {
    return view('frontend.pages.rooms.room-details');
})->name('room-details');
Route::get('/rooms/{slug}', [RoomController::class, 'show'])->name('room-details');



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

// 🔹 Frontend Login (for customers)
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
// near by attraction
Route::get('nearby-attraction', function () {
    return view('frontend.pages.nearby-attractions');
})->name('nearby-attraction');
// meeting
Route::get('meetings-events', function () {
    return view('frontend.pages.meetings-events');
})->name('meetings-events');

Route::get('meetings-events-detail/{id}', function ($id) {
    $event = \App\Models\Event::findOrFail($id);

    return view('frontend.pages.event-details', compact('event'));
})->name('meetings-events-detail');
// contact leads
Route::post('/store', [ContactLeadController::class, 'store'])->name('contact-us.store');

// ==================== ADMIN PANEL ====================

// ✅ GET: Show admin login form
Route::get('/admin-panel', [LoginController::class, 'showAdminLoginForm'])->name('admin-panel');

// ✅ POST: Handle admin login submission  
Route::post('/admin-panel', [LoginController::class, 'adminLogin'])->name('admin.login');

// ✅ GET: Protected dashboard
Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->name('dashboard')->middleware('auth');

// ✅ POST: Admin logout
Route::post('/admin-logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/icons/search', [IconController::class, 'search']);
// ==================== PROTECTED ADMIN CRUD ====================
Route::middleware('auth')->group(function () {


    // Roles
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::post('/assign-permissions', [RoleController::class, 'assignPermissions'])->name('assignPermissions');
        Route::put('/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');
    });

    // Permissions
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle-status', [PermissionController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status');
    });
    // ==================== ADMIN: ROOM CATEGORIES ====================
    Route::middleware('auth')->prefix('room-categories')->name('room-categories.')->group(function () {
        Route::get('/', [RoomCategoryController::class, 'index'])->name('index');
        Route::post('/', [RoomCategoryController::class, 'store'])->name('store');
        Route::put('/{id}', [RoomCategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoomCategoryController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle-status', [RoomCategoryController::class, 'toggleStatus'])->name('toggle-status');
    });

    // ==================== ADMIN: ROOMS ====================
    Route::middleware('auth')->prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/', [RoomController::class, 'index'])->name('index');
        Route::post('/', [RoomController::class, 'store'])->name('store');
        Route::put('/{id}', [RoomController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoomController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle-status', [RoomController::class, 'toggleStatus'])->name('toggle-status');
        Route::patch('/{id}/toggle-featured', [RoomController::class, 'toggleFeatured'])->name('toggle-featured');
    });
    Route::get('admin-rooms', function () {
        return view('backend.pages.rooms');
    })->name('admin-rooms');

    // admin gallery 
    Route::get('/admin-gallery-category', [GalleryCategoryController::class, 'index'])->name('admin-gallery-categories.index');
    Route::post('/admin-gallery-categories', [GalleryCategoryController::class, 'store'])->name('admin-gallery-categories.store');
    Route::put('/admin-gallery-categories/{category}', [GalleryCategoryController::class, 'update'])->name('admin-gallery-categories.update');
    Route::delete('/admin-gallery-categories/{category}', [GalleryCategoryController::class, 'destroy'])->name('admin-gallery-categories.destroy');

    // gallery images
    Route::get('/admin-gallery-images', [GalleryImageController::class, 'index'])->name('admin-gallery-images.index');
    Route::post('/admin-gallery-images', [GalleryImageController::class, 'store'])->name('admin-gallery-images.store');
    Route::put('/admin-gallery-images/{galleryImage}', [GalleryImageController::class, 'update'])->name('admin-gallery-images.update');
    Route::delete('/admin-gallery-images/{galleryImage}', [GalleryImageController::class, 'destroy'])->name('admin-gallery-images.destroy');
    // admin leads 

    Route::get('/admin-contact-leads', [ContactLeadController::class, 'index'])->name('admin-contact-leads.index');
    Route::delete('/admin-contact-leads/{lead}', [ContactLeadController::class, 'destroy'])->name('admin-contact-leads.destroy');

    // admin team members 
    Route::get('/admin-team', [TeamController::class, 'index'])->name('admin-team.index');
    Route::post('/admin-team', [TeamController::class, 'store'])->name('admin-team.store');
    Route::put('/admin-team/{team}', [TeamController::class, 'update'])->name('admin-team.update');
    Route::delete('/admin-team/{team}', [TeamController::class, 'destroy'])->name('admin-team.destroy');
    // testimonial
    Route::get('/admin-testimonial', [TestimonialController::class, 'index'])->name('admin-testimonial.index');
    Route::post('/admin-testimonial', [TestimonialController::class, 'store'])->name('admin-testimonial.store');
    Route::put('/admin-testimonial/{testimonial}', [TestimonialController::class, 'update'])->name('admin-testimonial.update');
    Route::delete('/admin-testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin-testimonial.destroy');
    // room facility
    Route::get('/admin-room-facility', [RoomFacilityController::class, 'index'])->name('admin-room-facility.index');
    Route::post('/admin-room-facility', [RoomFacilityController::class, 'store'])->name('admin-room-facility.store');
    Route::put('/admin-room-facility/{facility}', [RoomFacilityController::class, 'update'])->name('admin-room-facility.update');
    Route::delete('/admin-room-facility/{facility}', [RoomFacilityController::class, 'destroy'])->name('admin-room-facility.destroy');

    // home about section
    Route::get('/admin-home-about', [HomeAboutSectionController::class, 'index'])->name('admin-home-about.index');
    Route::put('/admin-home-about', [HomeAboutSectionController::class, 'update'])->name('admin-home-about.update');

    // about page 
    Route::get('/admin-about', [AboutSectionController::class, 'index'])->name('admin-about.index');
    Route::put('/admin-about', [AboutSectionController::class, 'update'])->name('admin-about.update');
    // mission vision page 
    Route::get('/mission-vision', [MissionVisionController::class, 'index'])->name('mission-vision.index');
    Route::put('/mission-vision', [MissionVisionController::class, 'update'])->name('mission-vision.update');
    // admin FAQ
    Route::get('/admin-faq', [FaqController::class, 'index'])->name('admin-faq.index');
    Route::post('/admin-faq', [FaqController::class, 'store'])->name('admin-faq.store');
    Route::put('/admin-faq/{faq}', [FaqController::class, 'update'])->name('admin-faq.update');
    Route::delete('/admin-faq/{faq}', [FaqController::class, 'destroy'])->name('admin-faq.destroy');
    // admin Facilities
    Route::get('/admin-facility', [FacilityController::class, 'index'])->name('admin-facility.index');
    Route::post('/admin-facility', [FacilityController::class, 'store'])->name('admin-facility.store');
    Route::put('/admin-facility/{facility}', [FacilityController::class, 'update'])->name('admin-facility.update');
    Route::delete('/admin-facility/{facility}', [FacilityController::class, 'destroy'])->name('admin-facility.destroy');
    // admin nearby attraction
    Route::get('/admin-nearby-attraction', [NearbyAttractionController::class, 'index'])->name('admin-nearby-attraction.index');
    Route::post('/admin-nearby-attraction', [NearbyAttractionController::class, 'store'])->name('admin-nearby-attraction.store');
    Route::put('/admin-nearby-attraction/{attraction}', [NearbyAttractionController::class, 'update'])->name('admin-nearby-attraction.update');
    Route::delete('/admin-nearby-attraction/{attraction}', [NearbyAttractionController::class, 'destroy'])->name('admin-nearby-attraction.destroy');
    // admin event
    Route::get('/admin-event', [EventController::class, 'index'])->name('admin-event.index');
    Route::post('/admin-event', [EventController::class, 'store'])->name('admin-event.store');
    Route::put('/admin-event/{event}', [EventController::class, 'update'])->name('admin-event.update');
    Route::delete('/admin-event/{event}', [EventController::class, 'destroy'])->name('admin-event.destroy');
    // admin slider
    Route::get('/admin-slider', [HomeSliderController::class, 'index'])->name('admin-slider.index');
    Route::post('/admin-slider', [HomeSliderController::class, 'store'])->name('admin-slider.store');
    Route::put('/admin-slider/{event}', [HomeSliderController::class, 'update'])->name('admin-slider.update');
    Route::delete('/admin-slider/{event}', [HomeSliderController::class, 'destroy'])->name('admin-slider.destroy');
    //event about page 
    Route::get('/admin-event-about', [EventAboutSectionController::class, 'index'])->name('admin-event-about.index');
    Route::put('/admin-event-about', [EventAboutSectionController::class, 'update'])->name('admin-event-about.update');

});