<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('food', 'booking')->get();
        return view('order.index', compact('orders'));
    }
    public function create()
    {
        $orders = Order::all();
        $foods = Food::all();
        $clients = Client::all();
        $bookings = Booking::all();

        return view('order.create', compact('orders', 'foods', 'clients', 'bookings'));
    }
    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();
        return redirect('/order')->with('success', 'book');
    }
    public function edit($id)
    {
        $order = [Order::findOrFail($id), Booking::findOrFail($id), Food::findOrFail($id), Client::findOrFail($id)];
        return view('order.edit', compact('order'));
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }
    public function store(Request $request)
    {
        $orders = $request->validate([
            'quantity' => 'required|string|min:1',
            'order_datetime' => 'required|string',
            'status' => 'required|string',
            'booking_id' => 'required|exists:bookings,id',
            'food_id' => 'required|exists:foods,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        $request['order_datetime'] = now();
        Order::create($orders);
        return redirect()->route('order.index')->with('success', 'Order');
    }
    public function update(Request $request, $id)
    {
        $order = $request->validate([
            'quantity' => 'required|integer|min:1',
            'date' => 'required|string',
            'status' => 'required|string',
            'booking_id' => 'required|exists:users,id',
            'food_id' => 'required|exists:restaurants,id',
            'client_id' => 'required|exists:restaurants,id'
        ]);

        $orders = Order::findOrFail($id);
        $orders->update($order);
        return redirect('/order')->with('success', 'Order');
    }
}
