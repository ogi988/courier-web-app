<?php

namespace App\Http\Controllers\Worker;

use App\Vehicle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $vozila = Vehicle::whereNull('user_id')->get();
        $user_id = Auth::id();
        $moje_zaduzenje = Vehicle::where('user_id', $user_id)->get();

        
        if($moje_zaduzenje->isEmpty()){
            // echo 'ovo znaci da nisi izabrao vozilo';
            return view('worker.vehicles.index')->with(['my_vehicle'=>$moje_zaduzenje, 'vehicles'=>$vozila]); 


        }else{
            // echo 'ovo znaci da si izabrao vozilo';
            $poruka = 'Vase zaduzeno vozilo:';
            return view('worker.vehicles.index')->with(['poruka'=>$poruka, 'my_vehicle'=>$moje_zaduzenje, 'vehicles'=>$vozila]);

        }


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vozilo = Vehicle::where('id', $vehicle->id)->first();
        $user_id = Auth::id();

        $vozilo->user_id = $user_id; 
        $vozilo->save();

        // $moje_zaduzenje = Vehicle::where('user_id', $user_id)->get();


        return redirect('worker/vehicles'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }

    public function razduzi(Request $request)
    {
        $id = $request->idid;
        $moje_zaduzenje = Vehicle::where('id', $id)->first();
        
        $moje_zaduzenje->user_id = null;
        $moje_zaduzenje->save();

        return redirect('worker/vehicles'); 
    }
}
