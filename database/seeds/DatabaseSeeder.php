<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        $this->call(PrefixSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(SponsorshipSeeder::class);
        $this->call(ClinicSeeder::class);



    }
}
