@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create Movie
    </div>
    <div class="card-body">
        <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.layouts.module.movie.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection