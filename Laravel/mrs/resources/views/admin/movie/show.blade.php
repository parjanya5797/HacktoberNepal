@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Show Movie
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Movie Name:</strong>
                        <span class="text-muted">{{$movie->name ?? 'N/A'}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Category:</strong>
                        <span class="text-muted">{{$movie->category->name ?? 'N/A'}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Duration:</strong>
                        <span class="text-muted">{{$movie->duration ?? 'N/A'}} mins</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Released Year:</strong>
                        <span class="text-muted">{{$movie->year ?? 'N/A'}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Country:</strong>
                        <span class="text-muted">{{$movie->country ?? 'N/A'}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Quality:</strong>
                        <span class="badge badge-primary">{{$movie->quality ?? 'N/A'}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Release Date:</strong>
                        <span class="text-muted">{{$movie->release_date ?? 'N/A'}}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Categories:</strong>
                        @isset($movie->categories)
                        @foreach ($movie->categories as $category)
                        <span class="badge badge-primary">{{$category->name ?? 'N/A'}}</span>
                        @endforeach
                        @endisset
                    </li>
                    <li class="list-group-item">
                        <strong>Movie Actors:</strong>
                        @isset($movie->actors)
                        @foreach ($movie->actors as $actor)
                        <span class="badge badge-primary">{{$actor->name ?? 'N/A'}}</span>
                        @endforeach
                        @endisset
                    </li>
                </ul>
            </div>
            <div class="col-lg-8">
                @isset($movie->trailer)
                <b>Movie Trailer</b>
                <hr>
                <div class="embed-responsive embed-responsive-16by9">
                    {!! $movie->embeded_trailer !!}
                </div>
                @endisset
                @isset($movie->source)
                <br>
                <b>Movie</b>
                <hr>
                <div class="embed-responsive embed-responsive-16by9">
                    {!! $movie->embeded_source !!}
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection