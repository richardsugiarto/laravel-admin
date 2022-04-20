<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;

class LoginController extends Controller
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
        //$users = User::orderBy('created_at', 'asc')->where('email','=',$request->email)->where('password','=',$request->password)->get();
        
            $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            ]);
            if($validator->fails())
            {
                return redirect("/login")->withErrors($validator);
            }
            else
            {
                $userdata = array(
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'is_active'=>1
                );
                
                //echo $request->email." ".$request->password;
                if(Auth::attempt($userdata))
                {
                    /*$user = User::select('is_active')->where('email','=',$request->email)->get()->first();
                    if($user->is_active==0)
                    {
                        return redirect("/login")->with('failed','Your account is not activated.'); 
                    }*/
                    //echo "match";
                    return redirect("/");
                }else{
                    //echo "not match";
                    return redirect("/login")->with('failed','You have not registered or your password is wrong.');
                }
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
