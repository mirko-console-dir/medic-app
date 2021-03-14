<?php

use Illuminate\Database\Seeder;
use App\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $specializations_list = config('seeder.specializations');

        foreach($specializations_list as $specialization){

            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization['name'];

            $newSpecialization->save();

        }



    }
}
