<!-- resources/views/places/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Place</h1>
        <form action="{{ route('place.store') }}" method="POST">
            @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
                <label for="number">Number:</label>
                <input type="text" id="number" name="number" class="form-control" required>
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" class="form-control" required>
                <label for="restaurant_id">Restaurant ID:</label>
                <select class ="form-select" name="restaurant_id" id="">
                    @foreach($restourants as $restourant)
                        <option value="{{$restourant->id}}">{{$restourant->name}}</option>
                    @endforeach
                </select><br>
            <input type="submit" value="Create" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
