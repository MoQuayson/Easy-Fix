@extends('layouts.users')
@section('title')
User Information | Users | Montran Management
@endsection

@section('breadcrumbs')
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Information</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow mb-3">
        <div class="card-header bg-navy text-white">
            <h5>User Information </h5>
        </div>

        <div class="card-body">
            <div class="container table-responsive-lg">
                <table id="displayTable">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 150px" hidden>Title</th>
                            <th scope="col" style="width: 600px" hidden>Data</th>
                         </tr>
                     </thead>

                     <tbody>

                        <tr>
                            <td class="titleColumn">Staff ID:</td>
                            @if (is_null($user->staff_id))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->staff_id}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">First Name:</td>
                            @if (is_null($user->fname))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->fname}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Last Name:</td>
                            @if (is_null($user->lname))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->lname}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Other Names:</td>
                            @if (is_null($user->oname))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->oname}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">DOB:</td>
                            @if (is_null($user->dob))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="date" class="form-control mb-3"  value="{{$user->dob}}" readonly></td>
                            @endif
                        </tr>


                        <tr >
                            <td class="titleColumn">Gender:</td>
                            @if (is_null($user->gender))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->gender}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Email:</td>
                            @if (is_null($user->email))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->email}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Primary Phone:</td>
                            @if (is_null($user->primary_phone))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->primary_phone}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Secondary Phone:</td>
                            @if (is_null($user->secondary_phone))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->secondary_phone}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">GPS Address:</td>
                            @if (is_null($user->gps_address))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->gps_address}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">City:</td>
                            @if (is_null($user->city))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->city}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Country:</td>
                            @if (is_null($user->country))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->country}}" readonly></td>
                            @endif
                        </tr>

                        <tr >
                            <td class="titleColumn">Department:</td>
                            @if (is_null($user->department))
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="N/A" readonly></td>
                            @else
                            <td class="dataColumn"><input type="text" class="form-control mb-3"  value="{{$user->department}}" readonly></td>
                            @endif
                        </tr>
                     </tbody>
                </table>

            </div>
        </div>

        <div class="card-footer bg-white border-top-0">
            <div class="d-flex justify-content-center mb-2">
                <button class="btn btn-primary me-2 fw-bold shadow-sm"><i class="bi bi-printer-fill me-2"></i>Print</button>
                <a href="{{route('users.index')}}" class="btn btn-warning text-dark fw-bold shadow-sm">Cancel</a>
            </div>
        </div>
    </div>
</div>

@endsection
