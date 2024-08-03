@extends('layouts.app')

@section('title')
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @elseif(session('message2'))
        <div class="alert alert-info">
            {{session('message2')}}
        </div>
    @endif
    <a href="{{route('clients.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>surname</th>
            <th>phone</th>
            <th>user_id</th>
            <th>restaurant_id</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($all_client as $client)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->surname}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->user->name}}</td>
                <td>{{$booking->restaurant->name}}</td>
                <td>{{$booking->update_at}}</td>
                <td>
                    <form action="{{route('clients.destroy', $client->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('clients.edit', $client->id)}}" method="get">
                        @csrf
                        <input type="submit" value="Изменить" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
@endsection
