@extends('layouts/app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Category List
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="">Category List</h4>
            <table class="table ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->role != 'author')
                        <th>Author</th>
                        @endif
                        <th>Post Count</th>
                        <th>Control</th>
                        <th>Created_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{ $category->title }}
                                <br>
                                <span class="badge bg-secondary"> {{ $category->slug }}</span>
                            </td>
                            @if(\Illuminate\Support\Facades\Auth::user()->role != 'author')
                            <td>{{ $category->user->name }}</td>
                            @endif
                            <td>{{ $category->posts()->count() }}</td>
                            <td>
                                <a href="{{ route('category.show',$category->id ) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-info-circle"></i>
                                </a>
                                @can('update',$category)
                                    <a href="{{ route('category.edit',$category->id ) }}" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endcan
                                @can('delete',$category)
                                    <form action="{{ route('category.destroy',$category->id ) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-dark"><i class="bi bi-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                            <td>
                                <p class="small text-black-50 mb-0"><i class="bi bi-calendar"></i> {{ $category->created_at->format('d M Y') }}</p>
                                <p class="small text-black-50 mb-0"><i class="bi bi-clock"></i> {{ $category->created_at->format('H : m A') }}</p>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
        </div>
    </div>
@endsection
