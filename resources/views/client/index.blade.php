@extends('layouts.app')
@section('title')
    <h3>Таблица clients</h3>
@endsection

@section('content')
    <a href="{{route('client.create')}}" class="btn btn-info">Добавить</a>
    <br><br>
    <table class="table">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>surname</th>
            <th>phone</th>
            <th>restaurant_id</th>
            <th>user_id</th>
            <th>delete</th>
            <th>update</th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->surname}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->restaurants->name}}</td>
                <td>{{$client->user->username}}</td>
                <td>
                    <form action="{{route('client.destroy', $client->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('client.edit', $client->id)}}" method="get">
                        @csrf
                        <input type="submit" value="update" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
@endsection
