@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create Category
    </div>
    <div class="card-body">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            @include('admin.layouts.module.category.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection