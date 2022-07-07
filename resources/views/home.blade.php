@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h3 class="">Hello Home</h3>
                <br>
                {{ \Illuminate\Support\Facades\Auth::user() }}
            </div>
        </div>
    </div>
</div>
@endsection
