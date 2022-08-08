@extends('layouts.Permission')
@section('title')
Update Permission | Permissions | User Management | Montran Management
@endsection

@section('breadcrumbs')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Permission</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-navy text-white">
            <h5 class="d-flex assign-middle">Edit Permission Form</h5>
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
                        <button type="submit" class="btn submitBtn">Save Changes</button>
                        <a class="btn btn-danger" href="{{route('permissions.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


