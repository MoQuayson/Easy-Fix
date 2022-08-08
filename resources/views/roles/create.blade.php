@extends('layouts.role')
@section('title')
Create New Role | Roles | User Management | Montran Management
@endsection

@section('breadcrumbs')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
         <li class="breadcrumb-item active" aria-current="page">New Role</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-navy text-white">
            <h5 class="d-flex assign-middle form-title">New Role Form</h5>
        </div>
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">

                    <div class="col mb-2">
                        <label class="form-label h5">Role Name <span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="ex. user">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>
    
                    <hr>
                    <div class="col mt-3 mb-3">
                        <label class="form-label h5">Permissions <span>*</span></label>
                        <div class="row row-cols-md-4 ms-0">
                            @foreach ($permission as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$item->name}}" id="permission[]" name="permission[]">
                                <label class="form-check-label">{{$item->name}}</label>
                            </div>
                            @endforeach
                        </div>
    
                        <span class="text-danger">@error('permission'){{$message}}@enderror</span>
                    </div>

                    <hr>
                    <div class="col mb-1 float-end">
                        <button type="submit" class="btn submitBtn">Save Role</button>
                        <a class="btn btn-danger" href="{{route('roles.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
