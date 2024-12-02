<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Event; // Import model Event
use App\Models\Booking; // Import model Booking
use App\Models\Ticket; // Import model Ticket

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil pengguna dengan ID mulai dari 6 hingga 15
        $users = User::whereBetween('id', [6, 15])->get();

        // Mengambil event dengan ID 1 sampai 6 secara acak
        $eventIds = Event::whereIn('id', [1, 2, 3, 4, 5, 6])->pluck('id')->toArray();

        // Menambahkan booking dan tiket untuk setiap pengguna
        foreach ($users as $user) {
            // Pilih event secara acak dari ID 1 sampai 6
            $eventId = $eventIds[array_rand($eventIds)];

            // Membuat booking untuk pengguna
            $booking = Booking::create([
                'user_id' => $user->id,
                'event_id' => $eventId, // Menggunakan event yang dipilih secara acak
                'booking_date' => now(),
                'total_tickets' => 1, // Setiap user memesan 1 tiket
                'status' => 'pending', // Status booking default
                'total_price' => 100.00, // Contoh harga tiket
            ]);

            // Membuat tiket untuk booking yang baru dibuat
            Ticket::create([
                'booking_id' => $booking->id,
                'event_id' => $eventId, // Menggunakan event yang sama
                'ticket_code' => strtoupper(Str::random(10)), // Membuat kode tiket acak
                'status' => 'inactive', // Status tiket default
            ]);
        }
    }
}
