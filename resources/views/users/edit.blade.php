@extends('layouts.user')
@section('title')
Easy Fix - Edit User Information
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-0">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<form class="container" action="{{route('users.update',['user'=>$user->id])}}" method="POST" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h5>User Information</h5>
        </div>

        <div class="card-body">

                {{ method_field('PUT') }}
                @csrf

                <div class="row">
                    <input type="hidden" id="_role" value="{{$current_role}}">
                </div>
                <div class="">
                    <div class="col-md mb-3">
                        <label class="form-label">Full Name <span>*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name *" value="{{ $user->name}}">
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-3">
                        <label class="form-label">Email <span>*</span></label>
                        <input type="email" class="form-control " id="email" name="email" placeholder="Email Address * " value="{{ $user->email }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-3">
                        <label class="form-label">Telephone No. <span>*</span></label>
                        <input type="tel" class="form-control " id="telephone" name="telephone" placeholder="Telephone No. *" value="{{ $user->telephone }}">
                        <span class="text-danger">@error('telephone'){{ $message }}@enderror</span>
                    </div>

                    <div class="col-md mb-3">
                        <label class="form-label">Role <span>*</span></label>
                        <select class="form-select" id="role" name="role">
                            @if (count($roles) > 0)
                                @foreach ($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-danger">@error('role'){{ $message }}@enderror</span>
                    </div>
                </div>

        </div>

        <div class="card-footer bg-white border-top-0">
            <div class="col mb-1 float-end">
                <button type="submit" class="btn submit-btn">Save Changes</button>
                <a class="btn btn-danger" href="{{route('users.index')}}">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#role').val($('#_role').val()).change();
        //$('#gender').val($('#_gender').val()).change();
    });
</script>
@endsection
