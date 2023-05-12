@extends('layouts.app')

@section('content')
@php $projeto = session('projeto');@endphp
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="height: 100%;">
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
                                @php
                                $current_state = $projectStates[$projeto->estado_id];
                                @endphp
                                @if($current_state == 'Em Curso')
                                <p class="text-right align-bottom font-weight-bold" style="color:green;">{{ $current_state }}</p>
                                @elseif($current_state == 'Falta Informação')
                                <p class="text-right align-bottom font-weight-bold" style="color:red;">{{ $current_state }}</p>
                                @elseif($current_state == 'Finalizado')
                                <p class="text-right font-weight-bold" style="color:grey;">{{ $current_state }}</p>
                                @else
                                <p class="text-right font-weight-bold" style="color:orange;"><span class="align-bottom">{{ $current_state }}</span></p>
                                @endif
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#projectState').change(function() {
                                        var projeto_id = "{{$projeto->id}}"; // Fetch the id of the current project
                                        var projectState = $(this).val();
                                        $.ajax({
                                            url: '/changeProjectState', // Make sure this URL points to your `changeProjectState` route
                                            type: 'POST',
                                            data: {
                                                "_token": $('meta[name="csrf-token"]').attr('content'),
                                                "projeto_id": projeto_id,
                                                "projectState": projectState
                                            },
                                            success: function(response) {
                                                location.reload(); // Refresh the page to show updated project state
                                            },
                                            error: function(jqXHR, textStatus, errorThrown) {
                                                console.log(textStatus, errorThrown);
                                            }
                                        });
                                    });
                                });
                            </script>

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
                                <div class="row md-3 mb-1">
                                    <div class="col-lg">
                                        <p class="col-form-label font-weight-bold">{{__('Ficheiros do Projeto')}}</p>
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q250') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q250')->value('tipo')!= null)
                                        @php $q250 = DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q250')->value('file');@endphp
                                        <a href="{{ route('file.download', ['filename' => basename($q250)]) }}" class="btn btn-link">Download Q251</a>
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q251') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q251')->value('file')!= null)
                                        @php $q251 = DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q251')->value('file');@endphp
                                        <a href="{{ route('file.download', ['filename' => basename($q251)]) }}" class="btn btn-link">Download Q251</a>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q252') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('file')!= null)
                                        @php $q252 = DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('file');@endphp
                                        <a href="{{ route('file.download', ['filename' => basename($q252)]) }}" class="btn btn-link">Download Q251</a>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q272') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('file')!= null)
                                        @php $q272 = DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('file');@endphp
                                        <a href="{{ route('file.download', ['filename' => basename($q272)]) }}" class="btn btn-link">Download Q251</a>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q381') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q381')->value('file')!= null)
                                        @php $q381 = DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q381')->value('file');@endphp
                                        <a href="{{ route('file.download', ['filename' => basename($q381)]) }}" class="btn btn-link">Download Q251</a>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>


                                <form method="POST" action="{{ route('changeProjectState') }}">
                                    @csrf
                                    <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">
                                    <div class="form-group">
                                        <label for="projectState">Change Project State:</label>
                                        <select class="form-control" id="projectState" name="projectState">
                                            @foreach($projectStates as $id => $state)
                                            <option value="{{ $id }}" {{ $projeto->estado_id == $id ? 'selected' : '' }}>{{ $state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change State</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</main>
@endsection