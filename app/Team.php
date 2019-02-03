<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Participant;
use Ramsey\Uuid\Uuid;

class Team extends Model
{
    use Notifiable;
    
    protected $fillable = ['name', 'phone', 'email'];
    protected $dates = ['confirmed_at', 'approved_at'];
    protected $hidden = ['code'];

    static $rules = [
        'name' => 'required|string|max:100',
        'conduct' => 'required',
        'terms' => 'required',

        'names' => 'required|array|size:4',
        'lastnames' => 'required|array|size:4',
        'emails' => 'required|array|size:4',
        'phones' => 'required|array|size:4',
        'schools' => 'required|array|size:4',
        'majors' => 'required|array|size:4',
        'levels' => 'required|array|size:4',
        'expecteds' => 'required|array|size:4',
        'genders' => 'required|array|size:4',
        'races' => 'required|array|size:4',
        'birthdates' => 'required|array|size:4',
        'vegetarians' => 'required|array|size:4',
        'files' => 'required|array|size:4',

        'names.*' => 'required|string|max:100',
        'lastnames.*' => 'required|string|max:100',
        'emails.*' => 'required|string|email|max:255|unique:teams,email',
        'phones.*' => 'required|string|max:25',
        'schools.*' => 'required|string|max:100',
        'majors.*' => 'required|string|max:100',
        'levels.*' => 'required|string|max:100',
        'expecteds.*' => 'required|numeric|min:2019|max:2030',
        'genders.*' => 'required|string|max:100',
        'races.*' => 'required|string|max:100',
        'birthdates.*' => 'required|date|before:2005-01-01|after:1950-01-01',
        'vegetarians.*' => 'required|boolean',
        'files.*' => 'required|file|mimes:pdf|max:2048'
    ];

    public function participants() {
        return $this->hasMany(Participant::class);
    }

    public static function createFromRequest(Request $request) {
        $data = $request->all();

        $team = Team::create([
            'name' => $data['name'],
            'email' => $data['emails'][1],
            'phone' => $data['phones'][1]
        ]);

        $team->code = Uuid::uuid1();
        $team->save();

        return $team;
    }
}
