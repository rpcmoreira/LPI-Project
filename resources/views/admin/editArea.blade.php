@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Editar Estado
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('/editArea')}}">
                        @csrf
                        <div class="row md-2 mb-1">
                            <label for="nome" class="col-md-2 col-form-label text-center">{{ __('Área') }}</label>
                            <div class="col-lg">
                                <input type="hidden" name="id" value="{{$area->id}}">
                                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus placeholder="{{$area->nome}}">
                                @error('area')
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