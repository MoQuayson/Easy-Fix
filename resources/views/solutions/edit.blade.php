@extends('layouts.solution')
@section('title')
Easy Fix - Add Solution
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-0">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('solutions.index')}}">Solutions</a></li>
            <li class="breadcrumb-item active" aria-current="page">New solution</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow mb-3">
            <div class="card-header bg-white border-bottom-0 p-0">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="solutionTab" data-bs-toggle="tab" data-bs-target="#solutionForm"
                        type="button" role="tab" aria-controls="issueInfo" aria-selected="false">Solution Form</button>

                        <button class="nav-link" id="userInfoTab" data-bs-toggle="tab" data-bs-target="#userInfo" type="button"
                        role="tab" aria-controls="nav-home" aria-selected="true">User & Issue Information</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="solutionForm" role="tabpanel" aria-labelledby="solutionTab" tabindex="0">
                        <form action="{{route('solution.put',['issue_id'=>$issue_id,'solution_id'=>$solution_id])}}" method="POST" enctype="multipart/form-data">
                            <div class="container p-3">
                                {{method_field('PUT')}}
                                @csrf
                                <div class="col-md mb-3">
                                    <label class="form-label">Issue ID <span>*</span></label>
                                    <input type="text" class="form-control text-muted" id="issue_id" name="issue_id" value="{{ $issue_id}}" readonly>
                                    <span class="text-danger">@error('issue_id'){{ $message }}@enderror</span>
                                </div>

                                <div class="col-md mb-3">
                                    <label class="form-label">Description <span>*</span></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="add solution here">{{ $solution->description}}</textarea>
                                    <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                                </div>

                                @if (is_null($solution->completion_date))
                                <div class="col mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="true" name="completion_status">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Set as completed
                                        </label>
                                    </div>
                                </div>
                                @else
                                <div class="col mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" value="true" name="completion_status" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Set as completed
                                        </label>
                                    </div>
                                </div>
                                @endif
                                <hr>
                                <div class="col mb-4 float-end">
                                    <button type="submit" class="btn submit-btn shadow">Save Changes</button>
                                    <a class="btn btn-danger shadow" href="{{route('solutions.index')}}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!--User & Issue Information-->
                    <div class="tab-pane fade show" id="userInfo" role="tabpanel" aria-labelledby="userInfoTab" tabindex="0">
                        <div class="container p-3">
                            <h4>User Information</h4>
                            <table class="show-table">
                                <tr >
                                    <td>
                                        <label class="form-label">Full Name</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-muted mb-3" value="{{ $user->name}}" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td >
                                        <label class="form-label">Email</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-muted mb-3" value="{{ $user->email}}" readonly>
                                    </td>
                                </tr>

                                <tr >
                                    <td>
                                        <label class="form-label">Telephone</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-muted mb-3" value="{{ $user->telephone}}" readonly>
                                    </td>
                                </tr>
                            </table>

                            <hr>

                            <h4>Issue Information</h4>
                            <table class="show-table">
                                <tr >
                                    <td>
                                        <label class="form-label">Gadget Name</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-muted mb-3" value="{{ $issue->gadget_name}}" readonly>
                                    </td>
                                </tr>

                                <tr >
                                    <td >
                                        <label class="form-label">Gadget Type</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-muted mb-3" value="{{ $issue->gadget_type}}" readonly>
                                    </td>
                                </tr>

                                <tr >
                                    <td>
                                        <label class="form-label">Description</label>
                                    </td>
                                    <td>
                                        <textarea class="form-control text-muted mb-3" rows="2" readonly>{{$issue->description}}</textarea>
                                    </td>
                                </tr>

                                <tr >
                                    <td>
                                        <label class="form-label">Location</label>
                                    </td>
                                    <td>
                                        @if (is_null($issue->location))
                                        <input type="text" class="form-control text-muted mb-3" value="N/A" readonly>
                                        @else
                                        <input type="text" class="form-control text-muted mb-3" value="{{$issue->location}}" readonly>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


