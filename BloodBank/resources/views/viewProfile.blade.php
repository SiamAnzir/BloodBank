@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blood Bank</div>

                <div class="card-body">

                    <div class="form-group row">

                        <div class="col-md-6">
                            Name       : {{$user->name}}
                            <br>
                            Email      : {{$user->email}}
                            <br>
                            Divison    : {{$user->address}}
                            <br>
                            Phone No   : {{$user->phone_no}}
                            <br>
                            @foreach ($bloodGroups as $bloodGroup)
                                @if($bloodGroup->id == $user->blood_group_id)
                                    Blood Group: {{$bloodGroup->blood_group}}
                                @endif
                            @endforeach
                            <br>
                            Last Donation Date: {{$user->last_donation_date}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection