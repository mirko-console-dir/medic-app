<?php

use Illuminate\Database\Seeder;
use App\Prefix;

class PrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefix_list = config('seeder.prefixes');
        foreach ($prefix_list as $prefix) {
            $newPrefix = new Prefix();
            $newPrefix->name =  $prefix['name'];
            $newPrefix->dial_code =  $prefix['dial_code'];
            $newPrefix->code =  $prefix['code'];
            $newPrefix->save();
        }
    }
}
