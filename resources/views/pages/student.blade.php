@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    You were given feedback by the facilitator: Well done!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
