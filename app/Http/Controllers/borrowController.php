<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class borrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id(); // Dapatkan user_id yang sedang login
        $borrows = Borrow::where('user_id', $user_id)->with('book')->get(); // Ambil borrows berdasarkan user_id dan mengambil relasi buku

        // Loop melalui setiap peminjaman
        foreach ($borrows as $borrow) {
            // Periksa nilai StatusPeminjaman
            if ($borrow->StatusPeminjaman == 1) {
                // Jika sudah dikembalikan, setel menjadi 1
                $borrow->StatusPeminjaman = 1;
            } else {
                // Jika belum dikembalikan, setel menjadi 0
                $borrow->StatusPeminjaman = 0;
            }

            // Simpan perubahan ke database
            $borrow->save();
        }

        return view('borrows.indexs', [
            "title" => "Koleksi Buku",
            "active" => "borrows",
            "borrows" => $borrows,
            "books" => Book::all(), // Mengambil semua buku
        ]);



            // "book" => $book,
            // "user_id" => Auth::id()
      

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
        $data = [
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'TanggalPeminjaman' => $request->input('TanggalPeminjaman'),
            'TanggalPengembalian' => $request->input('TanggalPengembalian'),
        ];


        borrow::create($data);
        return redirect('')->with('success', 'Data berhasil disimpan');
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
        //
    }
}
