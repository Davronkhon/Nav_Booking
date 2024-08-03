@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Place</h1>
        <p>Are you sure you want to delete the place "{{ $place->name }}"?</p>

        <form action="{{ route('place.destroy', $place->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('place.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

