<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        $clubs = Club::all();
        return view('user.create', ['clubs' => $clubs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_club' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $user = User::create([
            'id_club' => $request->id_club,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'region' => $request->region,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_club' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'id_club' => $request->id_club,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'region' => $request->region,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }
}
