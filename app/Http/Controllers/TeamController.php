<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Person;
use Validator;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::orderBy('name')->get();

        return view('teams.index', compact('teams'));
    }

    public function create() {

    }

    public function store(Request $request) {

    }

    public function show(Team $team) {
        return view('teams.show', compact('team'));
    }

    public function update(Request $request, Team $team) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:100'
        ]);

        if($validator->fails()) {
            session()->flash('editing', true);
            return redirect()->back()->withErrors($validator);
        }

        $team->update($request->all());
        $team->save();
        
        session()->flash('success', 'Equipo actualizado correctamente.');
        return redirect(route('teams.show', $team->id));
    }

    public function approve(Team $team) {

    }

    public function confirm($uuid) {

    }

    public function delete(Team $team) {
        $team->delete();

        session()->flash('message', 'Equipo eliminado correctamente.');
        return redirect(route('teams'));
    }
}
