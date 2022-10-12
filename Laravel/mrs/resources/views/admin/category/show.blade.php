@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Show Category
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <ul class="list-group">
                    <li class="list-group-item"><b>Name : </b> <span class="text-muted">{{$category->name}}</span></li>
                    <li class="list-group-item"><b>Slug : </b> <span class="text-muted">{{$category->slug}}</span></li>
                </ul>
            </div>
            <div class="col-lg-8">
                @isset($category->movies)
                @if ($category->movies->count() > 0)
                <table class="table table-border table-hover">
                    <thead>
                        <tr>
                            <th>Movie</th>
                            <th>Movie Name</th>
                            <th>Movie Slug</th>
                            <th>Category</th>
                            <th>Duration (mins)</th>
                            <th>Year</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->movies as $movie)
                        <tr>
                            <td>
                                @isset($movie->image)
                                <img src="{{asset('storage/' . $movie->image)}}" alt="{{$movie->name}}" width="150">
                                @endisset
                            </td>
                            <td>{{$movie->name}}</td>
                            <td>{{\Illuminate\Support\Str::slug($movie->name)}}</td>
                            <td><span class="badge badge-primary">{{$movie->category->name ?? 'N/A'}}</span></td>
                            <td>{{$movie->duration ?? 'N/A'}} mins</td>
                            <td>{{$movie->year ?? 'N/A'}}</td>
                            <td>{{$movie->country ?? 'N/A'}}</td>
                            <td>
                                <a href="{{route('movie.show',['movie' => $movie->id])}}" class="btn btn-info">Show</a>
                                <a href="{{route('movie.edit',['movie' => $movie->id])}}"
                                    class="btn btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#Modal{{$movie->id}}">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal{{$movie->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="Modal{{$movie->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="Modal{{$movie->id}}Label">Delete Alert !
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('movie.destroy',['movie' => $movie->id])}}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    Are you sure you want to delete <b>{{$movie->name}}</b> movie ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete it !</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="card">
                    <div class="card-body bg-danger">
                        <h4 class="text-center">{{$category->name}} has no movies.</h4>
                    </div>
                </div>
                @endif
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection