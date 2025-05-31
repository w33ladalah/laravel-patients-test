<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear the patients table first
        DB::table('patients')->truncate();

        $faker = Faker::create();
        $genders = ['male', 'female', 'other'];
        $genderToNumber = config('app.gender_to_number');

        // Create 50 sample patients
        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement($genders);

            Patient::create([
                'name' => $faker->name($gender),
                'gender' => $genderToNumber[$gender],
                'birthdate' => $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
