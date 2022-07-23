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
            <form action="{{ route('post.update',$post->id) }}" method="post" id="updatePostForm" enctype="multipart/form-data">
                @csrf
                @method('put')
            </form>
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        form="updatePostForm"
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
                        form="updatePostForm"
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
{{--                photos--}}
                <div class="mb-3">
                    <div class="d-flex flex-wrap">
                        @foreach($post->photos as $photo)
                            <div class="position-relative m-2">
                                <img src="{{ asset('storage/'.$photo->name) }}" height="100" class="rounded" alt="">
                                <form action="{{ route('photos.destroy',$photo->id) }}" class="" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="photos">Post Photo</label>
                        <input
                            type="file"
                            class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror"
                            name="photos[]"
                            id="photos"
                            multiple
                            form="updatePostForm"
                        >
                        @error("photos")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error("photos.*")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea
                        type="text"
                        name="description"
                        id="description"
                        rows="10"
                        form="updatePostForm"
                        class="form-control @error('description') is-invalid @enderror"
                    >{{ old('description',$post->description) }}
                    </textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="me-3">
                            @isset($post->featured_image)
                                <img src="{{ asset('storage/'.$post->featured_image) }}" height="100" alt="" class="">
                            @endisset
                        </div>
                        <div class="">
                            <label for="featured_image">Featured Image</label>
                            <input
                                type="file"
                                name="featured_image"
                                form="updatePostForm"
                                id="featured_image"
                                value="{{ old('featured_image') }}"
                                class="form-control @error('featured_image') is-invalid @enderror">
                            @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-outline-dark" form="updatePostForm">Update Post</button>
                </div>
        </div>
    </div>
@endsection

