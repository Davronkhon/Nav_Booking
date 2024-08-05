@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $order->quantity) }}">
            </div>

            <div class="form-group">
                <label for="date">Order Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $order->date) }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $order->status) }}">
            </div>

            <div class="form-group">
                <label for="booking_id">Booking</label>
                <select name="booking_id" id="booking_id" class="form-control">
                    @foreach($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ $order->booking_id == $booking->id ? 'selected' : '' }}>
                            {{ $booking->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="food_id">Food</label>
                <select name="food_id" id="food_id" class="form-control">
                    @foreach($foods as $food)
                        <option value="{{ $food->id }}" {{ $order->food_id == $food->id ? 'selected' : '' }}>
                            {{ $food->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="client_id">Client</label>
                <select name="client_id" id="client_id" class="form-control">
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
