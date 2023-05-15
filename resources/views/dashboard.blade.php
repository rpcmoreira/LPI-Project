@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg">
      @if(Auth::user()->tipo_id == 5)
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <div>{!! $chart->container() !!}</div>
      <script src="https://code.highcharts.com/highcharts.js"></script>
      {!! $chart->script() !!}

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nome do Projeto</th>
              <th>Estudo</th>
              <th>Area</th>
              <th>Estado</th>
            </tr>
          </thead>
          @php $projetos = DB::table('projetos')->limit(7)->get(); @endphp
          @foreach($projetos as $projeto)
          <tbody>
            <tr>
              <td>{{ $projeto->nome }}</td>
              <td>{{ DB::table('estudos')->where('id', $projeto->estudo_id)->value('nome') }}</td>
              <td>{{ DB::table('area')->where('id', $projeto->area_id)->value('nome') }}</td>
              @if(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Em Curso')
              <td style="color:green"> <span style="font-weight: bold;"> {{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }} </span></td>
              @elseif(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Falta Informação')
              <td style="color:red"><span style="font-weight: bold;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }} </span></td>
              @elseif(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Finalizado' )
              <td style="color:grey"><span style="font-weight: bold;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }} </span></td>
              @else
              <td style="color:orange"><span style="font-weight: bold;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }}</span></td>
              @endif

            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      @elseif(Auth::user()->tipo_id == 6 && DB::table('projetos')->where('proponente_id', Auth::user()->id)->value('id') != null)
      @php $projeto = DB::table('projetos')->where('proponente_id', Auth::user()->id)->first(); @endphp
      <div class="container">
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
          <p>{{ $message }}</p>
        </div>
        <br>
        @endif
        @if($message = Session::get('status'))
        <div class="card-body">
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
        </div>
        @endif
        @php $id = DB::table('projetos')->where('proponente_id', Auth::user()->id)->value('id');@endphp
        @if($id != null && (DB::table('files')->where('projeto_id', $id)->where('tipo', 'q251')->value('file') == null
        || DB::table('files')->where('projeto_id', $id)->where('tipo', 'q252')->value('file') == null
        || DB::table('files')->where('projeto_id', $id)->where('tipo', 'q272')->value('file') == null))
        <div class="card-body">
          <div class="alert alert-danger">
            <p> Atenção!</p>
            <p> Formulários por entregar!</p>
            <p> Sem entregar os formulários necessários o seu projeto não será processado!</p>
          </div>
        </div>
        @endif
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg">
                    <p class="text-left font-italic"><span class="align-bottom"> {{DB::table('data')->where('id', $projeto->data_id)->value('data')}} -
                        {{DB::table('data')->where('id', $projeto->data_final_id)->value('data')}}</span></p>
                  </div>
                  <div class="col-lg">
                    <p class="text-center font-weight-bold"><span class="align-bottom"> {{$projeto->nome}}</span></p>
                  </div>
                  <div class="col-lg">
                    @if(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Em Curso')
                    <p class="text-right align-bottom font-weight-bold" style="color:green;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }}
                      @elseif(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Falta Informação')
                    <p class="text-right align-bottom font-weight-bold" style="color:red;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }}</p>
                    @elseif(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Finalizado' )
                    <p class="text-right font-weight-bold" style="color:grey; ">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }}</p>
                    @else
                    <p class="text-right font-weight-bold" style="color:orange;"><span class="align-bottom">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }}</span></p>
                    @endif
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <div class="row md-3 mb-1">
                      <label for="Proponente" class="col-md-3 col-form-label text-center">{{ __('Proponente:') }}</label>
                      <div class="col-lg">
                        <p class="col-md-3 col-form-label text-center">{{DB::table('users')->where('id', $projeto->proponente_id)->value('nome')}}</p>
                      </div>
                    </div>
                    <div class="row md-3 mb-1">
                      <label for="Proponente" class="col-md-3 col-form-label text-center">{{ __('Email do Proponente:') }}</label>
                      <div class="col-lg">
                        <p class="col-md-3 col-form-label text-center">{{DB::table('users')->where('id', $projeto->proponente_id)->value('email')}}</p>
                      </div>
                    </div>
                    <div class="row md-3 mb-1">
                      <label for="Metodos" class="col-md-3 col-form-label text-center">{{ __('Métodos:') }}</label>
                      <div class="col-lg">
                        <p class="col-md-3 col-form-label text-center">{{$projeto->metodos}}</p>
                      </div>
                    </div>
                    <div class="row md-3 mb-1">
                      <label for="Objetivo" class="col-md-3 col-form-label text-center">{{ __('Objetivos:') }}</label>
                      <div class="col-lg">
                        <p class="col-md-3 col-form-label text-center">{{$projeto->objetivo}}</p>
                      </div>
                    </div>
                    <div class="row md-3 mb-1">
                      <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Area de Conhecimento:') }}</label>
                      <div class="col-lg">
                        <p class="col-md-3 col-form-label text-center">{{DB::table('area')->where('id', $projeto->area_id)->value('nome')}}</p>
                      </div>
                    </div>
                    <div class="row md-3 mb-1">
                      <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Tipo de Projeto:') }}</label>
                      <div class="col-lg">
                        <p class="col-md-3 col-form-label text-center">{{DB::table('estudos')->where('id', $projeto->area_id)->value('nome')}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="row md-4 mb-1">
                      <div class="col-lg">
                        <p class="col-form-label font-weight-bold">{{__('Ficheiros do Projeto')}}</p>
                      </div>
                    </div>
                    <div class="row md-4 mb-1">
                      <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q251') }}</label>
                      <div class="col-lg">
                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q251')->value('file')!= null)
                        <p class="col-md-4 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q251')->value('tipo')}}</p>
                        @else
                        <p class="col-md-4 col-form-label text-center">X</p>
                        @endif
                      </div>
                    </div>
                    <div class="row md-4 mb-1">
                      <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q252') }}</label>
                      <div class="col-lg">
                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('file')!= null)
                        <p class="col-md-4 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('tipo')}}</p>
                        @else
                        <p class="col-md-4 col-form-label text-center">X</p>
                        @endif
                      </div>
                    </div>
                    <div class="row md-4 mb-1">
                      <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q272') }}</label>
                      <div class="col-lg">
                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('file')!= null)
                        <p class="col-md-4 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('tipo')}}</p>
                        @else
                        <p class="col-md-4 col-form-label text-center">X</p>
                        @endif
                      </div>
                    </div>
                    @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q251')->value('file')== null
                    &&DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('file')== null &&
                    DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('file')== null)
                    <div class="row md-4 mb-1">
                      <div class="col-md-auto col-form-label text-center">
                        <a href="{{ route('addForms') }}">
                          <button class="btn btn-primary btn">{{ __('Adicionar Formulários') }}</button>
                        </a>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          @elseif(Auth::user()->tipo_id == 6 && DB::table('projetos')->where('proponente_id', Auth::user()->id)->value('id') == null)
          <div class="card-header">
            <h2>Bem vindo {{ Auth::user()->nome }}!</h2>
          </div>
          <div class="card-body">
            <h5>Não te esqueças de criar o teu pedido de projeto preenchendo o formulário Q251!</h5>
          </div>
          @elseif(Auth::user()->tipo_id == 2 || Auth::user()->tipo_id == 3 || Auth::user()->tipo_id == 4)
          <div class="card-header">
            <h2>Bem vindo {{ Auth::user()->nome }}!</h2>
          </div>
          <div class="card-body">
            <h5>Dashboard</h5>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection