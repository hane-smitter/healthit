<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\role;
use App\Models\Proficiency;
use App\Models\Appointment;

class ProficiencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $strings = array(
             'Infectology',
            'Cardiology',
            'Dermatology',
            'Gastroenterology',
            'Pediatric',
            'Neurosurgery',
            'Nuclear medicine',
            'Occupational medicine',
            'Pulmonology',
            'Urology',
            'Vascular surgery',
            'Immunology',
            'Obstetrics',
            'Gynecology',
            'Psychiatry'
            
                );


         foreach ($strings as $value) { 
        $proficiency = Proficiency::create([
            'name' => $value,
            ]);  
        
    }
    }
}
