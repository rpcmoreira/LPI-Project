@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Share</button>
        <button class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
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
</main>
</div>
</div>


@endsection