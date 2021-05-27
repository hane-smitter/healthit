<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller;
use Faker\Generator;
use Illuminate\Container\Container;
use App\Models\User;
use App\Models\Role;
use App\Models\Proficiency;


class UsersTableSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {


        DB::table('roles')->insert([
            'name' => 'Doctor',
        ]);
        DB::table('roles')->insert([
            'name' => 'Helpdesk',
        ]);





        for ($i = 0; $i < 10; $i++) {
            $user =  User::create([
                'name' => $this->faker->name,
                'seg_social' => rand(10000000, 99999999),
                'hora_in' => '09:00',
                'hora_out' => '15:00',
                'email' => $this->faker->userName . '@healthit.com',
                'password' => bcrypt('smart1234'),
            ]);
            $user->role()->attach(Role::where('name', 'Doctor')->first());

            $vala = rand(1, 4);
            for ($c = 0; $c < 1; $c++) {

                if ($vala === 1) {
                    $user->proficiencies()->attach(Proficiency::where('name', 'Dermatology')->first());
                }
                if ($vala === 2) {
                    $user->proficiencies()->attach(Proficiency::where('name', 'Pediatric')->first());
                }
                if ($vala === 3) {
                    $user->proficiencies()->attach(Proficiency::where('name', 'Cardiology')->first());
                }
                if ($vala === 4) {
                    $user->proficiencies()->attach(Proficiency::where('name', 'Infectology')->first());
                }
            }
        }

        $user =  User::create([
            'name' => 'Doctor',
            'seg_social' => rand(10000000, 99999999),
            'email' => 'doctor@healthit.com',
            'password' => bcrypt('smart1234'),
        ]);
        $user->role()->attach(Role::where('name', 'Doctor')->first());


        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $this->faker->name,
                'seg_social' => rand(0, 99999999),
                'email' => $this->faker->userName . '@healthit.com',
                'password' => bcrypt('smart1234'),
            ]);
            $user->role()->attach(Role::where('name', 'Helpdesk')->first());
        }
        $user =  User::create([
            'name' => 'Admin',
            'seg_social' => rand(10000000, 99999999),
            'email' => 'admin@healthit.com',
            'password' => bcrypt('smart1234'),
        ]);
        $user->role()->attach(Role::where('name', 'Helpdesk')->first());


        /*        DB::table('users')->insert([
            'name' => $random,
            'seg_social' => rand(0, 99999999),
            'email' => $random.'@gmail.com',
            'password' => bcrypt('smart1234'),
        ]);*/
    }
}
