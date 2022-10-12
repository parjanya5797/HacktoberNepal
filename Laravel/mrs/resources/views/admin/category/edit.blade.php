@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Category
    </div>
    <div class="card-body">
        <form action="{{route('category.update',['category' => $category->id])}}" method="POST">
            @csrf
            @method('PATCH')
            @include('admin.layouts.module.category.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection