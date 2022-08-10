@extends('layouts.solution')
@section('title')
Easy Fix - Add Solution
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-0">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('solutions.index')}}">solutions</a></li>
            <li class="breadcrumb-item active" aria-current="page">New solution</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<form class="container" action="{{route('solutions.store')}}" method="POST" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h6>Gadget solution</h6>
        </div>

        <div class="card-body">
            @csrf
            <div class="">
                <div class="col-md mb-3">
                    <label class="form-label">Gadget Name <span>*</span></label>
                    <input type="text" class="form-control" id="gadget_name" name="gadget_name" placeholder="ex. Iphone 6s" value="{{ old('gadget_name')}}">
                    <span class="text-danger">@error('gadget_name'){{ $message }}@enderror</span>
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Gadget Type <span>*</span></label>
                    <select name="gadget_type" id="gadget_type" class="form-select">
                        <option value="Mobile phone">Mobile Phones</option>
                        <option value="Laptops">Laptops</option>
                        <option value="Cameras">Cameras</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Microwaves">Microwaves</option>
                        <option value="Television Sets">Television Sets</option>
                        <option value="Speakers">Speakers</option>
                        <option value="Standing Fans">Standing Fans</option>
                    </select>
                    <span class="text-danger">@error('gadget_type'){{ $message }}@enderror</span>
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Description <span>*</span></label>
                    <textarea name="description" id="description" class="form-control" placeholder="describe your gadget solution here">{{ old('description') }}</textarea>
                    <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Location</label>
                    <input type="tel" class="form-control " id="location" name="location" placeholder="ex. North Street Ave 234" value="{{ old('location') }}">
                    <span class="text-danger">@error('locaton'){{ $message }}@enderror</span>
                </div>
            </div>

        </div>

        <div class="card-footer bg-white border-top-0">
            <div class="col mb-1 float-end">
                <button type="submit" class="btn submit-btn shadow">Send solution</button>
                <a class="btn btn-danger shadow" href="{{route('users.index')}}">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection
