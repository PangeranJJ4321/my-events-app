<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Event $event)
    {
        // Validasi data input
        $validated = $request->validate([
            'review_text' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Simpan review
        $review = new Review();
        $review->user_id = Auth::id(); // Pastikan ID user yang login digunakan
        $review->event_id = $event->id;
        $review->rating = $validated['rating'];
        $review->review_text = $validated['review_text'];
        $review->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Review berhasil disimpan!');
    }
}
