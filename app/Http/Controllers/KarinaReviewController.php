<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KarinaReview;
use App\Models\KarinaBook;

class KarinaReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        KarinaReview::create([
            'book_id' => $id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        return redirect()->route('karina_books.show', $id)->with('success', 'Ulasan berhasil dikirim.');
    }
}
