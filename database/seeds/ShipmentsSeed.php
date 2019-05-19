<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Shipment;
class ShipmentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipment::truncate();
        $user = User::where('id', '13')->first();
        $shipment = Shipment::create([
            'shipment_number' => 'saf24adfsd',
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
        $shipment->users()->attach($user);

    }
}
