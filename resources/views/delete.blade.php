
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">{{ __('Delete') }}</div>
                <div class="card-body">
                 Are you sure you want to delete your profile?
                </div>
                <form action="{{ route('erase')}}" method="POST">
                    @csrf

                <a class="btn btn-primary" style="padding-bottom:10px" href="{{ url('/')}}">No</a>
                <button type="submit" style="padding-bottom:10px" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection