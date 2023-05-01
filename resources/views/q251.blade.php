@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="height: 100%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card ">
                    <div class="card-header text-center">Submissão de Pedidos de Parecer - Q251</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('q251_form') }}">
                            @csrf
                            <div class="row md-3">
                                <label for="nome" class="col-md-3 col-form-label text-center">{{ __('Título do Estudo/Projeto') }}</label>
                                <div class="col-lg">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row md-3">
                                <label for="proponente" class="col-md-3 col-form-label text-center">{{ __('Proponente') }}</label>
                                <div class="col-lg">
                                    <input id="proponente" type="text" class="form-control @error('proponente') is-invalid @enderror" name="proponente" value="{{ old('proponente') }}" required autocomplete="proponente" autofocus>

                                    @error('proponente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row md-3">
                                <label for="estudos" class="col-md-3 col-form-label text-center">{{ __('Tipo de Estudo') }}</label>
                                <div class="col-lg">
                                    <select id="estudos" name="estudos" class="form-select form-control @error('estudos') is-invalid @enderror" value="{{ old('estudos') }}" autofocus>
                                        <option value="" selected disabled hidden>-------</option>
                                        @foreach(DB::table('estudos')->get() as $estudos)
                                        <option value="{{ $estudos->id }}" {{ request()->input('estudos') == $estudos->id ? 'selected' : '' }}>{{ $estudos->nome }}</option>
                                        @endforeach
                                    </select>

                                    @error('estudos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row md-3">
                                <label for="coordenador" class="col-md-3 col-form-label text-center">{{ __('Coordenador') }}</label>
                                <div class="col-lg">
                                    <select id="coordenador" name="coordenador" class="form-select form-control @error('coordenador') is-invalid @enderror" value="{{ old('coordenador') }}" autofocus>
                                        <option value="" selected disabled hidden>-------</option>
                                        @php $userIds = [2,3,4]; @endphp
                                        @foreach(DB::table('users')->whereIn('users.tipo_id', $userIds)->get() as $coordenador)
                                        <option value="{{ $coordenador->id }}" {{ request()->input('coordenador') == $coordenador->id ? 'selected' : '' }}>{{ $coordenador->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('coordenador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row md-3">
                                <label for="cv" class="col-md-3 col-form-label text-center font-italic">{{ __('Curriculum Vitae') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <input type="file" accept=".pdf," class="form-control-file" name="cv" placeholder="Choose your CV" id="cv">
                                        @error('img')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection