<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        $users = User::all();
        return view('user.create', compact('users'));
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            DB::table('users')->where('id', $id)->delete();
            DB::commit();

            return redirect()->route('user.index')->with('success', 'Пользователь успешно удален');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('user.index')->with('error', 'Ошибка при удалении пользователя: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function show(User $user, $id)
    {
        $users = User::findOrFail($id);
        return view('user.show', compact('users'));
    }
    public function store(Request $request)
    {
        $users = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string',
        ]);

        User::create($users);
        return redirect()->route('user.index')->with('success', 'User успешно добавлена');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|string',
        ]);

        $users = User::findOrFail($id);
        $users->update($request->all());
        return redirect('/user')->with('success', 'User updated successfulle');
    }
}
