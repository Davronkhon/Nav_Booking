<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::with(['restaurant', 'foodcategory'])->get();
        return view('food.index', compact('foods'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $foodcategories = FoodCategory::all();
        return view('food.create', compact('foodcategories', 'restaurants'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'food_category_id' => 'required|exists:food_categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer|min:1',
            'description' => 'required',
            'time' => 'required',
            'is_active' => 'required',
        ]);

        //$data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/images/foods'), $imageName);
            $data['image'] =  $imageName;
        }

        Food::create($data);
        return redirect()->route('food.index')->with('succes', 'food sdlfkho wn');
    }

    public function show($id)
    {
        $foods = Food::findOrFail($id);
        return view('food.edit', compact('foods'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'food_category_id' => 'required|exists:food_categories,id',
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer|min:1',
            'description' => 'required',
            'time' => 'required|date_format:H:i:s',
            'is_active' => 'required',
        ]);
        $foods = Food::findOrFail($id);
        $foods->foodcategory_id = $request->food_category_id;
        $foods->restaurant_id = $request->restaurant_id;
        $foods->name = $request->name;
        $foods->price = $request->price;
        $foods->description = $request->description;
        $foods->time = $request->time;
        $foods->is_active = $request->is_active;
        $foods->image = $request->image;
        $foods->save();
        return redirect('/food')->with('success', 'foods updated successfully.');
    }

    public function destroy($id)
    {
        $foods = Food::findOrFail($id);
        $foods->delete();
        return redirect()->route('food.index')->with('success', 'foods deleted successfully.');
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $foodcategories = FoodCategory::all();
        $restaurants = Restaurant::all();
        return view('food.edit', compact('food', 'foodcategories', 'restaurants'));
    }
}
