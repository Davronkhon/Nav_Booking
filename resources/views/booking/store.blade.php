@extends('layouts.app')

@section('title')
    Список Бронирований
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @elseif(session('message2'))
        <div class="alert alert-info">
            {{ session('message2') }}
        </div>
    @endif
    <a href="{{ route('booking.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Start_time</th>
            <th>End_time</th>
            <th>Guests</th>
            <th>Status</th>
            <th>Place</th>
            <th>Client</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->start_time }}</td>
                <td>{{ $booking->end_time }}</td>
                <td>{{ $booking->guests }}</td>
                <td>{{ $booking->status }}</td>
                <td>{{ $booking->place->name }}</td>
                <td>{{ $booking->client->name }}</td>
                <td>
                    <form action="{{ route('booking.destroy', $booking->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-info">Изменить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
@endsection
