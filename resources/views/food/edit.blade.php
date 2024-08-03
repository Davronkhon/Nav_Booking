@extends('layouts.app')
@section('content')
    <form action="{{route('food.update',$food)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="exampleInputEmail1">Name:</label>
        <input type="text" name="name" value="{{$food->name}}" class="form-control" id="exampleInputEmail1">
        <label for="exampleInputEmail1">Price:</label>
        <input type="text" name="price" value="{{$food->price}}" class="form-control" id="exampleInputEmail1">
        <label for="exampleInputEmail1">Image:</label>
        <input class="form-control" value="{{$food->image}}" type="file" name="image">
        <label for="exampleInputEmail1">Description:</label>
        <input class="form-control" value="{{$food->description}}" type="text" name="description">
        <label for="exampleInputEmail1">Time:</label>
        <input class="form-control" value="{{$food->time}}" type="datetime-local" name="time">
        <label for="exampleInputEmail1">Is_active:</label>
        <input class="form-control" value="{{$food->is_active}}" type="text" name="is_active">
        <label for="exampleInputEmail1">Food_category:</label>
        <select id="exampleInputEmail1" class="form-control" name="food_category_id">
            @foreach($foodcategories as $foodcategory)
                <option value="{{$foodcategory->id}}">{{$foodcategory->name}}</option>
            @endforeach
        </select>
        <label for="exampleInputEmail1">Restaurant:</label>
        <select id="exampleInputEmail1" class="form-control" name="restaurant_id">
            @foreach($restaurants as $restaurant)
                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
            @endforeach
        </select><br>
        <input type="submit" value="Изменить" class="btn btn-primary form-control">
    </form>
@endsection

@section('footer')
@endsection
