<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Shipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.shipments.index')->with('shipments',Shipment::all());
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
    public function store(Request $request)
    {
        $shipment = new Shipment;

        $user = User::find(Auth::id())->first();

        $shipment->shipment_number = Str::random(8);
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
        $shipment->shipment_price = $request->shipment_price;
        $shipment->transport_price = $request->transport_price;
        $shipment->type = $request->type;
        //$shipment->shipment_price = $request->shipment_price;
        $shipment->transport_price = 300;
        $shipment->save();

        $shipment->users()->attach($user);

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
