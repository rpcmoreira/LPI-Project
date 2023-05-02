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
                            <div class="row md-3 mb-1">
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
                            <div class="row md-3 mb-1">
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
                            <div class="row md-3 mb-1">
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
                            <div class="row md-3 mb-1">
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

                            <div class="row md-3 mb-1 mt-1">
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
                            <div class="row md-3 mb-1 mt-1">
                                <label for="justificacao" class="col-md-3 col-form-label text-center">{{ __('Justificação') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="justificacao" class="form-control @error('justificacao') is-invalid @enderror" cols="80" rows="3" name="justificacao" style="resize:none"></textarea>
                                        @error('justificacao')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="objetivo" class="col-md-3 col-form-label text-center">{{ __('Objetivos do Estudo/Projeto:') }}</label>
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
                            <div class="row md-3 mb-1">
                                <label for="data_inicio" class="col-md-3 col-form-label text-center">{{ __('Data Início/Fim') }}</label>
                                <div class="col-lg">
                                    <input type="date" name="data_inicio" id="data_inicio">
                                    <input type="date" name="data_fim" id="data_fim">
                                </div>
                            </div>

                            <div class="row md-3 mb-1">
                                <label for="data_inicio_dados" class="col-md-3 col-form-label text-center">{{ __('Início/Fim Recolha de Dados') }}</label>
                                <div class="col-lg">
                                    <input type="date" name="data_inicio_dados" id="data_inicio_dados">
                                    <input type="date" name="data_fim_dados" id="data_fim_dados">
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="amostra" class="col-md-3 col-form-label text-center">{{ __('População e Amostra/Informantes:') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="amostra" class="form-control @error('amostra') is-invalid @enderror" cols="80" rows="3" name="amostra" style="resize:none"></textarea>
                                        @error('amostra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="inclusao" class="col-md-3 col-form-label text-center">{{ __('Critérios de Inclusão/Exclusão:') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="inclusao" class="form-control @error('inclusao') is-invalid @enderror" cols="80" rows="3" name="inclusao" style="resize:none"></textarea>
                                        @error('inclusao')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="locais" class="col-md-3 col-form-label text-center">{{ __('Locais onde Decorre a Investigação:') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="locais" class="form-control @error('locais') is-invalid @enderror" cols="80" rows="3" name="locais" style="resize:none"></textarea>

                                        @error('locais')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="consentimento" class="col-md-3 col-form-label text-center">{{ __('Os participantes são capazes de dar o seu consentimento informado, livre e esclarecido?') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <br>
                                        <div>
                                            <label for="sim">Sim
                                                <input type="radio" name="consentimento" id="sim" value="sim">&nbsp;&nbsp;&nbsp;</label>

                                            <label for="nao">Não
                                                <input type="radio" name="consentimento" id="nao" value="nao"></label>
                                        </div>
                                        <div id="motivoDiv" style="display:none;">
                                            <label for="motivo">Se "Não", indique p.f. qual o motivo:</label>
                                            <input type="text" name="motivo" id="motivo" disabled>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("input[name='consentimento']").on('change', function() {
                                            if ($("#nao").is(':checked')) {
                                                $("#motivoDiv").show();
                                                $("#motivo").prop('disabled', false);
                                            } else {
                                                $("#motivoDiv").hide();
                                                $("#motivo").prop('disabled', true);
                                            }
                                        });
                                    });
                                </script>
                                <br>
                            </div>

                            <div class="row md-3 mb-1 mt-1">
                                <label for="danos" class="col-md-3 col-form-label text-center">{{ __('Há previsão de danos para os sujeitos da investigação? ') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="danos" class="form-control @error('danos') is-invalid @enderror" cols="80" rows="3" name="danos" style="resize:none"></textarea>

                                        @error('danos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="beneficio" class="col-md-3 col-form-label text-center">{{ __('Há previsão de benefícios para os sujeitos da investigação? ') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="beneficio" class="form-control @error('beneficio') is-invalid @enderror" cols="80" rows="3" name="beneficio" style="resize:none"></textarea>

                                        @error('beneficio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-3 mb-1 mt-1">
                                <label for="custo" class="col-md-3 col-form-label text-center">{{ __('Custos de participação para os sujeitos da investigação e possível compensação:') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <textarea id="custo" class="form-control @error('custo') is-invalid @enderror" cols="80" rows="3" name="custo" style="resize:none"></textarea>
                                        @error('custo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submeter') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection