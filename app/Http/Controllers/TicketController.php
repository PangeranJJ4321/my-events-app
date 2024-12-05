<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        // Mengambil user ID yang sedang login
        $userId = Auth::id();

        // Mengambil data tiket yang dimiliki user
        $bookings = DB::table('tickets')
            ->join('events', 'tickets.event_id', '=', 'events.id')
            ->join('bookings', 'tickets.booking_id', '=', 'bookings.id')
            ->where('bookings.user_id', $userId) // Hanya tiket milik user
            ->select(
                'events.nama_acara',
                'events.tanggal_waktu',
                'events.lokasi',
                'events.harga_tiket',
                'events.deskripsi',
                'tickets.ticket_code',
                'tickets.status as status_tiket',
                'bookings.status as status_booking',
                'bookings.id',
                DB::raw('COALESCE(events.gambar_acara, "https://via.placeholder.com/400x200") as gambar_acara')
            )
            ->get();

        // Mengirim data ke view
        return view('myticket', compact('bookings'));
    }

    // Method untuk menampilkan detail tiket
    public function show($ticketCode)
    {
        $userId = Auth::id();

        // Ambil detail tiket berdasarkan kode tiket dan user yang sedang login
        $ticket = DB::table('tickets')
            ->join('events', 'tickets.event_id', '=', 'events.id')
            ->join('bookings', 'tickets.booking_id', '=', 'bookings.id')
            ->where('tickets.ticket_code', $ticketCode)
            ->where('bookings.user_id', $userId)
            ->select(
                'tickets.ticket_code',
                'bookings.status',
                'events.nama_acara',
                'events.tanggal_waktu',
                'events.lokasi',
                'events.deskripsi',
                'events.harga_tiket',
                'bookings.total_tickets',
                DB::raw('COALESCE(events.gambar_acara, "https://via.placeholder.com/800x400") as gambar_acara')
            )
            ->first();

        // Jika tiket tidak ditemukan
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found.');
        }

        return view('myticket', compact('ticket'));
    }

 // Method untuk membatalkan tiket
    public function cancel($ticketCode)
    {
        $userId = Auth::id();

        // Ambil tiket yang akan dibatalkan
        $ticket = DB::table('tickets')
            ->join('bookings', 'tickets.booking_id', '=', 'bookings.id')
            ->where('tickets.ticket_code', $ticketCode)
            ->where('bookings.user_id', $userId)
            ->where('tickets.status', 'active') // Hanya tiket yang aktif yang bisa dibatalkan
            ->select('tickets.id', 'tickets.status', 'tickets.event_id', 'bookings.total_tickets')
            ->first();

        // Jika tiket tidak ditemukan
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not eligible for cancellation.');
        }

        // Update status tiket menjadi "canceled"
        DB::table('tickets')
            ->where('id', $ticket->id)
            ->update(['status' => 'canceled']);

        // Tambahkan kembali kuota tiket di tabel events
        DB::table('events')
            ->where('id', $ticket->event_id)
            ->increment('kouta_tiket', 1);

        return redirect()->route('tickets.index')->with('success', 'Ticket has been successfully canceled.');
    }

    // buat method untuk hapus ticket
    public function destroy($ticketCode)
    {
        // Cari tiket berdasarkan kode tiket
        $ticket = Ticket::where('ticket_code', $ticketCode)->first();

        // Jika tiket tidak ditemukan, kembalikan dengan pesan error
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found.');
        }

        // Hapus tiket
        $ticket->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('tickets.index')->with('success', 'Ticket successfully deleted.');
    }


}
