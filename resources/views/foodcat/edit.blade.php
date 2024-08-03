@extends('layouts.app')

@section('content')
    <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('foodcat.update', $foodcat->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="">Name</label>
            <input type="text" class="form-control" id="" name="name" value="{{$foodcat->name}}">
            <label for="">Description</label>
            <input type="text" class="form-control" id="" name="description" value="{{$foodcat->description}}">
            <input type="submit" value="Изменить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
