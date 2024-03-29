<?php

namespace App\Http\Controllers;

use App\Models\borrow;
use App\Models\review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function store(Request $request)
    {
        $reviewData = [
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'ulasan' => $request->input('ulasan'),
            'rating' => $request->input('rating'),
        ];

        // Menyimpan ulasan baru
        review::create($reviewData);

        // Memperbarui status peminjaman hanya jika StatusPeminjaman diberikan
        if ($request->has('StatusPeminjaman')) {
            borrow::where('book_id', $request->input('book_id'))
                ->update(['StatusPeminjaman' => $request->input('StatusPeminjaman')]);
        }

        return redirect("/borrows")->with('success', 'Data berhasil disimpan');
    }



}
