@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card ">
                <div class="card-header text-center">Submissão de Pedidos de Parecer - Q251</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('gerar-pdf-q251') }}">
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
                                <input id="proponente" type="text" class="form-control @error('proponente') is-invalid @enderror" name="proponente" placeholder="{{ Auth::user()->nome }}" value="{{ Auth::user()->nome }}" required autocomplete="proponente" autofocus readonly>
                                @error('proponente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row md-3 mb-1">
                            <label for="estudos" class="col-md-3 col-form-label text-center">{{ __('Licenciatura/Mestrado/Doutoramento/Outro') }}</label>
                            <div class="col-lg">
                                <select id="estudos" name="estudos" class="form-select form-control @error('estudos') is-invalid @enderror" value="{{ old('estudos') }}" autofocus>
                                    <option value="" selected disabled hidden>-------</option>
                                    @foreach(DB::table('estudos')->get() as $estudos)
                                    <option value="{{ $estudos->nome }}" {{ request()->input('estudos') == $estudos->nome ? 'selected' : '' }}>{{ $estudos->nome }}</option>
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
                            <div class="col-md-9">
                                <div class="search_select_box">
                                    <select data-live-search="true" id="coordenador" name="coordenador" class="selectpicker form-control" value="{{ old('coordenador') }}" autofocus>
                                        @php $userIds = [4]; @endphp
                                        @foreach(DB::table('users')->where('users.tipo_id', $userIds)->get() as $coordenador)
                                        <option value="{{ $coordenador->nome }}" {{ request()->input('coordenador') == $coordenador->nome ? 'selected' : '' }}>{{ $coordenador->nome }}</option>
                                        @endforeach
                                    </select>
                                    <!DOCTYPE html>
                                    <html lang="en">

                                    <head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <title>Formulário Laravel</title>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    </head>

                                    </html>
                                    @error('coordenador')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row md-3 mb-1">
                            <label for="coordenador" class="col-md-3 col-form-label text-center">{{ __('Co-Coordenador') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <br>
                                    <div>
                                        <label for="sim">Sim <input type="radio" id="sim" name="coordenador" value="sim">&nbsp;&nbsp;&nbsp;</label>
                                        <label for="nao">Não <input type="radio" id="nao" name="consentimento" value="nao"></label>
                                    </div>
                                    <div id="motivoDiv" style="display:none;">
                                        <div class="col-md-9">
                                            <div class="search_select_box">
                                                <select data-live-search="true" id="coordenador" name="coordenador" class="selectpicker form-control" value="{{ old('coordenador') }}" autofocus>
                                                    @php $userIds = [4]; @endphp
                                                    @foreach(DB::table('users')->where('users.tipo_id', $userIds)->get() as $coordenador)
                                                    <option value="{{ $coordenador->nome }}" {{ request()->input('coordenador') == $coordenador->nome ? 'selected' : '' }}>{{ $coordenador->nome }}</option>
                                                    @endforeach
                                                </select>
                                                <!DOCTYPE html>
                                                <html lang="en">

                                                <head>
                                                    <meta charset="UTF-8">
                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                    <title>Formulário Laravel</title>
                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                </head>

                                                </html>
                                                @error('coordenador')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("input[name='coordenador']").on('change', function() {
                                    if ($("input[name='coordenador']:checked").val() === 'sim') {
                                        $("#motivoDiv").show();
                                        $("#motivo").prop('disabled', false);
                                    } else {
                                        $("#motivoDiv").hide();
                                        $("#motivo").prop('disabled', true);
                                    }
                                });
                            });
                        </script>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="cv" class="col-md-3 col-form-label text-center font-italic">{{ __('Curriculum Vitae') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <input type="file" accept=".pdf," class="form-control-file" name="cv" placeholder="Choose your CV" id="cv">
                                    @error('cv')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mb-1">
                            <label for="filiacao" class="col-md-3 col-form-label text-center">{{ __('Filiação Institucional') }}</label>
                            <div class="col-lg">
                                <input id="filiacao" type="text" class="form-control @error('filiacao') is-invalid @enderror" name="filiacao" value="{{ old('filiacao') }}" required autocomplete="filiacao" autofocus>

                                @error('filiacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
                            <label for="tipo_estudo" class="col-md-3 col-form-label text-center">{{ __('Tipo de Estudo:') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="tipo_estudo" class="form-control @error('tipo_estudo') is-invalid @enderror" cols="80" rows="3" name="tipo_estudo" style="resize:none"></textarea>
                                    @error('tipo_estudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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
                            <label for="instrumentos" class="col-md-3 col-form-label text-center">{{ __('Instrumento(s) de Colheita de Dados (juntar exemplo, no formato, que vai ser utilizado):') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="instrumentos" class="form-control @error('instrumentos') is-invalid @enderror" cols="80" rows="3" name="instrumentos" style="resize:none"></textarea>

                                    @error('instrumentos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="confidencialidade" class="col-md-3 col-form-label text-center">{{ __('Garantia de Confidencialidade:') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <textarea id="confidencialidade" class="form-control @error('confidencialidade') is-invalid @enderror" cols="80" rows="3" name="confidencialidade" style="resize:none"></textarea>

                                    @error('confidencialidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row md-3 mt-1">
                            <label for="consentimento" class="col-md-3 col-form-label text-center">{{ __('Os participantes são capazes de dar o seu consentimento informado, livre e esclarecido?') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <br>
                                    <div>
                                        <label for="sim">Sim <input type="radio" id="sim" name="consentimento" value="sim">&nbsp;&nbsp;&nbsp;</label>
                                        <label for="nao">Não <input type="radio" id="nao" name="consentimento" value="nao"></label>
                                    </div>
                                    <div id="motivoDiv" style="display:none;">
                                        <label for="motivo">Se "Não", indique p.f. qual o motivo:</label>
                                        <input type="text" name="motivo" id="motivo" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("input[name='consentimento']").on('change', function() {
                                    if ($("input[name='consentimento']:checked").val() === 'nao') {
                                        $("#motivoDiv").show();
                                        $("#motivo").prop('disabled', false);
                                    } else {
                                        $("#motivoDiv").hide();
                                        $("#motivo").prop('disabled', true);
                                    }
                                });
                            });
                        </script>
                        <div class="row md-3 mb-1 mt-1">
                            <label for="vulneravel" class="col-md-3 col-form-label text-center">{{ __('São indivíduos ou grupos vulneráveis?') }}</label>
                            <div class="col-lg">
                                <div class="form-group">
                                    <br>
                                    <div>
                                        <label for="vulneravel">Sim <input type="checkbox" id="vulneravel" name="vulneravel" value="1">&nbsp;&nbsp;&nbsp;</label>
                                    </div>
                                </div>
                            </div>
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
                            <button type="submit" onclick="downloadAndRedirect()" class="btn btn-primary">
                                {{ __('Submeter') }}
                            </button>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                                function downloadAndRedirect() {
                                    // Start the download
                                    window.location.href = '/download-route';

                                    // Redirect to dashboard after a delay
                                    setTimeout(function() {
                                        window.location.href = '/dashboard';
                                    }, 1000); // adjust delay as needed
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection