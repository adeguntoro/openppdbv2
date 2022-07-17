<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function callback()
    {
        //
       
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('sub', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return 'login balik mang';
            }else{
                $newUser = User::create([
                    'password'  => Hash::make('1234'),
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'picture'   => $user->avatar,
                    'sub'       => $user->id,
                    'email_verified_at' => now(),
                ]);
                Auth::login($newUser);
                return redirect()->intended('/home');
           }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function index()
    {
        //
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
        //
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
