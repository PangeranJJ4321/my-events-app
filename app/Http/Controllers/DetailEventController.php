<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DetailEventController extends Controller
{
    public function show(Request $request)
    {
        // Ambil parameter event_id dari query string
        $id = $request->query('event_id');
    
        // Validasi jika event_id tidak diberikan
        if (!$id) {
            return redirect('/events')->with('error', 'Event ID is missing!');
        }
    
        // Ambil data event berdasarkan event_id
        $events = Event::select(
            'users.name as user_name',
            'users.email as user_email',
            'events.id',
            'events.nama_acara',
            'events.gambar_acara',
            'events.lokasi',
            'events.tanggal_waktu',
            'events.kouta_tiket',
            'events.deskripsi',
            'events.harga_tiket',
        )
        ->join('users', 'events.user_id', '=', 'users.id')
        ->where('events.id', $id) // Filter berdasarkan id
        ->first();
    
        // Jika data tidak ditemukan
        if (!$events) {
            return redirect('/events')->with('error', 'Event not found!');
        }
    
        // Memformat tanggal_waktu ke zona waktu WITA
        $events->tanggal_waktu = \Carbon\Carbon::parse($events->tanggal_waktu)
            ->timezone('Asia/Makassar')
            ->format('l d F Y, H:i');
        
        // Mengambil rata-rata rating menggunakan AVG() dari tabel reviews
        $averageRating = DB::table('reviews')
        ->where('event_id', $id)
        ->avg('rating');

        // Ambil data review berdasarkan event_id
        $reviews = Review::with('user') // Mengambil relasi user untuk setiap review
        ->select(
            'reviews.*', // Ambil semua kolom dari tabel reviews
            DB::raw('DATE_FORMAT(review_date, "%a %d %b %Y, %h:%i %p") as formatted_date') // Format tanggal
        )
        ->where('event_id', $id) // Filter berdasarkan event_id
        ->orderBy('review_date', 'desc') // Mengurutkan berdasarkan tanggal review
        ->get();
    
        
        return view('details', [
            'events' => $events,
            'reviews' => $reviews,
            'averageRating' => $averageRating,
        ]);
    }

    
    public function sameEvent($eventId)
    {
        // Mengambil event saat ini berdasarkan ID
        $currentEvent = Event::findOrFail($eventId);
    
        // Query untuk mendapatkan event berdasarkan kategori yang sama, kecuali event saat ini
        $events = Event::select(
            DB::raw('LEFT(MONTHNAME(tanggal_waktu), 3) as month'),
            DB::raw('DAY(tanggal_waktu) as day'),
            DB::raw('DATE_FORMAT(tanggal_waktu, "%a %d %b %Y, %h:%i %p") as formatted_date'),
            'categories.category_name as category_name',
            'events.nama_acara',
            'events.gambar_acara as gambar',
            'events.lokasi as t4',
            'events.tanggal_waktu',
            'events.harga_tiket as harga'
        )
        ->join('event_categories', 'events.id', '=', 'event_categories.event_id')
        ->join('categories', 'event_categories.category_id', '=', 'categories.id')
        ->where('categories.id', $currentEvent->categories->pluck('id')->first()) // Filter kategori yang sama
        ->where('events.id', '!=', $eventId) // Kecualikan event saat ini
        ->get();
               
    
        // Mengirim data ke view
        return view('partials.same_events', compact('events', 'currentEvent'));

    }
    
    
}
