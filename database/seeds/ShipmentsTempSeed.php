<?php

use Illuminate\Database\Seeder;

use App\User;
use App\ShipmentTemp;

class ShipmentsTempSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentTemp::truncate();
        $user = User::where('id', '2')->first();
        $shipment_temp = ShipmentTemp::create([
            'shipment_number' => '8056426179730',
            'status'=> 0,
            'method_payment'=>1,
            'mass'=>'23kg',
            'category'=>'tesko',
            'who_pay'=>1,
            'name'=>'og',
            'surname'=>'bol',
            'address'=>'gm1',
            'email'=>'bbasdb@raf.rs',
            'city'=>'bgg',
            'number'=>1567,
            'transport_price'=>100,
            'shipment_price'=>100,
            'type'=>1
        ]);
        $shipment_temp = ShipmentTemp::create([
            'shipment_number' => 145744125877,
            'status'=> 0,
            'method_payment'=>1,
            'mass'=>'45kg',
            'category'=>'ribolov',
            'who_pay'=>1,
            'name'=>'moma',
            'surname'=>'mirkic',
            'address'=>'adresa1',
            'email'=>'sveta@svetozar.nm',
            'city'=>'beograd',
            'number'=>6448972,
            'transport_price'=>200,
            'shipment_price'=>200,
            'type'=>1
        ]);
        //$shipment_temp->users()->attach($user);


    }
}
