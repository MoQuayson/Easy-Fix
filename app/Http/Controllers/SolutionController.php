<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolutionRequest;
use App\Models\Issue;
use App\Models\Solution;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list-solution|create-solution|update-solution|delete-solution', ['only' => ['index','store']]);
        $this->middleware('permission:create-solution', ['only' => ['create','store']]);
        $this->middleware('permission:update-solution', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-solution', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issue_id = '1111111111';
        return view('solutions.index',compact('issue_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionRequest $request)
    {
        ///if($req)
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
        try {
            Solution::where('id', $id)->delete();
            session()->flash('success', 'Solution has been deleted.');
            return response()->json('success');

        } catch (Exception $ex) {
            session()->flash('fail', $ex->getMessage());
            return response()->json('error');
        }
    }

    public function createSolution($issue_id)
    {
        $issue = Issue::where('id',$issue_id)->first();
        $user = User::where('id',$issue->user_id)->first();
        return view('solutions.create',compact('issue','user','issue_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSolution(SolutionRequest $request,$issue_id)
    {
        if(Issue::where('id',$issue_id)->exists())
        {
            $issue = Issue::where('id',$issue_id)->first();

            //check if solution was set as completed or not
            if(is_null($request->completion_status))
            {
                $issue->Solution()->create([
                    'description'=>$request->description,
                ]);

                return redirect()->route('solutions.index')->with('success', 'Solution has been added.');
            }
            else{
                $issue->Solution()->create([
                    'description'=>$request->description,
                    'completion_date'=>now()->toDateTimeString(),
                ]);

                return redirect()->route('solutions.index')->with('success', 'Solution has been added and completed.');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSolution($issue_id,$solution_id)
    {
        $issue = Issue::where('id',$issue_id)->first();
        $issue = $issue->load('Solution');
        return view('solutions.show',compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSolution($issue_id,$solution_id)
    {
        $issue = Issue::where('id',$issue_id)->first();
        $user = User::where('id',$issue->user_id)->first();
        $solution = Solution::where('id',$solution_id)->first();
        return view('solutions.edit',compact('issue','user','issue_id','solution_id','solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSolution(SolutionRequest $request, $issue_id, $solution_id)
    {
        if(Solution::where('id',$solution_id)->where('issue_id',$issue_id)->exists())
        {
            $solution = Issue::where('id',$solution_id)->first();

            //check if solution was set as completed or not
            if(is_null($request->completion_status))
            {
                $solution = Solution::where('id',$solution_id)->update([
                    'description'=>$request->description,
                ]);
            }
            else{
                $solution = Solution::where('id',$solution_id)->update([
                    'description'=>$request->description,
                    'completion_date'=>now()->toDateTimeString(),
                ]);

            }

            return redirect()->route('solutions.index')->with('success', 'Solution has been updated');

        }
    }
}
