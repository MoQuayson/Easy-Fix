@extends('layouts.permission')
@section('title')
Permission Information | Permissions | Users Management | Montran Management
@endsection

@section('breadcrumbs')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissions</a></li>
        <li class="breadcrumb-item active" aria-current="page">Permission Information</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow mb-3">
        <div class="card-header bg-navy text-white">
            <h5>Permission Information </h5>
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
