<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Training;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        return view('registration.index', ['registrations' => $registrations]);
    }

    public function create()
    {
        $trainings = Training::all();
        $users = User::all();
        return view('registration.create', ['trainings' => $trainings, 'users' => $users]);
    }

    public function store(Request $request)
    {
        //Already register to this training
        $alereadyExist = Registration::where('training_id', $request->training_id)->where('user_id', $request->user_id)->first();

        if ($alereadyExist) {
            return back()->with('message', 'Vous êtes déjà inscrit à cet entrainement');
        }

        //Registration are closed
        $training = Training::findOrFail($request->training_id);
        if ($training->date < Carbon::now()->subHours(12)) {
            return back()->with('message', 'Les inscriptions à cet entrainement sont fermées');
        }

        //User is not allowd to register
        $user = User::findOrFail($request->user_id);
        $userYearsOld = Carbon::parse($user->birth_date)->age;
        if (
            $userYearsOld < 18 && $training->type === 'Pilote senior'
            || $userYearsOld >= 18 && $training->type === 'Jeune pilote'
        ) {
            return back()->with('message', 'Vous n\'avez pas l\'âge pour vous inscrire à cet entrainement');
        }

        Registration::create([
            'training_id' => $request->training_id,
            'user_id' => $request->user_id,
        ]);

        return back()->with('message', "Vous avez bien été inscrit à l'entrainement");
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        $trainings = Training::all();
        return view('registration.edit', ['registration' => $registration, 'trainings' => $trainings]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'registration_date' => 'required|date',
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update([
            'registration_date' => $request->registration_date,
            'training_id' => $request->training_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('registration.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail(Auth::id());

        $registration = Registration::where('training_id', $id)->where('user_id', Auth::id())->first();
        if ($user->id !== $registration->user_id && !$user->isAdmin()) {
            return back()->with('message', "Vous n'avez pas les droits pour supprimer une inscription");
        }
        $registration->delete();

        return back()->with('message', "Vous avez bien été désinscrit de l'entrainement");
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('registration.show', ['registration' => $registration]);
    }
}
