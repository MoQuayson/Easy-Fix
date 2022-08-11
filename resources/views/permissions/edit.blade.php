@extends('layouts.permission')
@section('title')
Easy Fix - New Permission
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-2">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Permissions</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Permission</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h6>Edit Permission Form</h5>
        </div>
        <div class="card-body">
            <form action="{{route('permissions.update',['permission'=>$permission->id])}}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="container">

                    <div class="col mb-3">
                        <label class="form-label">Name <span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>

                    <hr>
                    <div class="col mb-1 float-end">
                        <button type="submit" class="btn submit-btn">Save Changes</button>
                        <a class="btn btn-danger" href="{{route('permissions.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


