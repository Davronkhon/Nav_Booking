@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Удалить бронирование #{{ $client->id }}</h3>
        </div>
        <div class="card-body">
            <p>Вы уверены, что хотите удалить это бронирование?</p>
            <form action="{{route('client.destroy', $client->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
                <a href="{{route('client.index') }}" class="btn btn-secondary">Отмена</a>
            </form>
        </div>
    </div>
@endsection
