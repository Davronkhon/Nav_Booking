<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Client;
//use App\Models\Place;
//use Illuminate\Http\Request;
//use App\Models\Booking;
//
//
//class BookingController extends Controller
//{
//    public function index()
//    {
//        $bookings = Booking::with('place')->get();
//        return view('booking.index', compact('bookings'));
//    }
//
//    public function create()
//    {
//        $bookings = Booking::all();
//        $places = Place::all();
//        $clients = Client::all();
//        return view('booking.create', compact('places','bookings', 'clients'));
//    }
//
//    public function store(Request $request)
//    {
//        //dd($request);
//        $validated = $request->validate([
//            'start_time' => 'required|date',
//            'end_time' => 'required|date|after_or_equal:start_time',
//            'guests' => 'required',
//            'status' => 'required|string',
//            'place_id' => 'required|exists:places,id',
//            'client_id' => 'required|exists:clients,id',
//        ]);
//        dd($request->all());
//
//        //Booking::create($validated);
//        //return redirect()->route('booking.index')->with('message', 'Booking created successfully!');
//    }
//
//    public function show($id)
//    {
//        $bookings = Booking::findOrFail($id);
//        $places = Place::findOrFail($id);
//        $clients = Client::findOrFail($id);
//        return view('booking.show', compact('bookings', 'places', 'clients'));
//    }
//
//    public function edit($id)
//    {
//        $bookings = Booking::findOrFail($id);
//        $places = Place::all();
//        $clients = Client::all();
//        return view('booking.edit', compact('bookings', 'places', 'clients'));
//    }
//
//    public function update(Request $request, $id)
//    {
//        $vali = $request->validate([
//            'start_time' => 'required',
//            'end_time' => 'required',
//            'guests' => 'required',
//            'status' => 'required',
//            'client_id' => 'required|exists:clients,id',
//            'place_id' => 'required|exists:places,id',
//        ]);
//
//        $bookings = Booking::findOrFail($id);
//        $bookings->update($vali);
//        return redirect('/booking')->with('success', 'bookings updated successfully.');
//    }
//
//    public function destroy($id)
//    {
//        $bookings = Booking::findOrFail($id);
//        $bookings->delete();
//        return redirect('/booking')->with('success', 'bookings deleted successfully.');
//    }
//}

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('place', 'client')->get();
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $places = Place::all();
        $clients = Client::all();
        return view('booking.create', compact('places', 'clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'guests' => 'required|integer|min:1',
            'status' => 'required|string',
            'place_id' => 'required|exists:places,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        DB::transaction(function () use ($validated) {
            Booking::create($validated);
        });

        Booking::create($validated);

        //DB::transaction(function () use ($validated) {
        //Booking::create($validated);
        //});


        return redirect()->route('booking.index')->with('message', 'Бронирование успешно создано!');
    }

    public function show($id)
    {
        $booking = Booking::with('place', 'client')->findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $places = Place::all();
        $clients = Client::all();
        return view('booking.edit', compact('booking', 'places', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'guests' => 'required|integer|min:1',
            'status' => 'required|string',
            'client_id' => 'required|exists:clients,id',
            'place_id' => 'required|exists:places,id',
        ]);

        DB::transaction(function () use ($id, $validated) {
            $booking = Booking::findOrFail($id);
            $booking->update($validated);
        });

        return redirect()->route('booking.index')->with('message', 'Бронирование успешно обновлено!');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $booking = Booking::findOrFail($id);
            $booking->delete();
        });

        return redirect()->route('booking.index')->with('message', 'Бронирование успешно удалено!');
    }

}
