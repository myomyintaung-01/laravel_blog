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
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($post->photos as $key=>$photo )
                                        <div class="carousel-item {{ $key===0?'active':'' }}">
                                            <a class="venobox" href="{{ asset('storage/'.$photo->name)}}">
                                                <img src="{{ asset('storage/'.$photo->name)}}"  class="d-block detail-img rounded w-100">
                                            </a>

                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                </div>
                            </div>

                        </div>
                        <p class="">{{ $post->description }}</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <span class=""><i class="bi bi-calendar"> {{ $post->created_at->diffforHumans() }}</i></span> &nbsp;|&nbsp;
                                <span class=""><i class="bi bi-person"> {{ $post->user->name }}</i></span>
                            </div>
                            <div class="d-flex">
                                @can('update',$post)
                                    <a href="{{ route('post.edit',$post->id ) }}" class="btn btn-sm btn-outline-dark me-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('page.index') }}" class="btn btn-info me-2">All Posts</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
