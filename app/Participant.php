<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Team;

class Participant extends Model
{
    protected $fillable = ['name', 'lastname', 'birthdate', 'school', 'phone', 'gender', 'race', 'major', 'expected', 'race', 'email',  'file', 'team_id'];
    protected $dates = ['birthdate'];

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public static function createTeam(Request $request, Team $team) {
        $data = $request->all();
        for($i=1; $i<=4; $i++) {
            Person::create([
                'name' => $data['names'][$i],
                'lastname' => $data['lastnames'][$i],
                'email' => $data['emails'][$i],
                'school' => $data['schools'][$i],
                'phone' => $data['phones'][$i],
                'gender' => $data['genders'][$i],
                'race' => $data['races'][$i],
                'major' => $data['majors'][$i],
                'level' => $data['levels'][$i],
                'birthdate' => $data['birthdates'][$i],
                'file' => str_replace('public', 'storage', $request->file('files')[$i]->store('public/docs')),
                'team_id' => $team->id
            ]);
        }
    }
}
