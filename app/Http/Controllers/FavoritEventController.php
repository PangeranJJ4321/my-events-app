<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorit;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FavoritEventController extends Controller
{
    // Menampilkan daftar favorit
    public function index()
    {

        $favoriteEvents = Favorit::join('events', 'favorits.event_id', '=', 'events.id')
            ->where('favorits.user_id', Auth::id())
            ->select([
                'favorits.id as id',
                'events.nama_acara',
                'events.lokasi',
                'events.harga_tiket',
                DB::raw('DATE(events.tanggal_waktu) as tanggal_waktu'),
                'events.deskripsi',
                DB::raw('COALESCE(events.gambar_acara, "https://via.placeholder.com/500x300") as gambar_acara')
            ])
            ->get();


        return view('favorit', compact('favoriteEvents'));
    }

    public function hapus(int $eventId)
    {
        // Cari favorit berdasarkan event_id dan user_id
        $favorit = Favorit::where('event_id', $eventId)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();
    
        // Hapus favorit
        $favorit->delete();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('favorits.index')->with('success', 'Event favorit berhasil dihapus.');
    }
    
}
