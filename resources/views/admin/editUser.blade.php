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
                    <form method="post" action="{{url('/editUser')}}">
                        @csrf
                        <div class="row md-2 mb-1">
                            <label for="nome" class="col-md-2 col-form-label text-center">{{ __('User') }}</label>
                            <div class="col-lg">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input id="nome" type="text" class="form-control @error('area') is-invalid @enderror" name="nome" value="{{$user->nome}}" required autocomplete="nome" autofocus placeholder="{{$user->nome}}" readonly>
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row md-2 mb-1">
                            <label for="email" class="col-md-2 col-form-label text-center">{{ __('Email') }}</label>
                            <div class="col-lg">
                                <input type="hidden" name="email" value="{{$user->email}}">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{$user->email}}" readonly>
                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row md-2 mb-1">
                            <label for="tipo" class="col-md-2 col-form-label text-center">{{ __('Tipo') }}</label>
                            <div class="col-lg">
                                <select id="tipo" name="tipo" class="form-select form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo') }}" autofocus>
                                    @php $tipo = DB::table('tipo')->where('id', $user->tipo_id)->value('nome'); @endphp
                                    <option value="" selected disabled hidden>{{$tipo}}</option>
                                    @foreach(DB::table('tipo')->get() as $tipos)
                                    <option value="{{ $tipos->id }}">{{ $tipos->nome }}</option>
                                    @endforeach
                                </select>
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