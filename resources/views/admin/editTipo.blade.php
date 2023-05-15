@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Editar Tipo
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/editTipo')}}">
                        @csrf
                        <div class="row md-2 mb-1">
                            <label for="nome" class="col-md-2 col-form-label text-center">{{ __('Tipo') }}</label>
                            <div class="col-lg">
                                <input type="hidden" name="id" value="{{$tipo->id}}">
                                <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="area" autofocus placeholder="{{$tipo->nome}}">
                                @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Aplicar</button>
                            <button href="/adminDash" class="btn btn-danger">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection