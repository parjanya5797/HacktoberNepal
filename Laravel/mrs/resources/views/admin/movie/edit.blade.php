@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Movie
    </div>
    <div class="card-body">
        <form action="{{route('movie.update',['movie' => $movie->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('admin.layouts.module.movie.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection