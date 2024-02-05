<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\License;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function create()
    {
        $clubs = Club::all();
        $regions = Http::get('https://geo.api.gouv.fr/regions')->json();

        return view('user.create', ['clubs' => $clubs, 'regions' => $regions]);
    }

    // Cette fonction est inutile, c'est CreateNewUser dans Fortify qui se charge de créer un nvl utilisateur 
    // public function store(Request $request)
    // {
        
    //     $request->validate([
    //         'firstname' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'region' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'postal_code' => 'required|string|max:5',
    //         'email' => 'required|string|max:255',
    //         'birth_date' => 'required|string|max:255',
    //         'license_number' => 'unique|nullable|string|max:255',
    //         'password' => 'required|string|max:255',
    //     ]);

    // }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $clubs = Club::all();
        $regions = Http::get('https://geo.api.gouv.fr/regions')->json();
        return view('user.edit', ['user' => $user, 'clubs' => $clubs, 'regions' => $regions]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_club' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'email' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'license_number' => 'nulllable|string|max:255',
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
            'license_number' => $request->license_number,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (Auth::id() == $user->id) {
            $user->delete();
            Auth::logout();
            return back()->with('success', 'Votre compte a été supprimé avec succès.');
        } else if (Auth::user()->role->name == 'admin') {
            $user->delete();
            return back()->with('success', 'L\'utilisateur a été supprimé avec succès.');
        } else {
            return back();
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    public function board()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }
}
