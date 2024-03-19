@extends('Template.Main')

@section('container')
    <h1 class="text-center mb-4">Form Create</h1>


    <link rel="stylesheet" href="{{ '/' }}css/create.css">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <main class="form-signin w-100 m-auto">

                    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="hidden" name="oldImage" value="{{ $photo->image }}">
                            @if ($photo->image)
                                <img src="{{ asset('storage/' . $photo->image) }}"
                                    class="img-preview img-fluid mb-3 col-sm-3 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-3 d-block">
                            @endif
                            <img class="img-preview img-fluid mb-3 col-sm-3">
                            <input
                                class="form-control @error('image')
                            is-invalid
                        @enderror"
                                type="file" id="image" name="image" onchange="previewImage()"
                                value="{{ old('image') }}">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="text"
                                class="form-control @error('judulFoto')
                                is-invalid
                            @enderror"
                                id="judulFoto" name="judulFoto" placeholder="judulFoto"
                                value="{{ old('judulFoto', $photo->judulFoto) }}" required>
                            <label for="judulFoto">Judul Foto</label>
                            @error('judulFoto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="text"
                                class="form-control @error('deskripsiFoto')
                                is-invalid
                            @enderror"
                                id="deskripsiFoto" name="deskripsiFoto" placeholder="deskripsiFoto"
                                value="{{ old('deskripsiFoto', $photo->deskripsiFoto) }}" required>
                            <label for="deskripsiFoto">Deskripsi Foto</label>
                            @error('deskripsiFoto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-brown w-100 py-2 fw-semibold mt-3" type="submit">Selesai</button>

                    </form>
                </main>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>

                <script>
                    function previewImage() {
                        const image = document.querySelector('#image');
                        const imgPreview = document.querySelector('.img-preview');

                        imgPreview.style.display = 'block';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(ofREvent) {
                            imgPreview.src = ofREvent.target.result;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection