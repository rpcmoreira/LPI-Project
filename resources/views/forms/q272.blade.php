@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4" style="height: 100%;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card ">
                    <div class="card-header text-center">Pedido de Autorização - Q251</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('q272_form') }}">
                            @csrf
                            <div class="row md-3 mb-1">
                                <label for="nome" class="col-md-3 col-form-label text-center">{{ __('Nome do Investigador Principal') }}</label>
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
                                <label for="proponente" class="col-md-3 col-form-label text-center">{{ __('Titulo do Projeto') }}</label>
                                <div class="col-lg">
                                    <input id="proponente" type="text" class="form-control @error('proponente') is-invalid @enderror" name="proponente" value="{{ old('proponente') }}" required autocomplete="proponente" autofocus>

                                    @error('proponente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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