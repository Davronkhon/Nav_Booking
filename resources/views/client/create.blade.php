@extends('layouts.app')
@section('content')

    <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="exampleInputEmail1">Name:</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
        <label for="exampleInputEmail1">Surname:</label>
        <input type="text" name="surname" class="form-control" id="exampleInputEmail1">
        <label for="exampleInputEmail1">Phone:</label>
        <input class="form-control" type="text" name="phone">
        <label for="">User:</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
        </select>
        <label for="">Restaurant:</label>
        <select name="restaurant_id" class="form-control">
            @foreach($restaurants as $restaurant)
                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Добавить" class="btn btn-primary form-control">
    </form>
@endsection
