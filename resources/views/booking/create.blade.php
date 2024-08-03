@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать Бронирование</h1>

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <label for="start_time">Начало</label>
            <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
            @error('start_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="end_time">Конец</label>
            <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time') }}" required>
            @error('end_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="guests">Количество гостей</label>
            <input type="number" class="form-control @error('guests') is-invalid @enderror" id="guests" name="guests_count" value="{{ old('guests_count') }}" required>
            @error('guests')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="status">Статус</label>
            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}" required>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="place_id">Место</label>
            <select class="form-control @error('place_id') is-invalid @enderror" id="place_id" name="place_id" required>
                <option value="">Выберите место</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}" {{ old('place_id') == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                @endforeach
            </select>
            @error('place_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="client_id">Клиент</label>
            <select class="form-control @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                <option value="">Выберите клиента</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror<br>
            <input type="submit" name="seve" value="Download" class="btn btn-primary form-control">
        </form>
    </div>
@endsection
