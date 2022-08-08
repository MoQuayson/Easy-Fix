@extends('layouts.role')
@section('title')
Role Information | Roles | User Management | Montran Management
@endsection

@section('breadcrumbs')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
         <li class="breadcrumb-item active" aria-current="page">Role Information</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow mb-3">
        <div class="card-header bg-navy text-white">
            <h5>Role Information </h5>
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
            <div class="d-flex justify-content-center mb-2">
                <button class="btn btn-primary me-2 fw-bold shadow-sm"><i class="bi bi-printer-fill me-2"></i>Print</button>
                <a href="{{route('roles.index')}}" class="btn btn-warning text-dark fw-bold shadow-sm">Cancel</a>
            </div>
        </div>
    </div>
</div>

@endsection
