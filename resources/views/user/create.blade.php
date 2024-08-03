@extends('layouts.app')

@section('title')
@endsection
<!-- create -->
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">UserName : </label>
            <input type="text" name="username" class="form-control">
            <label for="">Password : </label>
            <input type="password" name="password" class="form-control">
            <label for="">Role : </label>
            <input type="text" name="role" class="form-control">
            <label for="">Email : </label>
            <input type="email" name="email" class="form-control"><br>
            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
@section('footer')
@endsection
