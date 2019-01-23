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

    public function people() {
        return $this->hasMany(Person::class);
    }
}
