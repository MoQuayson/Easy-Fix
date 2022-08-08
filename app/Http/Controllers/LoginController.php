<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), !is_null($request->input('remember_me')))) {

            $user = User::where('email', $request->email)->first();
            //$user->createToken('api')->plainTextToken;


            /*if ($this->userHasPermissionCheck('view-dashboard', $user))
            {
                return redirect(route('dashboard.index'));
            }
            else{
                return redirect(route('incident.index'));
            }*/

            //return $user;
            return redirect(route('users.index'));
        }
        return back()->with('fail', 'Incorrect Credentials. Try Again')->withInput();
    }

    public function getToken(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), !is_null($request->input('remember_me')))) {

            $user = User::where('email', $request->email)->first();
            return $user->createToken('mon-tran api')->plainTextToken;
        }
        return 'Incorrect Credentials. Try Again';
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
