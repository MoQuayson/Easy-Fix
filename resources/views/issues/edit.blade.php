@extends('layouts.issue')
@section('title')
Easy Fix - Edit Issue
@endsection

@section('breadcrumbs')
<nav class="navbar navbar-expand p-0">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('issues.index')}}">Issues</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Issue</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<form class="container" action="{{route('issues.update',['issue'=>$issue->id])}}" method="POST" enctype="multipart/form-data">
    <div class="card shadow">
        <div class="card-header bg-white">
            <h6>Gadget Issue</h6>
        </div>

        <div class="card-body">
            {{ method_field('PUT') }}
            @csrf

            <input type="hidden" id="_gadget_type" value="{{$issue->gadget_type}}">
            <div class="">
                <div class="col-md mb-3">
                    <label class="form-label">Gadget Name <span>*</span></label>
                    <input type="text" class="form-control" id="gadget_name" name="gadget_name" placeholder="ex. Iphone 6s" value="{{ $issue->gadget_name}}">
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
                    <textarea name="description" id="description" class="form-control" placeholder="describe your gadget issue here">{{ $issue->description }}</textarea>
                    <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                </div>

                <div class="col-md mb-3">
                    <label class="form-label">Location</label>
                    <input type="tel" class="form-control " id="location" name="location" placeholder="ex. North Street Ave 234" value="{{ $issue->location }}">
                    <span class="text-danger">@error('locaton'){{ $message }}@enderror</span>
                </div>
            </div>

        </div>

        <div class="card-footer bg-white border-top-0">
            <div class="col mb-1 float-end">
                <button type="submit" class="btn submit-btn shadow">Save Changes</button>
                <a class="btn btn-danger shadow" href="{{route('issues.index')}}">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#gadget_type').val($('#_gadget_type').val()).change();
        //$('#gender').val($('#_gender').val()).change();
    });
</script>
@endsection
