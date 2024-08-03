<?php
namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $foodcats = FoodCategory::all();
        return view('foodcat.index', compact('foodcats'));
    }
    public function create()
    {
        $foodcats = FoodCategory::all();
        return view('foodcat.create', compact('foodcats'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $foodc = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        FoodCategory::create($foodc);
        return redirect()->route('foodcat.index')->with('success', 'Категория еды успешно добавлена');
    }
    public function show($id)
    {
        $foodcats = FoodCategory::findOrFail($id);
        return view('foodcat.show', compact('foodcats'));
    }
    public function edit($id)
    {
        $foodcat = FoodCategory::findOrFail($id);
        return view('foodcat.edit', compact('foodcat'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        ]);

        $foodcats = FoodCategory::findOrFail($id);
        $foodcats->update($request->all());
        return redirect('/foodcat')->with('success', 'FoodCategory updated successfully');
    }
    public function destroy($id)
    {
        $foodcats = FoodCategory::findOrFail($id);
        $foodcats->delete();
        return redirect()->route('foodcat.index')->with('success', 'FoodCategory deleted successfully');
    }
}
