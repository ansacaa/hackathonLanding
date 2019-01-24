<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Team;

class Person extends Model
{
    protected $fillable = ['name', 'file', 'birthdate', 'school', 'team_id'];
    protected $dates = ['birthdate'];

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public static function createTeam(Request $request, Team $team) {
        $data = $request->all();
        for($i=1; $i<=4; $i++) {
            Person::create([
                'name' => $data['names'][$i],
                'school' => $data['schools'][$i],
                'birthdate' => $data['birthdates'][$i],
                'file' => str_replace('public', 'storage', $request->file('files')[$i]->store('public/docs')),
                'team_id' => $team->id
            ]);
        }
    }
}
