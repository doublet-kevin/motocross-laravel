<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Training;
use App\Models\User;

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
        Registration::create([
            'training_id' => $request->id_training,
            'user_id' => $request->id_user,
        ]);

        return back()->with('success', 'Registration created successfully');
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
            'id_training' => $request->id_training,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('registration.index');
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registration.index');
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('registration.show', ['registration' => $registration]);
    }
}
