<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorit;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request)
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user();
    
        // Mengambil ID event dari input form
        $eventId = $request->input('event_id');
    
        // Cek apakah event sudah ada di tabel favorit
        $favorite = Favorit::where('user_id', $user->id)
                            ->where('event_id', $eventId)
                            ->first();
    
        if ($favorite) {
            // Jika sudah ada, hapus dari favorit (toggle off)
            $favorite->delete();
        } else {
            // Jika belum ada, tambahkan ke favorit (toggle on)
            Favorit::create([
                'user_id' => $user->id,
                'event_id' => $eventId,
            ]);
        }
    
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('message', 'Favorite status updated!');
    }
    
}
    

