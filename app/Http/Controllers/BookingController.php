<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Ticket;
use App\Models\Event;

class BookingController extends Controller
{
    public function cancel($id)
    {
        // Cari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id);

        // Pastikan tiket dalam status "active"
        if ($ticket->status !== 'active') {
            return redirect()->back()->with('error', 'Cannot cancel this ticket. It is not active.');
        }

        // Cari booking yang terkait dengan tiket
        $booking = $ticket->booking;

        // Cari acara yang terkait
        $event = $ticket->event;

        // Pastikan acara belum melewati waktu
        if (now()->greaterThan($event->tanggal_waktu)) {
            return redirect()->back()->with('error', 'Cannot cancel this ticket. The event has already passed.');
        }

        // Ubah status tiket menjadi "canceled"
        $ticket->status = 'canceled';
        $ticket->save();

        // Tambahkan kembali kuota tiket acara
        $event->kouta_tiket += 1;
        $event->save();

        // Perbarui status booking jika semua tiket dibatalkan
        $activeTickets = $booking->tickets->where('status', 'active');
        if ($activeTickets->count() === 0) {
            $booking->status = 'canceled';
            $booking->save();
        }

        return redirect()->back()->with('success', 'Your ticket has been successfully canceled.');
    }
}
