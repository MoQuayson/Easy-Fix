@extends('layouts.user')
@section('title')
Easy Fix - User Information
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-0">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Information</li>
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
        </div>

        <div class="card-footer bg-white border-top-0">
            <div class="col mb-1 float-end">
                <a class="btn btn-danger shadow" href="{{route('users.index')}}">Close</a>
            </div>
        </div>
    </div>

</div>
@endsection
