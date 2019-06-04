<?php

namespace App\Http\Controllers\Worker;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Vehicle;
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
        $posiljkeUMagacinu = ShipmentTemp::where('status', 1)->get();
        $more = DB::table('shipment_temp_user')->where('user_id', $id)->pluck('shipment_temp_id');
        if($more->isEmpty()){
            
            return view('worker.index')->with(['shipments' => $sve, 'mojeposiljke' => $more, 'posiljkeUMagacinu'=>$posiljkeUMagacinu]);            
            
        } else{            
            $moremore = ShipmentTemp::whereIn('id', $more)->where('status','>', 1)->get();            
            return view('worker.index')->with(['shipments' => $sve, 'mojeposiljke' => $moremore, 'posiljkeUMagacinu'=>$posiljkeUMagacinu]);
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
        
        $vozilo = Vehicle::where('user_id', $userid)->get();
        if($vozilo->isNotEmpty()){

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
        } else{
            return redirect('worker/shipments')->with('message', 'Prvo zaduzite vozilo!');
            
        }
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
    public function magacin(Request $request)
    {
        $userid = Auth::id();
        $user = User::where('id', $userid)->first();

        $id = $request->idmagacin;
        $s = Shipment::find($id);
        $shipment_temp = ShipmentTemp::find($id);

        $vozilo = Vehicle::where('user_id', $userid)->get();
        if($vozilo->isNotEmpty()){
            
            $shipment = new Shipment;
            $shipment->shipment_number = $s->shipment_number;
            $shipment->status = 2;
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
    
            $shipment->save();
            $shipment->users()->attach($user);
    
            $shipment_temp->status = 2;
            $shipment_temp->save();
            $shipment_temp->users()->attach($user); 
    
    
            return redirect('worker/shipments');
        } else{
            return redirect('worker/shipments')->with('message', 'Prvo zaduzite vozilo!');
        }



    }

    public function krajnje(Request $request)
    {

        $userid = Auth::id();
        $user = User::where('id', $userid)->first();

        $id_krajnji = $request->idmoja;
        $s_krajnji = Shipment::find($id_krajnji);
        $shipment_temp_krajnji = ShipmentTemp::find($id_krajnji);


        $vozilo = Vehicle::where('user_id', $userid)->get();
        if($vozilo->isNotEmpty()){

            if ($request->has('isporuceno')) {            
                
                $shipment = new Shipment;
                $shipment->shipment_number = $s_krajnji->shipment_number;
                $shipment->status = 4;
                $shipment->method_payment = $s_krajnji->method_payment;
                $shipment->mass = $s_krajnji->mass;
                $shipment->category = $s_krajnji->category;
                $shipment->who_pay = $s_krajnji->who_pay;
                $shipment->name = $s_krajnji->name;
                $shipment->surname = $s_krajnji->surname;
                $shipment->address = $s_krajnji->address;
                $shipment->email = $s_krajnji->email;
                $shipment->city = $s_krajnji->city;
                $shipment->number = $s_krajnji->number;
                $shipment->shipment_price = $s_krajnji->shipment_price;
                $shipment->transport_price = $s_krajnji->transport_price;
                $shipment->type = $s_krajnji->type;
    
                $shipment->save();
                $shipment->users()->attach($user);
    
                $shipment_temp_krajnji->status = 4;
                $shipment_temp_krajnji->save();
                $shipment_temp_krajnji->users()->attach($user);
             }
            if ($request->has('odbijeno')) {
                
                $shipment = new Shipment;
                $shipment->shipment_number = $s_krajnji->shipment_number;
                $shipment->status = 1;
                $shipment->method_payment = $s_krajnji->method_payment;
                $shipment->mass = $s_krajnji->mass;
                $shipment->category = $s_krajnji->category;
                $shipment->who_pay = $s_krajnji->who_pay;
                $shipment->name = $s_krajnji->name;
                $shipment->surname = $s_krajnji->surname;
                $shipment->address = $s_krajnji->address;
                $shipment->email = $s_krajnji->email;
                $shipment->city = $s_krajnji->city;
                $shipment->number = $s_krajnji->number;
                $shipment->shipment_price = $s_krajnji->shipment_price;
                $shipment->transport_price = $s_krajnji->transport_price;
                $shipment->type = $s_krajnji->type;
    
                $shipment->save();
                $shipment->users()->attach($user);
    
                $shipment_temp_krajnji->status = 1;
                $shipment_temp_krajnji->save();
                $shipment_temp_krajnji->users()->attach($user);
             }
    
    
            return redirect('worker/shipments');
        } else{
            return redirect('worker/shipments')->with('message', 'Prvo zaduzite vozilo!');
        }


    }
    public function map()
    {
        return view('worker.map');
    }
    
}
