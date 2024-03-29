@extends('layouts.app')
@section('content')

<h1>{{ $title }}</h1>
    @auth
        <p>User ID: {{ Auth::id() }}</p>
    @else
        <p>Silakan login untuk melihat User ID.</p>
    @endauth

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>book id judul</th>
                <th>Peminjaman</th>
                <th>Batas Pengembalian</th>
                <th>Status</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $borrow->book_id . $borrow->book->judul }}</td>
                <td>{{ $borrow->TanggalPeminjaman }}</td>
                <td>{{ $borrow->TanggalPengembalian }}</td>
                <td>
                    @if($borrow->StatusPeminjaman == 1)
                        sudah dikembalikan
                    @else
                        belum dikembalikan
                    @endif
                </td>
                <td>
                    @if ($borrow->StatusPeminjaman == 1)
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>
                            Kembalikan
                        </button>
                    @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Kembalikan
                        </button>
                    @endif


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action="/reviews">
            @csrf
            <input type="hidden" value="1" name="StatusPeminjaman">
            {{-- <input type="text" value="{{ $borrow->user_id }}" name="user_id">
            <input type="text" value="{{ $borrow->book_id }}" name="book_id"> --}}

            <div class="modal-body">
                <div class="form-group">
                    <label class="form-check-label" for="flexCheckDeult">Apakah anda sudah mengembalikan buku? </label><br>
                    <label class="form-check-label" for="flexCheckDefault">Check list dibawah jika sudah</label>
                    <div class="form-check">
                        <input class="form-check-input " type="checkbox" id="flexCheckDefault" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>beri rating</label>
                    <br>
                    <input type="hidden" name="rating" id="ratingInput"> <!-- Input tersembunyi untuk menyimpan nilai rating -->
                    <div class="form-check form-check-inline" id="star1">
                        <i class="bi bi-star" onclick="handleStarClick(1)"></i>
                    </div>
                    <div class="form-check form-check-inline" id="star2">
                        <i class="bi bi-star" onclick="handleStarClick(2)"></i>
                    </div>
                    <div class="form-check form-check-inline" id="star3">
                        <i class="bi bi-star" onclick="handleStarClick(3)"></i>
                    </div>
                    <div class="form-check form-check-inline" id="star4">
                        <i class="bi bi-star" onclick="handleStarClick(4)"></i>
                    </div>
                    <div class="form-check form-check-inline" id="star5">
                        <i class="bi bi-star" onclick="handleStarClick(5)"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="floatingTextarea2">beri ulasan</label>
                    <textarea class="form-control" name="ulasan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Kembalikan</button>
            </div>
        </form>


      </div>
    </div>
  </div>

  <script>
    let selectedRating = 0; // Variabel untuk menyimpan nilai rating yang dipilih

    function handleStarClick(rating) {
        // Menyimpan nilai rating yang dipilih
        selectedRating = rating;

        // Mengubah warna ikon bintang
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById(`star${i}`);
            if (i <= rating) {
                star.innerHTML = '<i class="bi bi-star-fill text-primary" onclick="handleStarClick(' + i + ')"></i>';
            } else {
                star.innerHTML = '<i class="bi bi-star" onclick="handleStarClick(' + i + ')"></i>';
            }
        }

        // Memperbarui nilai input tersembunyi
        document.getElementById('ratingInput').value = rating;

        // Di sini Anda dapat memperbarui nilai di backend atau melakukan tindakan lain sesuai kebutuhan
        console.log('Rating selected:', rating);
    }
</script>

@endsection
