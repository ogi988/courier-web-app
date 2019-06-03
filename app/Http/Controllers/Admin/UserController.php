<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Shipment;
use App\AdminSettings;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $settings = AdminSettings::find(1);

        $godinaSettings = $settings->prikaziGodine;
        $mesecSettings = $settings->prikaziMesece;
      
        $danas = Carbon::today()->toDateTimeString();
        $sutra = Carbon::tomorrow()->toDateTimeString();
        $juce = Carbon::yesterday()->toDateTimeString();
        $mesec = Carbon::today()->subDays(30)->toDateTimeString();
        $nova_godina = new Carbon ('first day of January 2019');
        
        $period = CarbonPeriod::create($mesec, $sutra); 
        $period_godina = CarbonPeriod::create($nova_godina,'1 month', $sutra);

        $shipment = DB::table('shipments')
            ->where('status', 0)
            ->whereBetween('created_at', [$mesec, $sutra])
            ->get();

        $dani = [];
        $broj_posiljaka = [];

        $meseci = [];
        $broj_posiljaka_mesec = [];
        
        foreach($period as $p){
            $dani[] = $p->format('M-d-Y');
            DB::enableQueryLog();
            $broj_posiljaka[] = DB::table('shipments')
                ->where('status', 0)
                ->whereDay('created_at', $p->day)
                ->count();
        }
        
        foreach($period_godina as $pg){
            $meseci[] = $pg->format('M-Y');
            $broj_posiljaka_mesec[] = DB::table('shipments')
            ->where('status', 0)
            ->whereMonth('created_at', $pg->month)
            ->count();
        }
        
        



        return view('admin.users.index')->with(['users'=>User::all(),
                                                'dani'=>$dani, 'broj_posiljaka'=>$broj_posiljaka, 'meseci'=>$meseci, 
                                                'broj_posiljaka_mesec'=>$broj_posiljaka_mesec,
                                                'godinaSettings'=>$godinaSettings,
                                                'mesecSettings'=>$mesecSettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User;
        $userRole = $request->izbor;

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        $user->roles()->attach($userRole);

        return redirect('admin/users');
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
        /*if(Auth::user()->id = $id){
            return redirect()->route('admin.users.index');
        }*/

        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
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
        $user = User::find($id);
        $user->roles()->sync($request->roles);

        $name = $request->name;
        $surname = $request->surname;
        $city = $request->city;
        $address = $request->address;
        $number = $request->number;
        $email = $request->email;
        $user->name=$name;
        $user->surname=$surname;
        $user->city=$city;
        $user->address=$address;
        $user->number=$number;
        $user->email=$email;
        $user->save();

        return view('admin.users.index')->with('users',User::all());



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('role_user')->where('user_id',$id)->delete();
        return redirect()->route('admin.users.index')->with('success','Korisnik je obrisan');
    }

}
