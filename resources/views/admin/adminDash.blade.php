@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    @if($message = Session::get('aviso'))
    <div class="card-body">
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif
    @if($message = Session::get('adicionado'))
    <div class="card-body">
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link" id="areas-tab" data-toggle="tab" href="#areas" role="tab" aria-controls="nav-profile" aria-selected="true">Áreas</a>
        <a class="nav-item nav-link active" id="estados-tab" data-toggle="tab" href="#estados" role="tab" aria-controls="nav-home" aria-selected="false">Estados</a>
        <a class="nav-item nav-link" id="estudos-tab" data-toggle="tab" href="#estudos" role="tab" aria-controls="nav-contact" aria-selected="false">Estudos</a>
        <a class="nav-item nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="nav-contact" aria-selected="false">Utilizadores</a>
        <a class="nav-item nav-link" id="tipos-tab" data-toggle="tab" href="#tipos" role="tab" aria-controls="nav-contact" aria-selected="false">Tipos</a>
    </div>
    <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="estados" role="tabpanel" aria-labelledby="estados-tab">
                <table class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm" class="w-75">Estado</th>
                            <th scope="col-sm">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $estados = DB::table('estado')->get();@endphp
                        @foreach($estados as $estado)
                        <tr>
                            <th scope="row">{{$estado->id}}</th>
                            <td>{{$estado->estado}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="{{url('/removerEstado')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$estado->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Apagar Estado') }}
                                        </button>
                                    </form>
                                    <form action="{{url('/editarEstado')}}" method="post" style="margin-left: 10px;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$estado->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Estado') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="text-align: center;">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <button id="toggleButton" class="btn btn-success">{{ __('Adicionar Estado') }}</button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <form id="myForm" style="display: none;" action="{{url('/adicionarEstado')}}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="estado">Estado:</label>
                                                    <input type="text" id="estado" name="estado" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Adicionar Estado') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $("#toggleButton").on('click', function() {
                                            $("#myForm").toggle();
                                            var buttonText = $(this).text();
                                            $(this).text(buttonText === "{{ __('Adicionar Estado') }}" ? "{{ __('Esconder Adicionar Estado') }}" : "{{ __('Adicionar Estado') }}");
                                        });
                                    });
                                </script>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="areas" role="tabpanel" aria-labelledby="areas-tab">
                <table class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm" class="w-75">Áreas</th>
                            <th scope="col-sm">Options</th>
                        </tr>
                    </thead>
                    @php $areas = DB::table('area')->get();@endphp
                    @foreach($areas as $area)
                    <tbody>
                        <tr>
                            <th scope="row">{{$area->id}}</th>
                            <td>{{$area->nome}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$area->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Apagar Area') }}
                                        </button>
                                    </form>
                                    <form action="" method="post" style="margin-left: 10px;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$area->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Area') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="estudos" role="tabpanel" aria-labelledby="estudos-tab">
                <table class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm" class="w-75">Estado</th>
                            <th scope="col-sm">Options</th>
                        </tr>
                    </thead>
                    @php $estudos = DB::table('estudos')->get();@endphp
                    @foreach($estudos as $estudo)
                    <tbody>
                        <tr>
                            <th scope="row">{{$estudo->id}}</th>
                            <td>{{$estudo->nome}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$estudo->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Apagar Estudo') }}
                                        </button>
                                    </form>
                                    <form action="" method="post" style="margin-left: 10px;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$estudo->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Estudo') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                <table class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm" class="w-50">Nome</th>
                            <th scope="col-sm">Tipo</th>
                            <th scope="col-sm" class="w-25">Options</th>
                        </tr>
                    </thead>
                    @php $users = DB::table('users')->get();@endphp
                    @foreach($users as $user)
                    <tbody>
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->nome}}</td>
                            @php $tipo = DB::table('tipo')->where('id', $user->tipo_id)->value('nome');@endphp
                            <td>{{$tipo}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Apagar Utilizador') }}
                                        </button>
                                    </form>
                                    <form action="" method="post" style="margin-left: 10px;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Utilizador') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="tipos" role="tabpanel" aria-labelledby="tipos-tab">
                <table class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm" class="w-75">Nome</th>
                            <th scope="col-sm">Options</th>
                        </tr>
                    </thead>
                    @php $tipos = DB::table('tipo')->get();@endphp
                    @foreach($tipos as $tipo)
                    <tbody>
                        <tr>
                            <th scope="row">{{$tipo->id}}</th>
                            <td>{{$tipo->nome}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tipo->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('Apagar Tipo') }}
                                        </button>
                                    </form>
                                    <form action="" method="post" style="margin-left: 10px;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$tipo->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Tipo') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</main>
@endsection