<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if user is an admin or technician or customer

        if($this->checkPermission())
        {
            $issues = Issue::join('users','users.id','=','issues.user_id')
            ->select('issues.id as issue_id','users.id as user_id','users.name','email','telephone','gadget_name',
            'gadget_type','description','location')
            ->get();


            //$issues = $this->addUserPermission($issues);
            $data = [
                'issues'=>$issues,
                'can_provide_solution'=>$this->checkPermission(),
            ];
            return response()->json($data);
        }

        else{
            $issues = Issue::join('users','users.id','=','issues.user_id')
            ->where('users.id',Auth::user()->id)
            ->select('issues.id as issue_id','users.id as user_id','users.name','email','telephone','gadget_name',
            'gadget_type','description','location')
            ->get();


            //$issues = $this->addUserPermission($issues);
            $data = [
                'issues'=>$issues,
                'can_provide_solution'=>$this->checkPermission(),
            ];
            return response()->json($data);
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

    public function checkPermission()
    {
        $user = Auth::user();
        $user = User::where('id',$user->id)->first();
        $has_permission = $user->hasAnyPermission(['create-solution', 'update-solution', 'delete-solution']);

        return $has_permission;
    }

    public function addUserPermission($issues)
    {
        if(count($issues) < 0)
        {
            return $issues;
        }

        else{
            foreach($issues as $issue)
            {
                $user = User::where('id',$issue->user_id)->first();

                $has_permission = $user->hasAnyPermission(['create-solution', 'update-solution', 'delete-solution']);

                if($has_permission)
                {
                    $arr = array('can_provide_solution'=>true);
                    //array_push($issue,$arr);
                    $issue['can_provide_solution'] = true;
                }
                else{
                    $arr = array('can_provide_solution'=>false);
                    //array_push($issue,$arr);
                    $issue['can_provide_solution'] = false;
                }

            }

            return $issues;
        }
    }
}
