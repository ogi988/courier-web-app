<?php

namespace App\Http\Controllers\Worker;

use App\Shipment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;







class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('worker.index')->with('shipments',Shipment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shipment $shipment)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $shipment = Shipment::find($id);
        // $user->shipments()->sync($request->shipments);

        dd($request);
        // $shipment = new Shipment;
        
        // $shipment_number = $request->shipment_number;
        // $status = 1;
        // $method_payment = $request->method_payment;
        // $mass = $request->mass;
        // $category = $request->category;
        // $who_pay = $request->who_pay;
        // $name = $request->name;
        // $surname = $request->surname;
        // $address = $request->address;
        // $email = $request->email;
        // $city = $request->city;
        // $number = $request->number;
        // $shipment_price = $request->shipment_price;
        // $transport_price = $request->transport_price;
        // $type = $request->type;

        // $shipment->shipment_number = $shipment_number;
        // $shipment->status = $status;
        // $shipment->method_payment = $method_payment;
        // $shipment->mass = $mass;
        // $shipment->category = $category;
        // $shipment->who_pay = $who_pay;
        // $shipment->name = $name;
        // $shipment->address = $address;
        // $shipment->email = $email;
        // $shipment->city = $city;
        // $shipment->number = $number;
        // $shipment->shipment_price = $shipment_price;
        // $shipment->transport_price = $transport_price;
        // $shipment->type = $type;

        // $shipment->save();
        // dd($shipment);


        // return view('worker.index')->with('shipments',Shipment::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        $shipment->status = 1;
        dd($shipment->status);
        $shipment->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        
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
