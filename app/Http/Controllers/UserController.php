<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\License;
use App\Models\Registration;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Training;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;
    public function create()
    {
        $clubs = Club::all();
        $regions = Http::get('https://geo.api.gouv.fr/regions')->json();

        return view('user.create', ['clubs' => $clubs, 'regions' => $regions]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'email' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'license_number' => 'string|max:255',
            'password' => 'required|string|max:255',
        ]);
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
            $licenseAlreadyUsed = License::where('license_number', $value)->whereNotIn('associate_email', [$user->email])->exists();

            return $liceseUnchanged || !$licenseAlreadyUsed;
        });

        Validator::extend('licenseNotExists', function ($attribute, $value, $parameters, $validator) {
            return License::where('license_number', $value)->exists();
        });

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'email' => 'required|string|max:255',
            'birth_date' => 'required|string|max:255',
            'license_number' => 'string|max:255',
            'password' => 'required|string|max:255',
            'role' => 'required|string|max:255',
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
            'license_number' => $request->birth_date,
            'password' => $request->password,
            'role' => $request->role,
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

        $endedTrainings = Training::select(
            'trainings.*',
            DB::raw('(SELECT COUNT(*) FROM registrations WHERE registrations.training_id = trainings.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->where('registrations.user_id', $id)
            ->where('trainings.date', '<', now())
            ->groupBy('trainings.id', 'trainings.type', 'trainings.date', 'trainings.max_participants', 'trainings.circuit_id')
            ->orderBy('trainings.date', 'desc')
            ->get();

        $nextTrainings = Training::select(
            'trainings.*',
            DB::raw('(SELECT COUNT(*) FROM registrations WHERE registrations.training_id = trainings.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->where('registrations.user_id', $id)
            ->where('trainings.date', '>', now())
            ->groupBy('trainings.id', 'trainings.type', 'trainings.date', 'trainings.max_participants', 'trainings.circuit_id')
            ->orderBy('trainings.date', 'desc')
            ->get();

        return view('user.show', ['user' => $user, 'endedTrainings' => $endedTrainings, 'nextTrainings' => $nextTrainings]);
    }

    public function board()
    {
        $users = User::paginate(10);
        return view('user.admin-board', ['users' => $users]);
    }
}
