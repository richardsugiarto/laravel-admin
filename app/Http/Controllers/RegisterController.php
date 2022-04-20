<?php

namespace App\Http\Controllers;

use App\User;
use App\users_activation;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Mail;

class RegisterController extends Controller
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
        $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'required|min:6',
        'cpassword' => 'required|same:password',
        ],
        ['cpassword.required'=>'required',
        'cpassword.min'=>'the confirm password must be at least 6 characters',
        'cpassword.same'=>'the confirm password and password must be the same'
        ]);
        if($validator->fails())
        {
            return redirect('/register')->withErrors($validator);
        }
        else
        {
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ])->toArray();

            $user['link']=str_random(30);
            $activation = new users_activation;
            $activation->id_users = $user['id'];
            $activation->token = $user['link'];
            $activation->save();

            Mail::send('mail.activation',$user,function($message) use ($user){
                $message->to($user['email']);
                $message->subject('GoArticle - Activation Code');
            });
            
         
            return redirect('/login')->with('success','We sent email verification. Please check your mail.');
        }
        
    }

    public function userActivation($token)
    {
        $check = users_activation::where('token','=',$token)->first();
        if(!is_null($check))
        {
            $user = User::find($check->id_users);
            if($user->is_active==1)
            {
                return redirect('/login')->with('success','Your account already activated');
            }
            User::where('id','=',$check->id_users)->update(['is_active'=>1]);
            users_activation::where('token','=',$token)->delete();
            return redirect('/login')->with('success','Your account has been activated');
        }
        return redirect('/login')->with('failed','Your token is invalid');
        
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
