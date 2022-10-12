@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <b>All Categories</b>
    <span class="text-muted">Total Result : {{isset($categories) ? $categories->count() : 0}}</span>
    <a href="{{route('category.create')}}" class="btn btn-primary">Create Category</a>
</div>
<hr>
<table class="table table-border table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Slug</th>
            <th>Movies</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @isset($categories)
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->movies->count() ?? 0}}</td>
            <td>
                <a href="{{route('category.show',['category' => $category->id])}}" class="btn btn-info">Show</a>
                <a href="{{route('category.edit',['category' => $category->id])}}" class="btn btn-warning">Edit</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal{{$category->id}}">
                    Delete
                </button>
                <!-- Modal -->
                <div class="modal fade" id="Modal{{$category->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="Modal{{$category->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Modal{{$category->id}}Label">Delete Alert !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('category.destroy',['category' => $category->id])}}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    Are you sure you want to delete <b>{{$category->name}}</b> category ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
@if (isset($categories))
{{$categories->links()}}
@endif
@endsection