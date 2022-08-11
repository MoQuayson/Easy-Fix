@extends('layouts.role')
@section('title')
Easy Fix - Edit Role
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-2">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
        </ol>
    </div>
</nav>
@endsection


@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h6 class="d-flex assign-middle">Role Form</h6>
        </div>
        <div class="card-body">
            <form action="{{route('roles.update',['role'=>$role->id])}}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="container">

                    <div class="col mb-2">
                        <label class="form-label h5">Role Name <span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}" placeholder="ex. user">
                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                    </div>

                    <hr>
                    <div class="col mt-3 mb-3">
                        <label class="form-label h5">Permissions <span>*</span></label>
                        <div class="row row-cols-md-4 ms-0">
                            <?php $status = '';?>
                        @foreach ($permission as $item)
                        @if (in_array($item->id, $rolePermissions))
                            <?php $status = 'checked';?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$item->name}}" id="permission[]" name="permission[]" {{$status}}>
                                <label class="form-check-label">{{$item->name}}</label>
                            </div>
                        @else
                        <?php $status = '';?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$item->name}}" id="permission[]" name="permission[]" {{$status}}>
                            <label class="form-check-label">{{$item->name}}</label>
                        </div>
                        @endif

                        @endforeach
                        </div>

                        <span class="text-danger">@error('permission'){{$message}}@enderror</span>
                    </div>

                    <hr>
                    <div class="col mb-1 float-end">
                        <button type="submit" class="btn submit-btn">Save Changes</button>
                        <a class="btn btn-danger" href="{{route('roles.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


