@extends('layouts.role')
@section('title')
Easy Fix - New Role
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-2">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Role Information</li>
        </ol>
    </div>
</nav>
@endsection


@section('content')
<div class="container">
    <div class="card shadow mb-3">
        <div class="card-header bg-white">
            <h6>Role Information </h6>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="col mb-2">
                    <label class="form-label h5">Role Name <span>*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}" readonly>
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>

                <hr>
                <div class="col mt-3 mb-3">
                    <label class="form-label h5">Permissions <span>*</span></label>
                    <div>
                        @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $permission)
                            <span class="fs-6 badge bg-primary shadow-sm mb-2 me-1">{{ $permission->name }}</span>
                        @endforeach
                        @endif
                    </div>

                    <span class="text-danger">@error('permission'){{$message}}@enderror</span>
                </div>
            </div>
        </div>

        <div class="card-footer bg-white border-top-0">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{route('roles.index')}}" class="btn btn-danger shadow-sm">Close</a>
            </div>
        </div>
    </div>
</div>

@endsection
