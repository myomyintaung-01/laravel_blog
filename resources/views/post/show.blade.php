@extends('layouts/app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Post Detail
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class=""> {{ $post->title }}</h4>
            <hr>
            <div class="mb-2 d-flex justify-content-between">
                <div class="">
                    <span class="badge bg-secondary">
                        <i class="bi bi-grid"></i>
                        {{ \App\Models\Category::find($post->category_id)->title }}
                    </span>
                    <span class="badge bg-secondary">
                        <i class="bi bi-person"></i>
                        {{ \App\Models\User::find($post->user_id)->name }}
                     </span>
                    <span class="badge bg-secondary">
                        <i class="bi bi-calendar"></i>
                        {{ $post->created_at->format('d M Y') }}
                    </span>
                    <span class="badge bg-secondary">
                        <i class="bi bi-clock"></i>
                        {{ $post->created_at->format('H : m A') }}
                    </span>
                </div>
                <div class="">
                    <span class="badge bg-secondary">
                        <i class="bi bi-eye"></i>
                        243
                    </span>
                </div>
            </div>
            @isset($post->featured_image)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$post->featured_image) }}" height="200" class="rounded" alt="">
                </div>
            @endisset
            <div class="">
                <p class=""> {{ $post->description }}</p>
            </div>
            <div class="d-flex mb-2">
                @foreach($post->photos as $photo)
                    <img src="{{ asset('storage/'.$photo->name) }}" height="150" class="rounded me-2" alt="">
                @endforeach
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Post List</a>
                <a href="{{ route('post.create') }}" class="btn btn-outline-dark">Post Create</a>
            </div>
        </div>
    </div>
@endsection
