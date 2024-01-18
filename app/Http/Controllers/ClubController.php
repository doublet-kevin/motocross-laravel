<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::all();       
        return view('club.index', ['clubs' => $clubs]);
    }

    public function create()
    {
        return view('club.create');
    }

    public function store()
    {
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'city' => 'required',
            'postal_code' => 'required',                
        ]);
     
        Club::create([
            "name" => $request->name,
            "region" => $request->region,
            "city" => $request->city,    
            'postal_code' => $request->postal_code
        ]);

        return redirect()->route('club.index');
    }

    public function edit()
    {
       $club = Club::find($id);

       return view('club.edit', ['club' => $club]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        $club = Club::find($id);
        $club->update([
            "name" => $request->name,
            "region" => $request->region,
            "city" => $request->city,
            "postal_code" => $request->postal_code,
        ]);

        return redirect()->route('club.index');
    }

    public function destroy()
    {
        $club = Club::find($id);
        $club->delete();
        return redirect()->route('club.index');
    } 

}