<?php

use Illuminate\Database\Seeder;
use App\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorship_list = config('seeder.sponsorships');
        foreach ($sponsorship_list as $sponsorship) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name =  $sponsorship['name'];
            $newSponsorship->type =  $sponsorship['type'];
            $newSponsorship->price =  $sponsorship['price'];
            $newSponsorship->duration =  $sponsorship['duration'];
            $newSponsorship->save();
        }
    }
}
