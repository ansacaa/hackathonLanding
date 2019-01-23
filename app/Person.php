<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team;

class Person extends Model
{
    protected $fillable = ['name', 'file', 'birthdate', 'school'];
    protected $dates = ['birthdate'];

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
