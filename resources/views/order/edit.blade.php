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

            <table class="table" id="orderTable">
                <thead>
                <tr>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->foods as $food)
                    <tr>
                        <td>
                            <select name="food_id[]" class="form-control food-select">
                                <option value="">Select Food</option>
                                @foreach($foods as $foodItem)
                                    <option value="{{ $foodItem->id }}" data-price="{{ $foodItem->price }}" {{ $foodItem->id == $food->id ? 'selected' : '' }}>
                                        {{ $foodItem->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="price">{{ $food->price }}</td>
                        <td><input type="number" name="quantity[]" class="form-control quantity" value="{{ $food->pivot->quantity }}" min="0"></td>
                        <td class="total">{{ $food->price * $food->pivot->quantity }}</td>
                        <td><button type="button" class="btn btn-danger remove-row">Remove</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" id="addRow">Add Row</button>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script>
        $(document).ready(function() {
            $('.food-select').select2({
                placeholder: "Select Food",
                allowClear: true
            });

            function updateRow(row) {
                const price = parseFloat(row.find('.food-select option:selected').data('price') || 0);
                const quantity = parseInt(row.find('.quantity').val() || 0);
                const total = price * quantity;
                row.find('.price').text(price.toFixed(2));
                row.find('.total').text(total.toFixed(2));
            }

            $('#orderTable').on('change', '.food-select, .quantity', function() {
                const row = $(this).closest('tr');
                updateRow(row);
            });

            $('#addRow').click(function() {
                const newRow = $('#orderTable tbody tr:first').clone();
                newRow.find('select').select2({
                    placeholder: "Select Food",
                    allowClear: true
                }).val('').trigger('change');
                newRow.find('.price, .total').text('');
                newRow.find('.quantity').val(0);
                $('#orderTable tbody').append(newRow);
            });

            $('#orderTable').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
