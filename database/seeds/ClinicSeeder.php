<?php

use Illuminate\Database\Seeder;
use App\Clinic;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinic_list = config('seeder.clinics');

        foreach ($clinic_list as $clinic) {

            $newClinic = new Clinic();
            $newClinic->name = $clinic['name'];
            $newClinic->city = $clinic['city'];
            $newClinic->address = $clinic['address'];
            $newClinic->phone_clinic = $clinic['phone_clinic'];
            $newClinic->save();


            # code...
        }
    }
}
