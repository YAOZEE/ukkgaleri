@extends('Template.Main')

@section('container')
    <h1 class="text-center mb-4 fw-bold" style="color: rgb(85, 73, 57)">All Photos</h1>

    @if (session()->has('created'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('created') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('updated'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('photos.create') }}" class="btn btn-success mb-3">Tambah</a>

    <div class="row">
        @foreach ($photos as $photo)
            <div class="col-md-5 mb-3">
                <div class="card" style="width: 12rem;">
                    <img src="{{ asset('storage/' . $photo->image) }}" class="card-img-top" alt="{{ $photo->judulFoto }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photo->judulFoto }}</h5>
                        <p class="card-text">{{ $photo->deskripsiFoto }}</p>
                        <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection