@extends('layouts.app')

@section('content')
    <div class="card-body">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('user.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="">UserName</label>
            <input type="text" class="form-control" id="" name="username" value="{{$user->username}}">
            <label for="">Password</label>
            <input type="password" class="form-control" id="" name="password" value="{{$user->password}}">
            <label for="">Role</label>
            <input type="password" class="form-control" id="" name="role" value="{{$user->role}}">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" name="email" value="{{$user->email}}">
            <input type="submit" value="Изменить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
