@extends('layouts.permission')
@section('title')
Easy Fix - New Permission
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-2">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permission Information</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">
    <div class="card shadow mb-3">
        <div class="card-header bg-white">
            <h6>Permission Information </h6>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="col mb-3">
                    <label class="form-label">Name</label>
                 <input type="text" class="form-control" value="{{$permission->name}}" readonly>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
