@extends('layouts.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="height: 100%;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg">
        <div class="card">
          <div class="card-header text-center">Formulário para elaboração dos pareceres pelos membros da Comissão de Ética para a Saúde do Hospital-Escola da UFP-FFP</div>
          <div class="card-body">
            <form method="POST" action="{{ route('q250_form') }}">
              @csrf
              <div class="row md-3 mb-1">
                <label for="nome_investigador" class="col-md-3 col-form-label text-center">{{ __('Nome do investigador') }}</label>
                <div class="col-lg">
                  <input id="nome_investigador" type="text" class="form-control @error('nome_investigador') is-invalid @enderror" name="nome_investigador" value="{{ old('nome_investigador') }}" required autocomplete="nome_investigador" autofocus>
                  @error('nome_investigador')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row md-3 mb-1">
                <label for="grau_academico" class="col-md-3 col-form-label text-center">{{ __('Licenciatura/Mestrado/Doutoramento') }}</label>
                <div class="col-lg">
                  <select id="grau_academico" name="grau_academico" class="form-select form-control @error('grau_academico') is-invalid @enderror" value="{{ old('grau_academico') }}" autofocus>
                    <option value="" selected disabled hidden>Selecione</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Mestrado">Mestrado</option>
                    <option value="Doutoramento">Doutoramento</option>
                  </select>
                  @error('grau_academico')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row md-3 mb-1">
                <label for="titulo_estudo" class="col-md-3 col-form-label text-center">{{ __('Título do estudo') }}</label>
                <div class="col-lg">
                  <input id="titulo_estudo" type="text" class="form-control @error('titulo_estudo') is-invalid @enderror" name="titulo_estudo" value="{{ old('titulo_estudo') }}" required autocomplete="titulo_estudo" autofocus>
                  @error('titulo_estudo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row md-3 mb-1">
                <label for="nome_orientador" class="col-md-3 col-form-label text-center">{{ __('Nome do orientador') }}</label>
                <div class="col-lg">
                  <input id="nome_orientador" type="text" class="form-control @error('nome_orientador') is-invalid @enderror" name="nome_orientador" value="{{ old('nome_orientador') }}" required autocomplete="nome_orientador" autofocus>
                  @error('nome_orientador')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row md-3 mb-1">
                <label for="nome_coorientador" class="col-md-3 col-form-label text-center">{{ __('Nome do coorientador') }}</label>
                <div class="col-lg">
                  <input id="nome_coorientador" type="text" class="form-control @error('nome_coorientador') is-invalid @enderror" name="nome_coorientador" value="{{ old('nome_coorientador') }}" autocomplete="nome_coorientador" autofocus>
                  @error('nome_coorientador')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              </br>

              <div class="card-header text-center">Assinale os itens que estão presentes no projeto de investigação submetido à Comissão de Ética:</div>
              <div class="card-body">
                @foreach ([
                'objetivos_estudo' => '1. Objetivos do estudo',
                'tipo_investigacao' => '2. Tipo de investigação',
                'contexto_estudo' => '3. O contexto do estudo',
                'participantes_estudo' => '4. Os participantes no estudo',
                'acesso_participantes' => '5. O acesso ao grupo de participantes',
                ] as $field => $label)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field) ? 'checked' : '' }}>
                  <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                </div>
                @endforeach
              </div>



              <div class="card-header">&nbsp&nbsp&nbsp&nbsp6. Consentimento Informado</div>
              <div class="card-body">
                @foreach ([
                'procedimentos_consentimento' => 'Os procedimentos para obtenção do consentimento informado',
                'formulario_consentimento' => 'O formulário adequado ao estudo está anexado ao projeto',
                ] as $field => $label)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field) ? 'checked' : '' }}>
                  <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                </div>
                @endforeach
              </div>

              <div class="card-header">&nbsp&nbsp&nbsp&nbsp7. Parecer do Relator</div>
              <div class="card-body">
                @foreach ([
                'parecer_positivo' => 'Parecer Positivo',
                'parecer_condicionado' => 'Parecer Condicionado',
                'parecer_negativo' => 'Parecer Negativo',
                ] as $field => $label)
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="parecer_relator" id="{{ $field }}" value="{{ $field }}" {{ old('parecer_relator') == $field ? 'checked' : '' }}>
                  <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
                </div>
                @endforeach
              </div>

              <div class="row mt-3">
                <label for="razoes_parecer" class="col-md-12 col-form-label text-center">No caso de parecer condicionado ou negativo, identifique claramente as razões para tal, indicando os itens acima assinalados que justificam a sua tomada de posição:</label>
                <div class="col-lg">
                  <textarea id="razoes_parecer" class="form-control " name="razoes_parecer" rows="4" autocomplete="razoes_parecer" autofocus=""></textarea>
                </div>
              </div>
              <div class="row mb-0 mt-3">
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Enviar') }}
                  </button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>
@endsection