@extends('layouts.app')

@section('content')

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
                                <div class="row md-3 mb-1">
                                    <div class="col-lg">
                                        <p class="col-form-label font-weight-bold">{{__('Ficheiros do Projeto')}}</p>
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q250') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q250')->value('tipo')!= null)
                                        <p class="col-md-3 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q250')->value('tipo')}}</p>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q251') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q251')->value('file')!= null)
                                        <p class="col-md-3 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('tipo')}}</p>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q252') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('file')!= null)
                                        <p class="col-md-3 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q252')->value('tipo')}}</p>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q272') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('file')!= null)
                                        <p class="col-md-3 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q272')->value('tipo')}}</p>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row md-3 mb-1">
                                    <label for="Area" class="col-md-3 col-form-label text-center">{{ __('Q381') }}</label>
                                    <div class="col-lg">
                                        @if(DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q381')->value('file')!= null)
                                        <p class="col-md-3 col-form-label text-center">{{DB::table('files')->where('projeto_id', $projeto->id)->where('tipo', 'q381')->value('file')}}</p>
                                        @else
                                        <p class="col-md-3 col-form-label text-center">X</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</main>
@endsection