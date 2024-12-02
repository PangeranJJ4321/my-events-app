<?php
// app/Http/Controllers/WelcomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Review;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import Carbon

class WelcomeController extends Controller
{
    public function index()
{
    // Mengambil data 1 event dengan rating tertinggi
    $events = Event::select('events.nama_acara', DB::raw('ROUND(AVG(reviews.rating)) AS rating_tertinggi'), 'events.harga_tiket', 'events.gambar_acara')
        ->join('reviews', 'events.id', '=', 'reviews.event_id')
        ->groupBy('events.nama_acara', 'events.harga_tiket', 'events.gambar_acara')
        ->orderByDesc('rating_tertinggi')
        ->limit(5)
        ->get();
    
    $categories = Category::all();

    
    $upcomingEvents = Event::select(
        DB::raw('LEFT(MONTHNAME(tanggal_waktu), 3) as month'), 
        DB::raw('DAY(tanggal_waktu) as day'), 
        DB::raw('DATE_FORMAT(tanggal_waktu, "%a %d %b %Y, %h:%i %p") as formatted_date'),
        'categories.category_name as category_name', 
        'events.nama_acara',
        'events.id',
        'events.gambar_acara',
        'events.deskripsi',
        'events.lokasi',
        'events.tanggal_waktu', 
        'events.harga_tiket'
    )
    ->join('event_categories', 'events.id', '=', 'event_categories.event_id') 
    ->join('categories', 'event_categories.category_id', '=', 'categories.id') 
    ->where('tanggal_waktu', '>', Carbon::now())
    ->orderBy('tanggal_waktu', 'asc')
    ->limit(9)
    ->get();
    

    return view('welcome2', compact('events', 'categories', 'upcomingEvents'));
    // return view('partials.searching');
}


}
