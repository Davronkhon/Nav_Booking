<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestCategory;

class RestCategoryController extends Controller
{
    public function index()
    {
        $rests = RestCategory::all();
        return view('rest.index', compact('rests'));
    }


    public function create()
    {
        $rests = RestCategory::all();
        return view('rest.create', compact('rests'));
    }

    public function store(Request $request)
    {
        $restss = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        RestCategory::create($restss);
        return redirect()->route('rest.index')->with('success', 'Rest успешно добавлена');
    }

    public function show($id)
    {
        $rests = RestCategory::findOrFail($id);
        return view('rest.show', compact('rests'));
    }

    public function edit($id)
    {
        $rest = RestCategory::findOrFail($id);
        return view('rest.edit', compact('rest'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $rest = RestCategory::findOrFail($id);
        $rest->update($request->all());
        return redirect('/rest')->with('success', 'Rest updated successfulle');
    }

    public function destroy($id)
    {
        $rests = RestCategory::findOrFail($id);
        $rests->delete();
        return redirect('/rest')->with('success', 'Rest deleted successfully');
    }
}
