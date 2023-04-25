@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
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
            @php $projetos = DB::table('projetos')->get(); @endphp
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
@endsection