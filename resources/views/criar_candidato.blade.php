@extends('layouts.main')

@section('content')

<h1 class="text-center">Cadastro de Candidatos</h1>

<div class="container">
    <form action="{{route('cadastrarCandidato')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Nome do candidato</label>
            <input type="text" style="text-transform: capitalize" name="nome_candidato" class="form-control" placeholder="nome do candidato" required/>
            <label>Partido político:</label>
            <input type="text" style="text-transform: uppercase" name="nome_partido" class="form-control" placeholder="partido" required/>
            <label>Número:</label>
            <input type="number" name="numero_vot" class="form-control" placeholder="Informe o número do canditato" required/>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</div>
@endsection