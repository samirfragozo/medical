<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableOneSeeder::class,
            CitiesTableTwoSeeder::class,
            CitiesTableThreeSeeder::class,
            CitiesTableFourSeeder::class,
            CitiesTableFiveSeeder::class,
            SocialSecurityEntitiesTableSeeder::class,
            ProfessionalTypesTableSeeder::class,
            ProfessionalSpecialtiesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        if (App::environment(['local', 'staging', 'testing', 'development'])) {
            $this->call(TestSeeder::class);
        }

        //Activity::truncate();
    }
}
