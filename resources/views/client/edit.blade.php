@extends('layouts.app')
@section('content')
    <form action="{{route('client.update',$clients)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="">Name:</label>
        <input type="text" name="name" value="{{$clients->name}}" class="form-control" id="exampleInputEmail1">
        <label for="">Surname:</label>
        <input type="text" name="surname" value="{{$clients->surname}}" class="form-control" id="exampleInputEmail1">
        <label for="">Phone:</label>
        <input class="form-control" value="{{$clients->phone}}" type="text" name="phone">
        <label for="">User:</label>
        <select id="" class="form-control" name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        <label for="">Restaurant:</label>
        <select id="" class="form-control" name="restaurant_id">
            @foreach($restaurants as $restaurant)
                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Изменить" class="btn btn-primary form-controlr">
    </form>
@endsection

@section('footer')
@endsection
