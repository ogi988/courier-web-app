<?php

namespace App\Http\Controllers\Worker;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Shipment;
use App\ShipmentTemp;
use Illuminate\Support\Facades\Auth;
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
        


        $id = Auth::id();
        $sve = ShipmentTemp::where('status', 0)->get();
        $more = DB::table('shipment_temp_user')->where('user_id', $id)->pluck('shipment_temp_id');
        if($more->isEmpty()){
            
            return view('worker.index')->with(['shipments' => $sve, 'mojeposiljke' => $more]);            
            
        } else{            
            $moremore = ShipmentTemp::whereIn('id', $more)->get();            
            return view('worker.index')->with(['shipments' => $sve, 'mojeposiljke' => $moremore]);
        }

        
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

        //$id = $request->p;
        //$s = Shipment::find($id);
        //dd($s);
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

        //$shipment->save();



        //return view('worker.index')->with('shipments',Shipment::all());
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
        $id = $request->p;
        $s = Shipment::find($id);

        dd($s);
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
    public function zaduzi(Request $request)
    {
        $id = $request->idid;
        $s = Shipment::find($id);

        $userid = Auth::id();
        $user = User::where('id', $userid)->first();
        
        $shipment_temp = ShipmentTemp::find($id);

        $shipment = new Shipment;
        $shipment->shipment_number = $s->shipment_number;
        $shipment->status = 1;
        $shipment->method_payment = $s->method_payment;
        $shipment->mass = $s->mass;
        $shipment->category = $s->category;
        $shipment->who_pay = $s->who_pay;
        $shipment->name = $s->name;
        $shipment->surname = $s->surname;
        $shipment->address = $s->address;
        $shipment->email = $s->email;
        $shipment->city = $s->city;
        $shipment->number = $s->number;
        $shipment->shipment_price = $s->shipment_price;
        $shipment->transport_price = $s->transport_price;
        $shipment->type = $s->type;

        $shipment_temp->status = 1;
        $shipment_temp->save();

        $shipment->save();
        $shipment->users()->attach($user);
        $shipment_temp->users()->attach($user);
        return redirect('worker/shipments');
    }
    public function barcode()
    {
        return view('worker.barcode');
    }
    public function ajaxRequestPost(Request $request)

    {
        $userid = Auth::id();
        $user = User::where('id', $userid)->first();


        $input = $request->barcode;
        $shipment_temp = ShipmentTemp::where('shipment_number', $input)->first();

        if($shipment_temp !== null && (int)$shipment_temp->status<4 ){
            $message = 'Uspesno promenjen status paketa'.$input;
            $shipment = new Shipment;
            $shipment->shipment_number = $shipment_temp->shipment_number;
            $shipment->status =(int)$shipment_temp->status + 1;
            $shipment->method_payment = $shipment_temp->method_payment;
            $shipment->mass = $shipment_temp->mass;
            $shipment->category = $shipment_temp->category;
            $shipment->who_pay = $shipment_temp->who_pay;
            $shipment->name = $shipment_temp->name;
            $shipment->surname =$shipment_temp->surname;
            $shipment->address = $shipment_temp->address;
            $shipment->email = $shipment_temp->email;
            $shipment->city = $shipment_temp->city;
            $shipment->number = $shipment_temp->number;
            $shipment->shipment_price = $shipment_temp->shipment_price;
            $shipment->transport_price = $shipment_temp->transport_price;
            $shipment->type = $shipment_temp->type;

            $shipment_temp->status = (int)$shipment_temp->status + 1;
            $shipment_temp->save();

            $shipment->save();
            $shipment->users()->attach($user);
            $shipment_temp->users()->attach($user);

        }
        else{
            $message = 'Doslo je do greske pri skeniranju';
        }

        return response()->json(['success'=>$message]);



    }
    
}
