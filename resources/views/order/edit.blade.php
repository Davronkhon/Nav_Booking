@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="">Quantity</label>
            <input type="number" class="form-control" id="" name="quantity" value="{{$order->quantity}}">
            <label for="">Order_dat</label>
            <input type="date" class="form-control" id="" name="date" value="{{$order->date}}">
            <label for="">Status</label>
            <input type="text" class="form-control" id="" name="status" value="{{$order->status}}">
            <label for="">Booking_id : </label>
            <select name="booking_id" id="" class="form-control">
                @foreach($bookings as $booking)
                    <option value="{{$booking->id}}">{{$booking->start_time}}</option>
                @endforeach
            </select>
            <label for="">Food_id : </label>
            <select name="food_id" id="" class="form-control">
                @foreach($foods as $food)
                    <option value="{{$food->id}}">{{$food->name}}</option>
                @endforeach
            </select>
            <label for="">Client_id : </label>
            <select name="client_id" id="" class="form-control">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
