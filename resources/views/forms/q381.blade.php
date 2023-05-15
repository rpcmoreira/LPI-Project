@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card ">
                <div class="card-header text-center">Formulário para envio de síntese de resultados</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('q381_form') }}">
                        @csrf
                        <div class="row md-3 mb-1">
                            <label for="titulo" class="col-md-3 col-form-label text-center">{{ __('Título do Estudo/Projeto') }}</label>
                            <div class="col-lg">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row md-3 mb-1">
                            <label for="proponente_identificacao" class="col-md-3 col-form-label text-center">{{ __('Identificação do(s) Proponente(s)') }}</label>
                            <div class="col-lg">
                                <input id="proponente_identificacao" type="text" class="form-control @error('proponente_identificacao') is-invalid @enderror" name="proponente_identificacao" value="{{ old('proponente_identificacao') }}" required autocomplete="proponente_identificacao" autofocus placeholder="Nome(s):">
                                @error('proponente_identificacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row md-3 mb-1 mt-1">
                            <label for="objetivo" class="col-md-3 col-form-label text-center">{{ __('Objetivo') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="objetivo" class="form-control @error('objetivo') is-invalid @enderror" cols="80" rows="3" name="objetivo" style="resize:none"></textarea>
                                    @error('objetivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="metodos" class="col-md-3 col-form-label text-center">{{ __('Métodos') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="metodos" class="form-control @error('metodos') is-invalid @enderror" cols="80" rows="3" name="metodos" style="resize:none"></textarea>
                                    @error('metodos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="resultados" class="col-md-3 col-form-label text-center">{{ __('Resultados') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="resultados" class="form-control @error('resultados') is-invalid @enderror" cols="80" rows="3" name="resultados" style="resize:none"></textarea>
                                    @error('resultados')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="conclusoes" class="col-md-3 col-form-label text-center">{{ __('Conclusões') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="conclusoes" class="form-control @error('conclusoes') is-invalid @enderror" cols="80" rows="3" name="conclusoes" style="resize:none"></textarea>
                                    @error('conclusoes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="outputs" class="col-md-3 col-form-label text-center">{{ __('Outputs') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="outputs" class="form-control @error('outputs') is-invalid @enderror" cols="80" rows="3" name="outputs" style="resize:none" placeholder="Ex: Dissertação de mestrado, tese de doutoramento, publicação de artigo científico…"></textarea>
                                    @error('outputs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row md-3 mb-1 mt-1">
                            <label for="autos_destruicao" class="col-md-3 col-form-label text-center">{{ __('Autos de destruição (se aplicável)') }}</label>
                            <div class="col-lg">
                                <input id="autos_destruicao" type="text" class="form-control @error('autos_destruicao') is-invalid @enderror" name="autos_destruicao" value="{{ old('autos_destruicao') }}" autocomplete="autos_destruicao" autofocus>
                                @error('autos_destruicao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="data" class="col-md-3 col-form-label text-center">{{ __('Data') }}</label>
                            <div class="col-lg">
                                <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data" value="{{ old('data') }}" required autocomplete="data" autofocus>
                                @error('data')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0 mt-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
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