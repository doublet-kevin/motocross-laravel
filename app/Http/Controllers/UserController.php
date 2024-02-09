<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\License;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        $clubs = Club::all();
        $regions = Http::get('https://geo.api.gouv.fr/regions')->json();

        return view('user.create', ['clubs' => $clubs, 'regions' => $regions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'email' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'license_number' => 'unique:users,license_number|nullable|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        User::create([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "region" => $request->region,
            "city" => $request->city,
            "postal_code" => $request->postal_code,
            "email" => $request->email,
            "birth_date" => $request->birth_date,
            "license_number" => $request->license_number,
            "password" => $request->password,
            "role_id" => 1,
            "club_id" => 1,
        ]);

        return redirect()->route('user.board');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $clubs = Club::all();
        $regions = Http::get('https://geo.api.gouv.fr/regions')->json();
        return view('user.edit', ['user' => $user, 'clubs' => $clubs, 'regions' => $regions]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'birth_date' => 'required|string|max:255|before:-12 years',
            'license_number' => [
                'nullable',
                'string',
                'max:255',
                Rule::exists('licenses', 'license_number')->whereNull('user_id')->where('associate_email', $request['email']),
            ],
        ]);

        $validator->setCustomMessages([
            'license_number.exists' => "Le numéro de licence n'existe pas ou est déjà utilisé.",
            'email.unique' => "L'adresse email est déjà utilisée.",
            'birth_date.before' => "Vous devez avoir au moins 12 ans pour vous inscrire.",
            'required' => 'Le champs est requis.',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $user = User::findOrFail($id);
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'region' => $request->region,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'license_number' => $request->license_number,
        ]);

        return redirect()->route('user.show', $id);
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
        return view('user.admin-board', ['users' => $users]);
    }
}
