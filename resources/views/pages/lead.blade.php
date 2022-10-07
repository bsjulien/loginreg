@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    Student: received "well done" by the facilitator
                    Facilitor: gave the feedback to the student
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
