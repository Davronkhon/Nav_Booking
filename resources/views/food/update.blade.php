@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактировать бронирование #{{ $food->id }}</h3>
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
            <form action="{{ route('food.update', $food->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="date">Name:</label>
                <input type="date" class="form-control" name="name" value="{{$food->name}}">
                <label for="time">Price:</label>
                <input type="time" class="form-control" name="price" value="{{$food->price}}">
                <label for="seats">Image:</label>
                <input type="file" class="form-control" name="image" value="{{$food->image}}">
                <label for="seats">Description:</label>
                <input type="text" class="form-control" name="description" value="{{$food->description}}">
                <label for="seats">Time:</label>
                <input type="datetime-local" class="form-control" name="time" value="{{$food->time}}">
                <label for="seats">Is_active:</label>
                <input type="text" class="form-control" name="is_active" value="{{$food->is_active}}">
                <label for="exampleInputEmail1">Food_category:</label>
                <select id="exampleInputEmail1" name="food_category_id" class="form-control">
                    @foreach($foodcats as $foodcat)
                        <option value="{{$foodcat->id}}">{{$foodcat->name}}</option>
                    @endforeach
                </select>
                <label for="exampleInputEmail1">Restaurant:</label>
                <select id="exampleInputEmail1" name="restaurant_id" class="form-control">
                    @foreach($restaurants as $restaurant)
                        <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                    @endforeach
                </select>
                <a href="{{ route('food.index') }}" class="btn btn-secondary form-control">Отмена</a>
            </form>
        </div>
    </div>
@endsection

@section('footer')
@endsection
