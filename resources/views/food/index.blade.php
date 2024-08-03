@extends('layouts.app')
@section('title')
    <h3>Таблица foods</h3>
@endsection

@section('content')
    <br>
    <a href="{{route('food.create')}}" class="btn btn-primary">Добавить</a>
    <br>
    <table class="table">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>image</th>
            <th>description</th>
            <th>time</th>
            <th>is_active</th>
            <th>restaurant_id</th>
            <th>food_category_id</th>
            <th>delete</th>
            <th>update</th>
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
                <td>{{ optional($food->restaurant)->name }}</td>
                <td>{{ optional($food->foodcategory)->name }}</td>
                <td>
                    <form action="{{route('food.destroy', $food->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('food.edit', $food->id)}}" method="get">
                        @csrf
                        <input type="submit" value="update" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
