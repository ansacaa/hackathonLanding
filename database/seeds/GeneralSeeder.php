<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\Team;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Gecko1',
            'phone' => '2224587898',
            'email' => '2245784589',
            'code' => Uuid::uuid1(),
            'confirmed_at' => Carbon::now(),
            'approved_at' => Carbon::now()
        ]);

        Person::create([
            'name' => 'Person 1',
            'school' => 'Tec',
            'file' => 'assets/images/black.jpg',
            'birthdate' => Carbon::now()->subYears(19),
            'team_id' => 1
        ]);

        Team::create([
            'name' => 'Gecko2',
            'phone' => '2224587898',
            'email' => '2245784589',
            'code' => Uuid::uuid1(),
            'confirmed_at' => Carbon::now()
        ]);

        Person::create([
            'name' => 'Person 2',
            'school' => 'Tec',
            'file' => 'assets/images/black.jpg',
            'birthdate' => Carbon::now()->subYears(18),
            'team_id' => 2
        ]);

        Team::create([
            'name' => 'Gecko3',
            'phone' => '2224587898',
            'email' => '2245784589',
            'code' => Uuid::uuid1(),
        ]);

        Person::create([
            'name' => 'Person 3',
            'school' => 'Tec',
            'file' => 'assets/images/black.jpg',
            'birthdate' => Carbon::now()->subYears(20),
            'team_id' => 3
        ]);
    }
}
