@extends('layouts/app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Post Edit
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="">Edit Post</h4>
            <hr>
            <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title',$post->title)  }}"
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category">Select Category</label>
                    <select
                        type="text"
                        name="category"
                        id="category"
                        class="form-select @error('category') is-invalid @enderror"
                    >
                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ $category->id == old('category',$post->category_id)? 'selected': '' }}
                            > {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea
                        type="text"
                        name="description"
                        id="description"
                        rows="10"
                        class="form-control @error('description') is-invalid @enderror"
                    >
                        {{ old('description',$post->description) }}
                    </textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <label for="featured_image">Featured Image</label>
                        <input
                            type="file"
                            name="featured_image"
                            id="featured_image"
                            value="{{ old('featured_image') }}"
                            class="form-control @error('featured_image') is-invalid @enderror">
                        @error('featured_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-lg btn-outline-dark">Update Post</button>
                </div>
                @isset($post->featured_image)
                    <img src="{{ asset('storage/'.$post->featured_image) }}" alt="" class="w-50 mt-2">
                @endisset
            </form>
        </div>
    </div>
@endsection

