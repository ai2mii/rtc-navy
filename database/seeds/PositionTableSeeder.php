<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert([
        	'runningNumber' => 1,
            'code' 	=> 1111111,
            'id' 	=> str_random(10),
            'name' 	=> str_random(10),
            'rang' 	=> str_random(10),
            'corps' => str_random(10),
            'line' 	=> str_random(10),
            
        ]);
    }
}
