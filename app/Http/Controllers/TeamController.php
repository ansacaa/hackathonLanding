<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Participant;
use Validator;
use Carbon\Carbon;
use App\Notifications\ApprovalNotification;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class TeamController extends Controller
{
    /**
     * Lists the registered teams
     */
    public function index() {
        $teams = Team::orderBy('name')->get();

        return view('teams.index', compact('teams'));
    }

    /**
     * Displays the registration form only if the registration date has passed
     */
    public function create() {
        if(Carbon::now()->lessThanOrEqualTo(new Carbon('2019-11-01'))) {
            session()->flash('error' ,'Las inscripciones comienzan el primero de febrero de 2019.');
            return redirect(route('index'));
        }

        return view('teams.create');
    }

    /**
     * Creates a team, stores the members with its files
     * assigns a uuid to the team and sends email verification notification
     */
    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), Team::$rules);
            
            if($validator->fails()) {
                session()->flash('error', 'Revisa el formulario.');
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            
            $team = Team::createFromRequest($request);
            Participant::createFromRequest($request, $team);

            Mail::to($team->email)->send(new VerifyMail($team));

            session()->flash('success', 'Te has registrado exitosamente. Busca en tu correo el mensaje de verificacion.');
            return redirect(route('index'));
        }
        catch(Exception $e) {
            Log::error($e);
            
            if($team != null) $team->delete();

            session()->flash('error', 'Revisa el tamaño de los archivos.');
            return redirect(route('index'));
        }
    }

    /**
     * Retrieves and displays a team
     */
    public function show(Team $team) {
        return view('teams.show', compact('team'));
    }

    /**
     * Updates the team information
     */
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

    /**
     * Approves a team, sends the approval notification
     */
    public function approve(Team $team) {
        $team->approved_at = Carbon::now();
        $team->save();

        $team->notify(new ApprovalNotification($team));

        session()->flash('success', 'Equipo aprobado.');
        return redirect(route('teams.show', $team->id));
    }

    /**
     * Confirms a team
     */
    public function confirm($uuid) {
        $team = Team::where('code', $uuid)->get()->first();

        if($team == null) {
            session()->flash('error', 'No se encuentra el equipo especificado.');
        }
        else {
            $team->confirmed_at = Carbon::now();
            $team->save();

            session()->flash('success', 'Tu correo ha sido verificado. Ahora nuestro equipo revisará tu solicitud.');
        }

        return redirect(route('index'));
    }

    /**
     * Checks in a team
     */
    public function checkin($uuid) {
        $team = Team::where('code', $uuid)->get()->first();

        if($team == null) {
            session()->flash('error', 'No se encuentra el equipo especificado.');
            return redirect(route('index'));
        }
        else {
            $team->assisted_at = Carbon::now();
            $team->save();

            session()->flash('success', 'Se ha marcado tu asistencia.');
            return redirect(route('teams.show', $team->id));
        }
    }

    /**
     * Manually checks in a team
     */
    public function manualCheckin(Team $team) {
        $team->assisted_at = Carbon::now();
        $team->save();

        session()->flash('success', 'Se ha marcado tu asistencia.');
        return redirect(route('teams.show', $team->id));
    }

    /**
     * Checks out a team
     */
    public function checkout(Team $team) {
        $team->assisted_at = null;
        $team->save();

        session()->flash('success', 'Se ha eliminado la asistencia.');
        return redirect(route('teams.show', $team->id));
    }

    /**
     * Resends the email verification notification
     */
    public function resend(Team $team) {
        $team->notify(new EmailVerificationNotification($team));

        session()->flash('success', 'Se ha reenviado el correo de confirmación.');

        return redirect()->back();
    }

    /**
     * Deletes a team
     */
    public function delete(Team $team) {
        $team->delete();

        session()->flash('success', 'Equipo eliminado correctamente.');
        return redirect(route('teams'));
    }

    public function assistance() {
        $teams = Team::where('approved_at', '!=', null)->get();

        return view('teams.assistance', compact('teams'));
    }
}
