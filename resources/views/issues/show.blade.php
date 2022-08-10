@extends('layouts.issue')
@section('title')
Easy Fix - Issue Information
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-0">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('issues.index')}}">Gadget Issues</a></li>
            <li class="breadcrumb-item active" aria-current="page">Issue Information</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-white border-bottom-0 p-0">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="userInfoTab" data-bs-toggle="tab" data-bs-target="#userInfo" type="button" role="tab" aria-controls="nav-home" aria-selected="true">User Information</button>
                  <button class="nav-link" id="issueInfoTab" data-bs-toggle="tab" data-bs-target="#issueInfo" type="button" role="tab" aria-controls="issueInfo" aria-selected="false">Issue Information</button>
                </div>
            </nav>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <!--User Information-->
            <div class="tab-pane fade show active" id="userInfo" role="tabpanel" aria-labelledby="userInfoTab" tabindex="0">
                <div class="container p-3">
                    <table class="show-table">
                        <tr >
                            <td>
                                <label class="form-label">Full Name</label>
                            </td>
                            <td>
                                <input type="text" class="form-control text-muted mb-3" value="{{ $user->name}}" readonly>
                            </td>
                        </tr>

                        <tr >
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
                </div>
            </div>
            <div class="tab-pane fade" id="issueInfo" role="tabpanel" aria-labelledby="issueInfoTab" tabindex="0">
                <div class="container p-3">
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

        <div class="card-footer bg-white border-top-0">
            <div class="col mb-1 float-end">
                <a class="btn btn-danger shadow" href="{{route('issues.index')}}">Close</a>
            </div>
        </div>
    </div>

</div>
@endsection
