@extends('layouts.app')
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="/add" class="btn btn-primary mb-4">tambah data buku <i class="fas fa-fw fa-plus"></i></a>

@if ($books->count())

    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="row">
                @foreach ($books as $book)
                <div class="card mb-4 mx-3" style="max-width: 18rem;">
                    <div class="row">
                    <div class="col-md-4 mb-3">
                        <img src="{{ url('foto').'/'. $book->foto }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                            <small>
                                <a href="/view/{{ $book->slug }}" class="me-2 fs-5 text-primary"><i class="bi bi-search"></i></a>
                                <a href="/edit/{{ $book->slug }}" class="mx-2 fs-5 text-success"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ '/hapus/'.$book->slug }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </small>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@else
    <p class="text-center fs-4">No post found.</p>
@endif


@endsection
