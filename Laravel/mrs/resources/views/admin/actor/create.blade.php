@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Create Actor
    </div>
    <div class="card-body">
        <form action="{{route('actor.store')}}" method="POST">
            @csrf
            @include('admin.layouts.module.actor.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection