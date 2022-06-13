@extends("layouts.main")

@section("content")

    @include('flashMessage')

<h1 class="text-center mt5">Sistema de urna eletônica - últimos resultados</h1>

<div class="container">
    @foreach($candidatos as $candidato)
    <div class="card mb-3 mt-3">
        <div class="card-body">
            {{ $candidato-> nome }}

        <h3 class="text-right"> <span class="badge badge-success">{{ ($candidato->votos/100) * 100 }} %</span></h3>
        <div class="progress mt-5">
            <div class="progress-bar" role="progressbar" style="width: {{ $candidato-> votos }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
    </div>
    @endforeach
</div>

@endsection