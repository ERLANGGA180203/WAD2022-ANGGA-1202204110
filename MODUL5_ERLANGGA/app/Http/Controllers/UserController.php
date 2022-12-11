<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function login()
    {
        $data = user::where('email', request()->email)->firstOrFail();
        if ($data->email == request()->email){
            $credentials = request()->validate([
                'email' => ['required','email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials)){
                request()->session()->regenerate();
                // session(['login' => true]);
                session(['bgcolor' => "#0d6efd"]);
                return redirect()->intended('/');
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
        if (user::where('email',$request->email)->exists()){
            return redirect('/register');
        }else{
            if ($request->pass == $request->pass_con){
                user::create([
                    'name' => $request ->nama,
                    'email' => $request ->email,
                    'password' => Hash::make($request->pass),
                    'no_hp' => $request ->no_hp
                ]);
                return redirect('/');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('ERLANGGA_PROFILE');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        if ($request->pass == $request->pass_con){
            user::find($id)->update([
                'name'=>$request->name,
                'no_hp'=>$request->no_hp,
            ]);
            session(['bgcolor'=>$request->bgcolor]);

            return redirect('/');
        }
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
