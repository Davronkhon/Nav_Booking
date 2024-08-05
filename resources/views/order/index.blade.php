{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        @if(session('message'))--}}
{{--            <div class="alert alert-success">--}}
{{--                {{ session('message') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form action="{{ route('order.store') }}" method="POST" id="orderForm">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="booking_id" value="{{ $bookingId }}">--}}

{{--            <table class="table" id="orderTable">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Food</th>--}}
{{--                    <th>Price</th>--}}
{{--                    <th>Quantity</th>--}}
{{--                    <th>Total</th>--}}
{{--                    <th>Action</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @foreach($orders as $order)--}}
{{--                    <tr class="order-row">--}}
{{--                        <td>--}}
{{--                            <select name="food_id[]" class="form-control food-select">--}}
{{--                                <option value="">Select Food</option>--}}
{{--                                @foreach($foods as $food)--}}
{{--                                    <option value="{{ $food->id }}" data-price="{{ $food->price }}" {{ $order->food_id == $food->id ? 'selected' : '' }}>{{ $food->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </td>--}}
{{--                        <td class="price">{{ number_format($order->food->price, 2) }}</td>--}}
{{--                        <td><input type="number" name="quantity[]" class="form-control quantity" value="{{ $order->quantity }}" min="0"></td>--}}
{{--                        <td class="total">{{ number_format($order->food->price * $order->quantity, 2) }}</td>--}}
{{--                        <td><button type="button" class="btn btn-danger remove-row">Удалить</button></td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--                <tfoot>--}}
{{--                <tr>--}}
{{--                    <td colspan="3" class="text-right"><strong>Общая сумма</strong></td>--}}
{{--                    <td colspan="2" class="grand-total"></td>--}}
{{--                </tr>--}}
{{--                </tfoot>--}}
{{--            </table>--}}

{{--            <button type="button" class="btn btn-primary" id="addRow">Добавить строку</button>--}}
{{--            <button type="submit" class="btn btn-success">Сохранить</button>--}}
{{--        </form>--}}
{{--    </div>--}}


{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            function initializeSelect2(element) {--}}
{{--                element.select2({--}}
{{--                    placeholder: "Select Food",--}}
{{--                    allowClear: true--}}
{{--                });--}}
{{--            }--}}

{{--            function updateRow(row) {--}}
{{--                const price = parseFloat(row.find('.food-select option:selected').data('price') || 0);--}}
{{--                const quantity = parseInt(row.find('.quantity').val() || 0);--}}
{{--                const total = price * quantity;--}}
{{--                row.find('.price').text(price.toFixed(2));--}}
{{--                row.find('.total').text(total.toFixed(2));--}}
{{--                updateGrandTotal();--}}
{{--            }--}}

{{--            function updateGrandTotal() {--}}
{{--                let grandTotal = 0;--}}
{{--                $('.total').each(function() {--}}
{{--                    grandTotal += parseFloat($(this).text() || 0);--}}
{{--                });--}}
{{--                $('.grand-total').text(grandTotal.toFixed(2));--}}
{{--            }--}}


{{--            initializeSelect2($('.food-select'));--}}


{{--            $('#orderTable').on('change', '.food-select, .quantity', function() {--}}
{{--                const row = $(this).closest('tr');--}}
{{--                updateRow(row);--}}
{{--            });--}}


{{--            $('#addRow').click(function() {--}}
{{--                const newRow = $(--}}
{{--                    '<tr class="order-row">' +--}}
{{--                    '<td>' +--}}
{{--                    '<select name="food_id[]" class="form-control food-select">' +--}}
{{--                    '<option value="">Select Food</option>' +--}}
{{--                    @foreach($foods as $food)--}}
{{--                        '<option value="{{ $food->id }}" data-price="{{ $food->price }}">{{ $food->name }}</option>' +--}}
{{--                    @endforeach--}}
{{--                        '</select>' +--}}
{{--                    '</td>' +--}}
{{--                    '<td class="price"></td>' +--}}
{{--                    '<td><input type="number" name="quantity[]" class="form-control quantity" value="0" min="0"></td>' +--}}
{{--                    '<td class="total"></td>' +--}}
{{--                    '<td><button type="button" class="btn btn-danger remove-row">Remove</button></td>' +--}}
{{--                    '</tr>'--}}
{{--                );--}}

{{--                $('#orderTable tbody').append(newRow);--}}
{{--                initializeSelect2(newRow.find('select'));--}}
{{--            });--}}

{{--            $('#orderTable').on('click', '.remove-row', function() {--}}
{{--                $(this).closest('tr').remove();--}}
{{--                updateGrandTotal();--}}
{{--            });--}}

{{--            $('#orderForm').submit(function(event) {--}}
{{--                event.preventDefault();--}}
{{--                $.ajax({--}}
{{--                    url: '{{ route("order.store") }}',--}}
{{--                    method: 'POST',--}}
{{--                    data: $(this).serialize(),--}}
{{--                    success: function(response) {--}}
{{--                        alert('Order saved successfully');--}}
{{--                        location.reload();--}}
{{--                    },--}}
{{--                    error: function(xhr) {--}}
{{--                        alert('An error occurred. Please try again.');--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--            updateGrandTotal();--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
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

        <form action="{{ route('order.store') }}" method="POST" id="orderForm">
            @csrf
            <input type="hidden" name="booking_id" value="{{ $bookingId }}">

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
                @foreach($orders as $order)
                    <tr class="order-row">
                        <td>
                            <select name="food_id[]" class="form-control food-select">
                                <option value="">Select Food</option>
                                @foreach($foods as $food)
                                    <option value="{{ $food->id }}" data-price="{{ $food->price }}" {{ $order->food_id == $food->id ? 'selected' : '' }}>{{ $food->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="price">{{ number_format($order->food->price, 2) }}</td>
                        <td><input type="number" name="quantity[]" class="form-control quantity" value="{{ $order->quantity }}" min="0"></td>
                        <td class="total">{{ number_format($order->food->price * $order->quantity, 2) }}</td>
                        <td><button type="button" class="btn btn-danger remove-row">Удалить</button></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Общая сумма</strong></td>
                    <td colspan="2" class="grand-total"></td>
                </tr>
                </tfoot>
            </table>

            <button type="button" class="btn btn-primary" id="addRow">Добавить строку</button>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script>
        $(document).ready(function() {
            function initializeSelect2(element) {
                element.select2({
                    placeholder: "Select Food",
                    allowClear: true
                });
            }

            function updateRow(row) {
                const price = parseFloat(row.find('.food-select option:selected').data('price') || 0);
                const quantity = parseInt(row.find('.quantity').val() || 0);
                const total = price * quantity;
                row.find('.price').text(price.toFixed(2));
                row.find('.total').text(total.toFixed(2));
                updateGrandTotal();
            }

            function updateGrandTotal() {
                let grandTotal = 0;
                $('.total').each(function() {
                    grandTotal += parseFloat($(this).text() || 0);
                });
                $('.grand-total').text(grandTotal.toFixed(2));
            }

            initializeSelect2($('.food-select'));

            $('#orderTable').on('change', '.food-select, .quantity', function() {
                const row = $(this).closest('tr');
                updateRow(row);
            });

            $('#addRow').click(function() {
                const newRow = $(
                    '<tr class="order-row">' +
                    '<td>' +
                    '<select name="food_id[]" class="form-control food-select">' +
                    '<option value="">Select Food</option>' +
                    @foreach($foods as $food)
                        '<option value="{{ $food->id }}" data-price="{{ $food->price }}">{{ $food->name }}</option>' +
                    @endforeach
                        '</select>' +
                    '</td>' +
                    '<td class="price"></td>' +
                    '<td><input type="number" name="quantity[]" class="form-control quantity" value="0" min="0"></td>' +
                    '<td class="total"></td>' +
                    '<td><button type="button" class="btn btn-danger remove-row">Remove</button></td>' +
                    '</tr>'
                );

                $('#orderTable tbody').append(newRow);
                initializeSelect2(newRow.find('select'));
            });

            $('#orderTable').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
                updateGrandTotal();
            });

            $('#orderForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: '{{ route("order.store") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            updateGrandTotal();
        });
    </script>
@endsection
