<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-user|create-user|update-user|delete-user', ['only' => ['index','store']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:update-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'telephone'=>$request->telephone,
            'password'=>'password'
        ]);

        if($user)
        {
            $user = User::where('email',$request->email)->first();
            $user->assignRole([$request->input('role')]);
        }


        return redirect()->route('users.index')->with('success', 'New user created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get roles
        $roles = Role::all();

        //get user data
        $user  = User::where('id',$id)->first();
        $current_role = $user->getRoleNames()[0];
        //return $current_role;
        return view('users.edit',compact('roles','user','current_role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if(User::where('id',$id)->exists())
        {
            $user = User::where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'telephone'=>$request->email,
            ]);

            $user = User::where('id',$id)->first();
            $user->assignRole([$request->input('role')]);

            return redirect()->route('users.index')->with('success', 'User infromation updated');
        }
        else{
            throw new Exception('User does not exist!. Contact Admin');
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
