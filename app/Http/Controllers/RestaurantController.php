<?php

namespace App\Http\Controllers;

use App\Models\RestCategory;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('restCategory')->get();
        return view('restaurant.index', compact('restaurants'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $categories  = RestCategory::all();
        return view('restaurant.create', compact('restaurants','categories'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $restaurant = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'rest_category_id' => 'required|exists:rest_categories,id',
        ]);

        Restaurant::create($restaurant);
        return redirect()->route('restaurant.index')->with('success', 'Rest успешно добавлена');
    }

    public function show($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        $categories  = RestCategory::findOrFail($id);
        return view('restaurant.show', compact('restaurants', 'categories'));
    }

    public function edit($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        $categories  = RestCategory::findOrFail($id);
        return view('restaurant.edit', compact('restaurants', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $restauran = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'rest_category_id' => 'required|exists:rest_categories,id',
        ]);

        $restaurants = RestCategory::findOrFail($id);
        $restaurants->update($restauran);
        return redirect('/restaurant')->with('success', 'Rest updated successfulle');
    }

    public function destroy($id)
    {
        $restaurants = Restaurant::findOrFail($id);
        $restaurants->delete();
        return redirect('/restaurant')->with('success', 'restaurants deleted successfully.');
    }
}
