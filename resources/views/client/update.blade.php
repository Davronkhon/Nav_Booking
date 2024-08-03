@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактировать бронирование #{{ $clients->id }}</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('clients.update', $clients->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="date">Name:</label>
                <input type="date" class="form-control" name="name" value="{{$client->name}}">
                <label for="time">Surname:</label>
                <input type="time" class="form-control" name="surname" value="{{$client->surname}}">
                <label for="seats">Phone:</label>
                <input type="number" class="form-control" name="phone" value="{{$client->phone}}">
                <label for="">User:</label>
                <select id="" name="user_id">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <label for="">Restaurant:</label>
                <select id="" name="restaurant_id">
                    @foreach($restaurants as $restaurant)
                        <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Сохранить" class="btn btn-primary form-control">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Отмена</a>
            </form>
        </div>
    </div>
@endsection
