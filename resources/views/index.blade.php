@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 m-auto">
                <h1 class="text-center">Blog Post</h1>
                <div class="">
                    <form class="my-3" method="get">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control">
                            <button class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </form>
                    @isset($category)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p>Filter By : {{ $category->title }}</p>
                            <a href="{{ route('page.index') }}" class="btn  btn-outline-primary">See All</a>
                        </div>
                    @endisset
                </div>
                @forelse($posts as $post)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h3 class="">{{ $post->title }}</h3>
                            <a href="{{ route('page.category',$post->category) }}" >
                                    <span class="badge bg-secondary">
                                        {{ $post->category->title }}
                                    </span>
                            </a>
                            <p class="">{{ $post->excerpt }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <span class=""><i class="bi bi-calendar"> {{ $post->created_at->diffforHumans() }}</i></span> &nbsp;|&nbsp;
                                    <span class=""><i class="bi bi-person"> {{ $post->user->name }}</i></span>
                                </div>
                                <a href="{{ route('page.detail',$post->slug) }}" class="btn btn-info">See More ...</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h3>There is no posts yet !</h3>
                        </div>
                    </div>
                @endforelse
                <div class="mt-1">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
