<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
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
