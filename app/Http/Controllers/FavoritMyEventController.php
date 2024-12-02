<?php

namespace App\Http\Controllers;

use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritMyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus favorit
        $favorit = Favorit::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $favorit->delete();

        return redirect()->route('favorite-events.index')->with('success', 'Event favorit berhasil dihapus.');
    }
}
