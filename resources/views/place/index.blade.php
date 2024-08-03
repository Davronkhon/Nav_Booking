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
    <a href="{{route('place.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>number</th>
            <th>description</th>
            <th>capacity</th>
            <th>Restaurant_id</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($places as $place)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$place->name}}</td>
                <td>{{$place->number}}</td>
                <td>{{$place->description}}</td>
                <td>{{$place->capacity}}</td>
                <td>{{$place->restaurants->name}}</td>

                <td>
                    <form action="{{route('place.destroy', $place->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('place.edit', $place->id)}}" method="get">
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
