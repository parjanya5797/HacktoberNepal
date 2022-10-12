@extends('admin.layouts.app')

@section('content')
<h1 class="text-center">Dashboard</h1>
<br>
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body bg-primary">
                <h5 class="card-title text-light">Total Users</h5>
                <h6 class="card-subtitle mb-2 text-light">{{App\Models\User::count() ?? "N/A"}}</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body bg-info">
                <h5 class="card-title text-light">Total Movies</h5>
                <h6 class="card-subtitle mb-2 text-light">{{App\Models\Movie::count() ?? "N/A"}}</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body bg-warning">
                <h5 class="card-title text-light">Total Genre</h5>
                <h6 class="card-subtitle mb-2 text-light">{{App\Models\Category::count() ?? "N/A"}}</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body bg-danger">
                <h5 class="card-title text-light">Total Actors</h5>
                <h6 class="card-subtitle mb-2 text-light">{{App\Models\Actor::count() ?? "N/A"}}</h6>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    @if (!is_null($most_visited_movie))
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Most Visited Movie</b></h5>
                <h6 class="card-subtitle">{{$most_visited_movie->name ?? "N/A"}}</h6>
                <br>
                <img src="{{$most_visited_movie->image}}" style="width: 100%">
                <hr>

                <span class="badge badge-info">{{$most_visited_movie->quality ?? "N/A"}}</span>
                <span class="badge badge-primary">{{$most_visited_movie->country ?? "N/A"}}</span>
                <span class="badge badge-success">{{$most_visited_movie->year ?? "N/A"}}</span>
                <span class="badge badge-danger">{{$most_visited_movie->release_date ?? "N/A"}}</span>
                <br>
                {!! $most_visited_movie->description !!}
            </div>
        </div>
    </div>
    @endif
    @if (!is_null($most_favorite_movie))
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Most Favorite Movie</b></h5>
                <h6 class="card-subtitle">{{$most_favorite_movie->name ?? "N/A"}}</h6>
                <br>
                <img src="{{$most_favorite_movie->image}}" style="width: 100%">
                <hr>

                <span class="badge badge-info">{{$most_favorite_movie->quality ?? "N/A"}}</span>
                <span class="badge badge-primary">{{$most_favorite_movie->country ?? "N/A"}}</span>
                <span class="badge badge-success">{{$most_favorite_movie->year ?? "N/A"}}</span>
                <span class="badge badge-danger">{{$most_favorite_movie->release_date ?? "N/A"}}</span>
                <br>
                {!! $most_favorite_movie->description !!}
            </div>
        </div>
    </div>
    @endif
    @if (!is_null($latest_movie))
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Most Latest Movie</b></h5>
                <h6 class="card-subtitle">{{$latest_movie->name ?? "N/A"}}</h6>
                <br>
                <img src="{{$latest_movie->image}}" style="width: 100%">
                <hr>

                <span class="badge badge-info">{{$latest_movie->quality ?? "N/A"}}</span>
                <span class="badge badge-primary">{{$latest_movie->country ?? "N/A"}}</span>
                <span class="badge badge-success">{{$latest_movie->year ?? "N/A"}}</span>
                <span class="badge badge-danger">{{$latest_movie->release_date ?? "N/A"}}</span>
                <br>
                {!! $latest_movie->description !!}
            </div>
        </div>
    </div>
    @endif
</div>
@endsection