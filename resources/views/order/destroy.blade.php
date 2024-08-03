@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Удалить бронирование #{{$order->id }}</h3>
        </div>
        <div class="card-body">
            <p>Вы уверены, что хотите удалить это бронирование?</p>
            <form action="{{route('order.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
                <a href="{{route('order.index') }}" class="btn btn-secondary">Отмена</a>
            </form>
        </div>
    </div>
@endsection
