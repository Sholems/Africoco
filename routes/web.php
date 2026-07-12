<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/programs', [PageController::class, 'programs'])->name('programs');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/events/{event:slug}', [PageController::class, 'eventShow'])->name('events.show');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{blogPost:slug}', [PageController::class, 'blogShow'])->name('blog.show');
Route::get('/partners', [PageController::class, 'partners'])->name('partners');
Route::get('/volunteer', [PageController::class, 'volunteer'])->name('volunteer');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/strategic-pillars', [PageController::class, 'strategicPillars'])->name('strategic-pillars');
Route::get('/impact', [PageController::class, 'impact'])->name('impact');
Route::get('/corporate-partnerships', [PageController::class, 'corporatePartnerships'])->name('corporate-partnerships');
// Donations are intentionally hidden until payment processing is ready for launch.
Route::redirect('/donate', '/corporate-partnerships')->name('donate');

// Form Submission Routes
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');
Route::post('/volunteer', [VolunteerController::class, 'store'])->name('volunteer.apply');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin Authentication
Route::post('/admin/login', [AdminLoginController::class, 'store'])->middleware('guest')->name('admin.login.store');

// Event Registration
Route::post('/events/{event}/register', [PageController::class, 'eventRegister'])->name('events.register');

// Breeze Auth Routes
Route::get('/dashboard', function () {
    if (auth()->user()?->can('view dashboard')) {
        return redirect('/admin');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
