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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

use function PHPUnit\Framework\isEmpty;

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
        $user = User::findOrFail($id);

        //Check if email not exist in 'associate_email' column in licenses table
        Validator::extend('uniqueEmailAndLicense', function ($attribute, $value, $parameters, $validator) use ($user) {
            $mailUnchanged = $user->email === $value;
            $licenseAlreadyUsed = License::where('associate_email', $value)->exists();

            return $mailUnchanged || !$licenseAlreadyUsed;
        });

        //Check if license number is not already used
        Validator::extend('licenseAlreadyUsed', function ($attribute, $value, $parameters, $validator) use ($user) {
            $liceseUnchanged = $user->license_number === $value;
            $licenseAlreadyUsed = License::where('license_number', $value)->exists();

            return $liceseUnchanged || !$licenseAlreadyUsed;
        });

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
                Rule::unique('users')->ignore($user->id),
                'unique_email_and_license:' . $user->id,
            ],
            'birth_date' => 'required|string|max:255|before:-12 years',
            'license_number' => [
                'nullable',
                'string',
                'max:255',
                'license_already_used:' . $user->id,
            ],
        ]);

        $validator->setCustomMessages([
            'license_number.exists' => "Le numéro de licence n'existe pas ou est déjà utilisé.",
            'email.unique' => "L'adresse email est déjà utilisée.",
            'birth_date.before' => "Vous devez avoir au moins 12 ans pour vous inscrire.",
            'required' => 'Le champs est requis.',
            'unique_email_and_license' => 'L\'adresse email est déjà utilisée.',
            'license_already_used' => 'Le numéro de licence est déjà utilisé.',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $updateLicense = License::where('associate_email', $user->email)->where('user_id', $id)->first();
        if ($updateLicense) {
            $updateLicense->update([
                'associate_email' => $request->email,
                'user_id' => $user->id,
            ]);
        }

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

        return redirect()->route('user.show', $id)->with('message', 'Le profil a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (Auth::id() == $user->id) {
            $user->delete();
            Auth::logout();
            return back()->with('message', 'Votre compte a été supprimé avec succès.');
        } else if (Auth::user()->role->name == 'admin') {
            $user->delete();
            return back()->with('message', 'L\'utilisateur a été supprimé avec succès.');
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
        $users = User::paginate(10);
        return view('user.admin-board', ['users' => $users]);
    }
}
