@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">{{ __('Remove project') }}</div>

                @php $id = Auth::id(); @endphp

                <div class="card-body">
                    <form method="POST" action="{{ url('/remove') }}">
                        {{ __('Are you sure you want to remove this project?') }}
                        @csrf

                        <input type="hidden" id="id" name="id" class="form-control @error('id') is-invalid @enderror" value="{{ $projeto->id }}">

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Remove') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection