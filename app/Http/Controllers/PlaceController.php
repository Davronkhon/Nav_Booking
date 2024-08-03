<?php
namespace App\Http\Controllers;

use App\Models\place;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('place.index', compact('places'));
    }

    public function create()
    {
        $restourants =  Restaurant::all();
        return view('place.create', compact('restourants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);
        Place::create($request->all());

        return redirect('/place')->with('success', 'Place created successfully');
    }

    public function show($id)
    {
        $places = Place::findOrFail($id);
        return view('place.show', compact('places'));
    }

    public function edit($id)
    {
        $restourants = Restaurant::all();
        $places = Place::findOrFail($id);
        return view('place.edit', compact('places', 'restourants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'number' => 'required|string',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'restaurant_id' => 'required|exists:restaurants,id'
        ]);

        $places= Place::findOrFail($id);
        $places->update($request->all());

        return redirect('/place')->with('success', 'Place updated successfully');
    }

    public function destroy($id)
    {
        $places = Place::findOrFail($id);
        $places->delete();

        return redirect('/place')->with('success', 'Place deleted successfully');
    }
}

