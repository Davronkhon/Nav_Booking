<?php
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\Models\Order;
//use App\Models\Food;
//
//class OrderController extends Controller
//{
//    public function index($bookingId)
//    {
//        $orders = Order::where('booking_id', $bookingId)->get();
//        $foods = Food::all();
//
//        return view('order.index', compact('orders', 'foods', 'bookingId'));
//    }
//
//
//
//    public function create()
//    {
//        $foods = Food::all();
//
//        return view('order.create', compact('foods'));
//    }
//
//    public function store(Request $request)
//    {
//        $validated = $request->validate([
//            'booking_id' => 'required|integer',
//            'food_id.*' => 'required|integer|exists:food,id',
//            'quantity.*' => 'required|integer|min:0',
//        ]);
//
//        $bookingId = $validated['booking_id'];
//        $orders = Order::where('booking_id', $bookingId)->get()->keyBy('food_id');
//
//        foreach ($validated['food_id'] as $index => $foodId) {
//            $quantity = $validated['quantity'][$index];
//            $food = Food::find($foodId);
//            $price = $food->price;
//
//            if (isset($orders[$foodId])) {
//                $existingOrder = $orders[$foodId];
//                $existingOrder->quantity = $quantity;
//                $existingOrder->total = $price * $quantity;
//                $existingOrder->save();
//            } else {
//                if ($quantity > 0) {
//                    $total = $price * $quantity;
//
//                    Order::create([
//                        'booking_id' => $bookingId,
//                        'food_id' => $foodId,
//                        'quantity' => $quantity,
//                        'price' => $price,
//                        'total' => $total
//                    ]);
//                }
//            }
//        }
//
//        if ($request->ajax()) {
//            return response()->json(['message' => 'Заказ успешно сохранен']);
//        }
//
//        return redirect()->back()->with('message', 'Заказ успешно сохранен!');
//    }
//
//
//    public function edit(Order $order)
//    {
//        $foods = Food::all();
//
//        return view('order.edit', compact('order', 'foods'));
//    }
//
//    public function update(Request $request, Order $order)
//    {
//        $request->validate([
//            'food_id' => 'required|exists:food,id',
//            'quantity' => 'required|integer|min:0',
//        ]);
//
//        $order->update($request->all());
//
//        return redirect()->route('order.index')->with('message', 'Order updated successfully.');
//    }
//
//    public function destroy(Order $order)
//    {
//        $order->delete();
//
//        return redirect()->route('order.index')->with('message', 'Order deleted successfully.');
//    }
//}
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Food;

class OrderController extends Controller
{
    public function index($bookingId)
    {
        $orders = Order::where('booking_id', $bookingId)->get();
        $foods = Food::all();

        return view('order.index', compact('orders', 'foods', 'bookingId'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'booking_id' => 'required|integer',
            'food_id.*' => 'required|integer|exists:food,id',
            'quantity.*' => 'required|integer|min:0',
        ]);

        $bookingId = $validated['booking_id'];
        $orders = Order::where('booking_id', $bookingId)->get()->keyBy('food_id');

        foreach ($validated['food_id'] as $index => $foodId) {
            $quantity = $validated['quantity'][$index];
            $food = Food::find($foodId);
            $price = $food->price;

            if (isset($orders[$foodId])) {
                $existingOrder = $orders[$foodId];
                $existingOrder->quantity = $quantity;
                $existingOrder->total = $price * $quantity;
                $existingOrder->save();
            } else {
                if ($quantity > 0) {
                    $total = $price * $quantity;

                    Order::create([
                        'booking_id' => $bookingId,
                        'food_id' => $foodId,
                        'quantity' => $quantity,
                        'price' => $price,
                        'total' => $total
                    ]);
                }
            }
        }

        if ($request->ajax()) {
            return response()->json(['message' => 'Заказ успешно сохранен']);
        }

        return redirect()->back()->with('message', 'Заказ успешно сохранен!');
    }
}
