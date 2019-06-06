<?php

namespace App\Http\Controllers\User;

use App\ShipmentTemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Shipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\ShipmentStoreRequest;


class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();

        $pronadji = DB::table('shipment_temp_user')->where('user_id', $id)->pluck('shipment_temp_id');
        $posiljke = ShipmentTemp::whereIn('id', $pronadji)->get();



        if($posiljke->isEmpty()){
            $prazno = 1;
            return view('user.shipments.index')->with(['shipments'=>$posiljke, 'prazno' => $prazno]);

        }else{
            $prazno = 0;
            return view('user.shipments.index')->with(['shipments'=>$posiljke, 'prazno' => $prazno]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipmentStoreRequest $request)
    {
        $shipment = new Shipment;
        $shipmentTemp = new ShipmentTemp;
        $random = random_int(000000000000,999999999999);
        $user = Auth::id();

        $shipment->shipment_number = $random;
        $shipment->status = 0;
        $shipment->method_payment =1; //$request->method_payment;
        $shipment->mass = $request->mass;
        $shipment->category = $request->category;
        $shipment->who_pay = $request->who_pay;
        $shipment->name = $request->name;
        $shipment->surname = $request->surname;
        $shipment->address = $request->address;
        $shipment->email =$request->email;
        $shipment->city = $request->city;
        $shipment->number = $request->number;
        $shipment->type = $request->type;
        $shipment->shipment_price=$request->shipment_price;



        $nesto = $request->mass;

        switch($nesto){
            case 0.5:
                $shipment->transport_price = "270 dinara";
                $shipmentTemp->transport_price = "270 dinara";
                break;
            case 1:
                $shipment->transport_price = "320 dinara";
                $shipmentTemp->transport_price = "320 dinara";
                break; 
            case 2:
                $shipment->transport_price = "390 dinara";
                $shipmentTemp->transport_price = "390 dinara";
                break; 
            case 5:
                $shipment->transport_price = "500 dinara";
                $shipmentTemp->transport_price = "500 dinara";
                break; 
            case 10:
                $shipment->transport_price = "650 dinara";
                $shipmentTemp->transport_price = "650 dinara";
                break; 
            case 15:
                $shipment->transport_price = "800 dinara";
                $shipmentTemp->transport_price = "800 dinara";
                break; 
            case 20:
                $shipment->transport_price = "920 dinara";
                $shipmentTemp->transport_price = "920 dinara";
                break; 
            case 30:
                $shipment->transport_price = "1100 dinara"; 
                $shipmentTemp->transport_price = "1100 dinara"; 
                break;
            case 50:
                $shipment->transport_price = "1500 dinara";
                $shipmentTemp->transport_price = "1500 dinara";
                break;  
            }
            

        
        $shipment->save();

        $shipmentTemp->shipment_number = $random;
        $shipmentTemp->status = 0;
        $shipmentTemp->method_payment =1; //$request->method_payment;
        $shipmentTemp->mass = $request->mass;
        $shipmentTemp->category = $request->category;
        $shipmentTemp->who_pay = $request->who_pay;
        $shipmentTemp->name = $request->name;
        $shipmentTemp->surname = $request->surname;
        $shipmentTemp->address = $request->address;
        $shipmentTemp->email =$request->email;
        $shipmentTemp->city = $request->city;
        $shipmentTemp->number = $request->number;
        $shipmentTemp->type = $request->type;
        $shipmentTemp->shipment_price=$request->shipment_price;
        $shipmentTemp->save();

        $shipment->users()->attach($user);
        
        $shipmentTemp->users()->attach($user);

        return redirect('user/shipments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
