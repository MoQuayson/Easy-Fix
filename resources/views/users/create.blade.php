@extends('layouts.users')
@section('title')
Create New User | Users | Montran Management
@endsection

@section('breadcrumbs')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
         <li class="breadcrumb-item active" aria-current="page">Create New User</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-navy text-white">
            <h6 class="d-flex assign-middle form-title">New User Form</h6>
        </div>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">

                    <div class="row">
                        <div class="col-md mb-3">
                            <label class="form-label">First Name <span>*</span></label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="ex. John" value="{{old('fname')}}" >
                            <span class="text-danger">@error('fname'){{$message}}@enderror</span>
                        </div>

                        <div class="col-md mb-3">
                            <label class="form-label">Last Name <span>*</span></label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="ex. Doe" value="{{old('lname')}}" >
                            <span class="text-danger">@error('lname'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-3">
                            <label class="form-label">Email <span>*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}" placeholder="ex. user@example.com">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>

                        <div class="col-md mb-3">
                            <label class="form-label">Phone No.</label>
                            <input type="text" class="form-control" id="primary_phone" name="primary_phone" value="{{old('primary_phone')}}" placeholder="ex. 0574546464">
                            <span class="text-danger">@error('primary_phone'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department <span>*</span></label>
                            <select class="form-select" id="department" name="department" >
                                <option selected value="">Select Department</option>
                                <option value="TL">Transport & Logistics</option>
                                <option value="HR">Human Resource</option>
                                <option value="BD">Business Development</option>
                                <option value="MD">Management</option>
                                <option value="CP">Compliance</option>
                                <option value="IT">Information Technology</option>
                                <option value="CIT">Cash-In Transit</option>
                                <option value="HD">Help Desk</option>
                            </select>
                            <span class="text-danger">@error('department'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <div class="col-md mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="new_form" value="true">
                            <label class="form-check-label">Continue filling form after saving</label>
                        </div>
                    </div>

                    <hr>
                    <div class="col mb-1 float-end">
                        <button type="submit" class="btn submitBtn">Save User</button>
                        <a class="btn btn-danger" href="{{route('users.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
