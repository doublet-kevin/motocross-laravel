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
use League\Csv\Writer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Dompdf\Dompdf;


class TrainingController extends Controller
{
    public function index()
    {

        $trainings = Training::select(
            'trainings.*',
            DB::raw('COUNT(registrations.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->groupBy('trainings.id', 'trainings.type', 'trainings.date', 'trainings.max_participants', 'trainings.circuit_id')
            ->orderBy('trainings.date', 'desc')
            ->get();

        // Séparez les entraînements pour les enfants et les adultes
        $young_pilot = $trainings->where('type', 'Jeune pilote');
        $veteran_pilot = $trainings->where('type', 'Pilote senior');

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

    public function dlPilotsPDF($id)
    {

        $training = Training::find($id);

        $pilots = $training->registrations->map(function ($registration) {
            return [
                'Prenom' => $registration->user->firstname,
                'Nom' => $registration->user->lastname,
                'Inscrit_le' => Carbon::parse($registration->user->created_at)->format('d/m/Y à H:i'),
            ];
        });

        // Création du contenu HTML pour le PDF
        $html = '<h1>Liste des pilotes</h1><table><tr><th>Prénom</th><th>Nom</th><th>Inscrit le</th></tr>';
        foreach ($pilots as $pilot) {
            $html .= '<tr><td>' . $pilot['Prenom'] . '</td><td>' . $pilot['Nom'] . '</td><td>' . $pilot['Inscrit_le'] . '</td></tr>';
        }
        $html .= '</table>';

        // Instanciation de Dompdf
        $dompdf = new Dompdf();

        // Chargement du contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Génération du PDF
        $dompdf->render();

        // Téléchargement du PDF avec un nom de fichier spécifié
        return $dompdf->stream('pilots.pdf');
    }

    public function dlPilotsCSV($id)
    {
        $training = Training::find($id);

        $pilots = $training->registrations->map(function ($registration) {
            return [
                'Prenom' => $registration->user->firstname,
                'Nom' => $registration->user->lastname,
                'Inscrit_le' => Carbon::parse($registration->user->created_at)->format('d/m/Y à H:i'),
            ];
        });

        $csv = Writer::createFromString('');
        $csv->insertOne(['Prenom', 'Nom', 'Inscrit_le']);

        foreach ($pilots as $pilot) {
            $csv->insertOne([$pilot['Prenom'], $pilot['Nom'], $pilot['Inscrit_le']]);
        }

        // Enregistrement du contenu CSV dans un fichier temporaire dans le stockage Laravel
        $filePath = 'temp/pilots.csv';
        Storage::put($filePath, $csv->toString());

        // Récupération du contenu du fichier temporaire
        $fileContent = Storage::get($filePath);

        // Suppression du fichier temporaire après récupération de son contenu
        Storage::delete($filePath);

        // Création de la réponse avec le contenu CSV
        $response = new Response($fileContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="pilots.csv"',
        ]);

        // Retour de la réponse pour télécharger le fichier CSV
        return $response;
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

        return redirect()->route('training.board')->with('message', "L'entraînement à bien été créer !");
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

        return redirect()->route('training.board')->with('message', 'L\'entraînement est modifié !');
    }

    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();

        $circuit = Circuit::where('id', $id)->get();
        // $destinataires = User::all();
        // foreach ($destinataires as $destinataire) {
        //     Mail::to($destinataire->email)->send(new EventMail($training, $circuit));
        // }


        Mail::to('ahounoumeryl@yahoo.fr')->send(new EventMail($training, $circuit));

        return back()->with('message', 'L\'entraînement est annulé !');
    }

    public function board()
    {
        $trainings = Training::select(
            'trainings.*',
            DB::raw('COUNT(registrations.id) as occupied_places')
        )
            ->leftJoin('registrations', 'trainings.id', '=', 'registrations.training_id')
            ->groupBy('trainings.id', 'trainings.type', 'trainings.date', 'trainings.max_participants', 'trainings.circuit_id')
            ->paginate(10);

        return view('training.admin-board', ['trainings' => $trainings]);
    }
}
