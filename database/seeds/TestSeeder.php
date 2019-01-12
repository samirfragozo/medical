<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Patient::class, 5)->create();
        factory(App\Professional::class, 5)->create();
    }
}
