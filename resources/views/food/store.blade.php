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
    <a href="{{route('food.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>image</th>
            <th>description</th>
            <th>time</th>
            <th>is_active</th>
            <th>food_category_id</th>
            <th>restaurant_id</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($foods as $food)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$food->name}}</td>
                <td>{{$food->price}}</td>
                <td>{{$food->image}}</td>
                <td>{{$food->description}}</td>
                <td>{{$food->time}}</td>
                <td>{{$food->is_active}}</td>
                <td>{{$food->food_category_id->name}}</td>
                <td>{{$food->restaurant_id->name}}</td>
                <td>{{$food->update_at}}</td>
                <td>
                    <form action="{{route('food.destroy', $food->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('food.edit', $food->id)}}" method="get">
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
