<!-- resources/views/places/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Place</h1>
        <form action="{{ route('place.update', $places->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $places->name }}" required>
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" id="number" name="number" class="form-control" value="{{ $places->number }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="3" required>{{ $places->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" class="form-control" value="{{ $places->capacity }}" required>
            </div>
            <div class="form-group">
                <label for="restaurant_id">Restaurant ID:</label>
                <select class="form-control" name="restaurant_id" id="">
                    @foreach($restourants as $restourant)
                        <option value="{{$restourant->id}}">{{$restourant->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
