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
    <a href="{{route('foodcat.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($foodcats as $foodcat)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$foodcat->name}}</td>
                <td>{{$foodcat->description}}</td>
                <td>
                    <form action="{{route('foodcat.destroy', $foodcat->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('foodcat.edit', $foodcat->id)}}" method="get">
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
