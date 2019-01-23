<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Person;

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

    }

    public function edit(Team $team) {

    }

    public function update(Request $request, Team $team) {

    }

    public function approve(Team $team) {

    }

    public function confirm($uuid) {

    }

    public function delete(Team $team) {

    }
}
