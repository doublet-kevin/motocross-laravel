<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Circuit;
use App\Models\Training;
use Illuminate\Support\Facades\DB;
use App\Mail\EventMail;
use App\Models\Registration;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class TrainingController extends Controller
{
    public function index()
    {

        $trainings = Training::select(
            'trainings.*',
            'type',
            DB::raw('COUNT(registrations.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->groupBy('trainings.id', 'type')
            ->orderBy('date', 'desc')
            ->get();

        // Séparez les entraînements pour les enfants et les adultes
        $young_pilot = $trainings->where('type', 'enfant');
        $veteran_pilot = $trainings->where('type', 'adulte');


        return view('training.index')->with([
            'youngTrainings' => $young_pilot,
            'adultTrainings' => $veteran_pilot,
            'trainings' => $trainings,
        ]);
    }


    public function show($id)
    {
        $training = Training::find($id);
        $participants = $training->registrations->map->user;
        return view('training.show', ['training' => $training, 'participants' => $participants]);
    }

    public function create()
    {
        $circuits = Circuit::all();
        return view('training.create', ['circuits' => $circuits]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'circuit_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'max_participants' => 'required',
        ]);

        Training::create([
            "circuit_id" => $request->circuit_id,
            "date" => $request->date,
            "type" => $request->type,
            "max_participants" => $request->max_participants,
        ]);

        return redirect()->route('training.index');
    }

    public function edit($id)
    {
        $training = Training::find($id);

        return view('training.edit', ['training' => $training, 'circuits' => Circuit::all()]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'circuit_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'max_participants' => 'required',
        ]);

        $training = Training::find($id);
        $training->update([
            "circuit_id" => $request->circuit_id,
            "date" => $request->date,
            "type" => $request->type,
            "max_participants" => $request->max_participants,
        ]);

        return redirect()->route('training.index');
    }

    public function destroy($id)
    {
        $training = Training::find($id);
        $circuit = Circuit::where('id', $id)->get();
        $training->delete();

        $destinataires = User::all();

        foreach ($destinataires as $destinataire) {
            Mail::to($destinataire->email)->send(new EventMail($training, $circuit));
        }

        return back()->with('success', 'Training deleted successfully');
    }

    public function board()
    {
        $trainings = Training::all();
        return view('admin.training.index', ['trainings' => $trainings]);
    }
}
