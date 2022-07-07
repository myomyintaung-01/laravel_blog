@extends('layouts/app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Post List
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="">Post List</h4>
            <div class="d-flex justify-content-between my-2">
                <div class="">
                    @if(request('keyword'))
                        <span class="">Search by : " {{ request('keyword') }} "</span>
                        <a href="{{ route('post.index') }}" class=""><i class="bi bi-trash3"></i></a>
                    @endif
                </div>
                <form action="{{ route('post.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="keyword" class="form-control " required >
                        <button class="btn btn-outline-dark">
                            <i class="bi bi-search"></i>
                            Search
                        </button>
                    </div>
                </form>
            </div>
            <table class="table ">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="w-25">Title</th>
                    <th style="width: 40%">Description</th>
                    <th>Control</th>
                    <th>Created_at</th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            {{ $post->title}}
                            <div class="d-flex justify-content-between mt-1">
                                @notAuthor
                                <span class="small fst-italic badge bg-secondary"><i class="bi bi-person"></i> {{$post->user->name }}</span>
                                @endnotAuthor
                                <span class="small fst-italic badge bg-secondary"><i class="bi bi-grid"></i> {{ $post->category->title }}</span>
                            </div>
                        </td>
                        <td>{{ \Illuminate\Support\Str::words($post->description,25,'.....') }}</td>
                        <td>
                            <a href="{{ route('post.show',$post->id ) }}" class="btn btn-sm btn-outline-dark">
                                <i class="bi bi-info-circle"></i>
                            </a>
                            @can('update',$post)
                                <a href="{{ route('post.edit',$post->id ) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan
                            @can('delete',$post)
                                <form action="{{ route('post.destroy',$post->id ) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-dark"><i class="bi bi-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                        <td>
                            <p class="small text-black-50 mb-0"><i class="bi bi-calendar"></i> {{ $post->created_at->format('d M Y') }}</p>
                            <p class="small text-black-50 mb-0"><i class="bi bi-clock"></i> {{ $post->created_at->format('H : m A') }}</p>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">There is no post</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection

