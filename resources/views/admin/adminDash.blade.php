@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="nav-home" aria-selected="true">Adicionar Estados</a>
        <a class="nav-item nav-link" id="rem-tab" data-toggle="tab" href="#rem" role="tab" aria-controls="nav-profile" aria-selected="false">Remover Estados</a>
        <a class="nav-item nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="nav-contact" aria-selected="false">Editar Estados</a>
        <a class="nav-item nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="nav-contact" aria-selected="false">Lista Estados</a>
    </div>
    <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
                <table class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th scope="col-sm">#</th>
                            <th scope="col-sm" class="w-75">Estado</th>
                            <th scope="col-sm">Options</th>
                        </tr>
                    </thead>
                    @php $estados = DB::table('estado')->get();@endphp
                    @foreach($estados as $estado)
                    <tbody>
                        <tr>
                            <th scope="row">{{$estado->id}}</th>
                            <td>{{$estado->estado}}</td>
                            <td>
                                <div style="display: flex;">
                                    <form action="{{url('/removerEstado')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$estado->id}}">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Apagar Estado') }}
                                        </button>
                                    </form>
                                    <form action="{{url('/editarEstado')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$estado->id}}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Editar Estado') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane fade" id="rem" role="tabpanel" aria-labelledby="rem-tab">Remover Estados Form

            </div>
            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">Editar Estados Form

            </div>
        </div>
    </div>
</main>
@endsection