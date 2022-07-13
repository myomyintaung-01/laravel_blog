@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Gallery
            </li>
        </ol>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="gallery">
                            @forelse(\Illuminate\Support\Facades\Auth::user()->photos as $photo)
                                <div class="position-relative">
                                    <img src="{{ asset('storage/'.$photo->name) }}" class="w-100 mb-3 rounded" alt="">
                                    <form action="{{ route('photos.destroy',$photo->id) }}" class="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <h6 class="">There is no photo yet!</h6>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
