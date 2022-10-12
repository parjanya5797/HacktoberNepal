@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <b>All Actors</b>
    <span class="text-muted">Total Result : {{isset($actors) ? $actors->count() : 0}}</span>
    <a href="{{route('actor.create')}}" class="btn btn-primary">Create Actor</a>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <form action="{{route('actor.store')}}" method="POST">
            @csrf
            @include('admin.layouts.module.category.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
    <div class="col-lg-8">
        <table class="table table-border table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Actor Name</th>
                    <th>Actor Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @isset($actors)
                @foreach ($actors as $actor)
                <tr>
                    <td>{{$actor->id}}</td>
                    <td>{{$actor->name}}</td>
                    <td>{{$actor->slug}}</td>
                    <td>
                        <a href="{{route('actor.show',['actor' => $actor->id])}}" class="btn btn-info">Show</a>
                        <a href="{{route('actor.edit',['actor' => $actor->id])}}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#Modal{{$actor->id}}">
                            Delete
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$actor->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="Modal{{$actor->id}}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Modal{{$actor->id}}Label">Delete Alert !</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('actor.destroy',['actor' => $actor->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            Are you sure you want to delete <b>{{$actor->name}}</b> actor ?
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
                @endisset
            </tbody>
        </table>
        @if (isset($actors))
        {{$actors->links()}}
        @endif
    </div>
</div>
@endsection