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
        <form action="{{ route('foodcat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name : </label>
            <input type="text" name="name" class="form-control">
            <label for="">Description : </label>
            <input type="text" name="description" class="form-control"><br>
            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection

@section('footer')
@endsection
