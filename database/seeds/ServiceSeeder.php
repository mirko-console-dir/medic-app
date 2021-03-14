<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $services_list = config('seeder.services');

        foreach($services_list as $service){

            $newService = new Service();
            $newService->name = $service['name'];
            $newService->description = $faker->sentence(10);
            $newService->price = $faker->numberBetween(0,200);

            $newService->save();

        }
    }
}
