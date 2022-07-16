@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 m-auto">
                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="text-center">{{ $post->title }}</h3>
                        <a href="#" class=""><span class="badge bg-secondary"> {{ $post->category->title }}</span></a>
                        <div class="text-center d-flex flex-wrap">
                            @foreach($post->photos as $photo)
                                <img src="{{ asset('storage/'.$photo->name)}}" height="100" alt="" class="m-1 rounded">
                            @endforeach
                        </div>
                        <p class="">{{ $post->description }}</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <span class=""><i class="bi bi-calendar"> {{ $post->created_at->diffforHumans() }}</i></span> &nbsp;|&nbsp;
                                <span class=""><i class="bi bi-person"> {{ $post->user->name }}</i></span>
                            </div>
                            <a href="{{ route('page.index') }}" class="btn btn-info">All Posts</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
