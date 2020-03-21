<?php

use App\Todo;
use Illuminate\Database\Seeder;

class todos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $data = [];
        
        for ($i = 1; $i <= 5 ; $i++) {
            array_push($data, [
                'name' => $faker->sentence(),
            ]);
        }
        
        Todo::insert($data);
    }
}
