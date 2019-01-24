<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Person;

class Team extends Model
{
    use Notifiable;
    
    protected $fillable = ['name', 'phone', 'email'];
    protected $dates = ['confirmed_at', 'approved_at'];
    protected $hidden = ['code'];

    static $rules = [
        'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:100',
            'names' => 'required|array|size:4',
            'schools' => 'required|array|size:4',
            'birthdates' => 'required|array|size:4',
            'files' => 'required|array|size:4',
            'names.*' => 'required|string|max:100',
            'schools.*' => 'required|string|max:100',
            'birthdates.*' => 'required|date|before:2004-31-12|after:1950-31-12',
            'files.*' => 'required|file|mimes:pdf|max:3000'
    ];

    public function people() {
        return $this->hasMany(Person::class);
    }
}
