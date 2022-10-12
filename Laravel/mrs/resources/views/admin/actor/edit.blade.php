@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Actor
    </div>
    <div class="card-body">
        <form action="{{route('actor.update',['actor' => $actor->id])}}" method="POST">
            @csrf
            @method('PATCH')
            @include('admin.layouts.module.actor.form')
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection