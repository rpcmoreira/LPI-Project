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
                                <p class="text-center font-weight-bold"><span class="align-bottom"> {{__('Adicionar Formulários')}}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('guardarFicheiros') }}">
                            @csrf
                            <div class="row md-4 mb-1 mt-1">
                                <label for="cv" class="col-md-4 col-form-label text-center">{{ __('Q251') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <input type="file" accept=".pdf," class="form-control-file" name="Q251" placeholder="Choose your CV" id="Q251">
                                        @error('Q251')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-4 mb-1 mt-1">
                                <label for="cv" class="col-md-4 col-form-label text-center">{{ __('Q252') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <input type="file" accept=".pdf," class="form-control-file" name="Q252" placeholder="Choose your CV" id="Q252">
                                        @error('Q252')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row md-4 mb-1 mt-1">
                                <label for="cv" class="col-md-4 col-form-label text-center">{{ __('Q272') }}</label>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <input type="file" accept=".pdf," class="form-control-file" name="Q272" placeholder="Choose your CV" id="Q272">
                                        @error('Q272')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Atualizar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection