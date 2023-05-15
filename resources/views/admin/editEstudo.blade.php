@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Editar Estado
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/editEstudo')}}">
                        @csrf
                        <div class="row md-2 mb-1">
                            <label for="nome" class="col-md-2 col-form-label text-center">{{ __('Estado') }}</label>
                            <div class="col-lg">
                                <input type="hidden" name="id" value="{{$estudo->id}}">
                                <input id="estudo" type="text" class="form-control @error('estudo') is-invalid @enderror" name="estudo" value="{{ old('estudo') }}" 
                                required autocomplete="estudo" autofocus placeholder="{{$estudo->nome}}">
                                @error('estudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Aplicar</button>
                            <a href="/adminPage" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection