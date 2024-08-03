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
    <a href="{{route('restaurant.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Rest_id</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $restaurant->name}}</td>
                <td>{{ $restaurant->address}}</td>
                <td>{{ $restaurant->phone}}</td>
                <td>{{ $restaurant->email}}</td>
                <td>{{ $restaurant->rest_category_id->name }}</td>
                <td>
                    <form action="{{route('restaurant.destroy', $restaurant->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('restaurant.edit', $restaurant->id)}}" method="get">
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
