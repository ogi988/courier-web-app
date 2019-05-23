<?php

use Illuminate\Database\Seeder;
use App\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicle::truncate();
        $vehicle = Vehicle::create([
            'brand' => 'mercedes',
            'type'=> 'kamion',
            'transport_capacity'=> '2600kg'
            
        ]);
    }
}
