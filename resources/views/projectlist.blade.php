@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <h4>Projetos</h4>
            <livewire:livewire-datables />
        </div>
    </div>
</div>
@endsection