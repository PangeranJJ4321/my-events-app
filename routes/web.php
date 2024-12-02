<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FavoritEventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavoritMyEventController;
use App\Models\Favorit;

Route::get('/home', [WelcomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('master2');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route bagian welcome


Route::get('/events', [EventController::class, 'browseEvents'])->name('browse.events'); 
Route::get('/events', [EventController::class, 'showEvents'])->name('events.index');
Route::get('/events/category/{category}', [EventController::class, 'exploreCategory'])->name('explore.category'); // Untuk menampilkan event berdasarkan kategori
Route::get('/events/detail', [DetailEventController::class, 'show'])->name('event.show');
Route::post('/events/{id}/buy', [EventController::class, 'buyTicket'])->name('events.buy');

// Route::get('/events/detail/{eventId}', [DetailEventController::class, 'sameEvent']);


Route::post('/favorite/toggle', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');

// Mendapatkan semua review untuk event tertentu
// Route::get('/reviews/get/{event_id}', [ReviewController::class, 'getReviews'])->name('reviews.get');

// Menyimpan review baru
Route::post('/reviews/{event}', [ReviewController::class, 'store'])->name('make.review');

// Menghapus review
// Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::resource('dashboard/attendee/favorite-events', FavoritMyEventController::class)
    ->middleware('auth');

// Route untuk ke myticket
Route::get('/dashboard/attendee/my-tickets', [TicketController::class, 'index'])
    ->name('tickets.index')
    ->middleware('auth');

Route::get('/dashboard/attendee/my-tickets/{ticketCode}', [TicketController::class, 'show'])
    ->name('tickets.show')
    ->middleware('auth');

Route::delete('/dashboard/attendee/my-tickets/{ticketCode}', [TicketController::class, 'destroy'])
    ->name('tickets.destroy')
    ->middleware('auth');
 
Route::patch('/dashboard/attendee/my-tickets/{ticketCode}/cancel', [TicketController::class, 'cancel'])
    ->name('tickets.cancel')
    ->middleware('auth');

require __DIR__.'/auth.php';
