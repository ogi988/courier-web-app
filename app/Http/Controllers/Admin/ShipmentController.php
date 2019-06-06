<?php

namespace App\Http\Controllers\Admin;

use App\Shipment;
use App\ShipmentTemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ShipmentController extends Controller
{
    public function index()
    {
        $new_shipments = ShipmentTemp::where('status', 0)->get();
        $shipments = Shipment::where('status',4)->get();
        return view('admin.shipments.index')->with(['shipments'=>$shipments, 'new_shipments'=>$new_shipments]);

    }

    public function edit($id)
    {   
        $shipment_edit = ShipmentTemp::find($id);
        return view('admin.shipments.edit')->with('shipment_edit', $shipment_edit);

    }

    public function update(Request $request, $id)
    {
        $shipment_temp = ShipmentTemp::find($id);

        $shipment = Shipment::where('shipment_number', $shipment_temp->shipment_number)->first();

        $shipment_temp->method_payment = 1; 
        $shipment_temp->mass = $request->mass;
        $shipment_temp->category = $request->category;
        $shipment_temp->who_pay = $request->who_pay;
        $shipment_temp->name = $request->name;
        $shipment_temp->surname = $request->surname;
        $shipment_temp->address = $request->address;
        $shipment_temp->email =$request->email;
        $shipment_temp->city = $request->city;
        $shipment_temp->number = $request->number;
        $shipment_temp->shipment_price = $request->shipment_price;
        $shipment_temp->transport_price = $request->transport_price;
        $shipment_temp->type = $request->type;
        $shipment_temp->shipment_price = $request->shipment_price;
        $shipment_temp->transport_price = 300;
        $shipment_temp->save();

        
        $shipment->method_payment = 1; 
        $shipment->mass = $request->mass;
        $shipment->category = $request->category;
        $shipment->who_pay = $request->who_pay;
        $shipment->name = $request->name;
        $shipment->surname = $request->surname;
        $shipment->address = $request->address;
        $shipment->email =$request->email;
        $shipment->city = $request->city;
        $shipment->number = $request->number;
        $shipment->shipment_price = $request->shipment_price;
        $shipment->transport_price = $request->transport_price;
        $shipment->type = $request->type;
        $shipment->shipment_price = $request->shipment_price;
        $shipment->transport_price = 300;

        $shipment->save();


        return redirect('admin/shipments');
    }
}
