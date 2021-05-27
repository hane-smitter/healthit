<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\role;
use App\Models\Proficiency;
use App\Models\Appointment;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        $startDate = 'now';
        $interval = '+ 1 year';
        $strings = array(
            'Infectology',
            'Cardiology',
            'Dermatology',
            'Pediatric',
        );


        for ($i = 0; $i < 100; $i++) {
            $key = array_rand($strings);
            $appointment = Appointment::create([
                'realizada' => rand(0, 1),
                'name' => $faker->name,
                'sns' => rand(100000000, 999999999),
                'data' => $faker->dateTime($startDate, $interval),
                'especialidade' =>  'Dermatology',
                'user_id' => rand(1, 9),
            ]);
        }
    }
}
