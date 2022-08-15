<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueRequest;
use App\Models\Issue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-issue|create-issue|update-issue|delete-issue', ['only' => ['index','store']]);
        $this->middleware('permission:create-issue', ['only' => ['create','store']]);
        $this->middleware('permission:update-issue', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-issue', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issues.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IssueRequest $request)
    {
        $user = Auth::user();
        $issue = $user->Issues()->create([
            'gadget_name'=>$request->gadget_name,
            'gadget_type'=>$request->gadget_type,
            'description'=>$request->description,
            'location'=>$request->location,
            'issue_assigned_to'=>null,
        ]);

        if($issue)
        {
            return redirect()->route('issues.index')->with('success', 'Your issue has been sent.
            A technician will respond to you shortly.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::where('id',$id)->first();
        $user = User::where('id',$issue->user_id)->first();

        return view('issues.show',compact('issue','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = Issue::where('id',$id)->first();
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IssueRequest $request, $id)
    {
        if(Issue::where('id',$id)->exists())
        {
            $issue = Issue::where('id',$id)->update([
                'gadget_name'=>$request->gadget_name,
                'gadget_type'=>$request->gadget_type,
                'description'=>$request->description,
                'location'=>$request->location,

            ]);

            if($issue)
            {
                return redirect()->route('issues.index')->with('success', 'Issue has been updated.');
            }
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
        $issue = Issue::where('id',$id)->delete();
        session()->flash('success', 'Issue has been deleted.');
        return response()->json('success');
    }
}
