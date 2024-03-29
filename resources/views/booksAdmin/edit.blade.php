@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mb-3" style="max-width: 900px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ url('foto').'/'. $book->foto }}" id="foto" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <form class="user" method="post" action="{{ '/update/'.$book->slug }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="judul">judul :</label>
                            <input type="text" class="form-control form-control-user @error('judul') is-invalid @enderror"
                                value="{{ $book->judul }}" name="judul" id="judul">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="slug">slug :</label>
                            <input type="text" class="form-control form-control-user @error('slug') is-invalid @enderror"
                                value="{{ $book->slug }}" name="slug" id="slug">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="penulis">penulis :</label>
                            <input type="text" class="form-control form-control-user @error('penulis') is-invalid @enderror"
                                value="{{ $book->penulis }}" name="penulis" id="penulis">
                            @error('penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="penerbit">penerbit :</label>
                            <input type="text" class="form-control form-control-user @error('penerbit') is-invalid @enderror"
                                value="{{ $book->penerbit }}" name="penerbit" id="penerbit">
                            @error('penerbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="category">category</label>
                            <select class="form-select form-select-sm form-control-user @error('category_id') is-invalid @enderror"
                                id="category" name="category_id">
                                @foreach ($categories as $category)
                                    @if (old('category_id', $book->category_id) == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="foto">gambar baru :</label>
                            <input type="file" class="form-control form-control-lg form-control-user @error('foto') is-invalid @enderror"
                                value="{{ $book->foto }}" name="foto" id="foto">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                        <div class="col-sm-10 mb-3 mb-sm-0">
                            @if ($book->foto)
                                <img src="{{ url('foto').'/'. $book->foto }}" class="img-preview img-fluid mb-3 col-sm-5">

                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">

                            @endif
                            <input type="file" class="form-control form-control-lg form-control-user @error('foto') is-invalid @enderror"
                                id="image" name="foto" onchange="previewImage()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary">ubah data</button>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>

<script>
    function previewImage() {
    const image = document.getElementById('image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

</script>

@endsection
