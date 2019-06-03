<?php

namespace App\Http\Controllers\Admin;


use App\AdminSettings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostavkeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        return view('admin.postavke')->with('adminsettings',AdminSettings::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $godina = $request->godina;
        $mesec = $request->mesec;

        $postavke = AdminSettings::find(1);

        if($godina){
            $postavke->prikaziGodine = 1;
        } else{
            $postavke->prikaziGodine = 0;

        }
        if($mesec){
            $postavke->prikaziMesece = 1;            
        }else{
            $postavke->prikaziMesece = 0;

        }

        $postavke->save();
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
